from flask import Flask, request, jsonify
from transformers import pipeline
import requests
import os

app = Flask(__name__)

print("Loading Image Classifier Model...")
image_classifier = pipeline("image-classification", model="google/mobilenet_v2_1.0_224")
print("Model loaded successfully!")


def get_object_info_from_ollama(object_name_en):
    prompt = f"""
    You are an expert historian and taxonomist. Provide accurate information about the object "{object_name_en}".
    Use this exact template and format. No markdown, no introduction.

    Category: One or two words specifying the general category of this object (e.g., Electronics, Vehicles, Furniture, Plants, Kitchenware, etc.).
    Description: One clear line about what this object is and its main function.
    History: Two sentences explaining the real historical invention, the creator, and its evolution.
    Usage: One line explaining how it is commonly used in modern daily life.

    Respond for "{object_name_en}":
    """
    try:
        response = requests.post(
            "http://127.0.0.1:11434/api/generate",
            json={
                "model": "qwen2.5:3b",
                "prompt": prompt,
                "stream": False,
                "options": {"temperature": 0.1}
            },
            timeout=120
        )
        result_text = response.json().get("response", "").strip()
        
        info = {"category": "Other", "description": "N/A", "history": "N/A", "usage": "N/A"}
        
        for line in result_text.split('\n'):
            clean_line = line.replace("*", "").strip()
            if "Category:" in clean_line:
                info["category"] = clean_line.split("Category:")[1].strip()
            elif "Description:" in clean_line:
                info["description"] = clean_line.split("Description:")[1].strip()
            elif "History:" in clean_line:
                info["history"] = clean_line.split("History:")[1].strip()
            elif "Usage:" in clean_line:
                info["usage"] = clean_line.split("Usage:")[1].strip()
        return info
    except Exception as e:
        print(f"Ollama Error: {e}")
        return {"category": "Other", "description": "N/A", "history": "N/A", "usage": "N/A"}
    

def compare_objects_via_ollama(obj1, obj2):
    prompt = f"""
    Compare these two objects: "{obj1}" and "{obj2}".
    Provide the response using this exact structure below. Do not use bold markers like asterisks (*).

    Similarities: (Write one or two sentences here)
    Differences: (Write one or two sentences here)
    Conclusion: (Write a final summary here)
    """
    try:
        response = requests.post(
            "http://127.0.0.1:11434/api/generate",
            json={
                "model": "qwen2.5:3b",
                "prompt": prompt,
                "stream": False,
                "options": {"temperature": 0.3}
            },
            timeout=120
        )
        result_text = response.json().get("response", "").strip()
        
        comparison = {"similarities": "N/A", "differences": "N/A", "conclusion": "N/A"}
        
        lines = result_text.split('\n')
        for line in lines:
            clean_line = line.replace("*", "").strip()
            
            if clean_line.lower().startswith("similarities:"):
                comparison["similarities"] = clean_line.split(":", 1)[1].strip()
            elif clean_line.lower().startswith("differences:"):
                comparison["differences"] = clean_line.split(":", 1)[1].strip()
            elif clean_line.lower().startswith("conclusion:"):
                comparison["conclusion"] = clean_line.split(":", 1)[1].strip()
        
        if comparison["similarities"] == "N/A" and comparison["differences"] == "N/A":
            comparison["conclusion"] = result_text

        return comparison
    except Exception as e:
        print(f"Ollama Comparison Error: {e}")
        return {"similarities": "N/A", "differences": "N/A", "conclusion": "N/A"}

@app.route("/analyze-text", methods=["POST"])
def analyze_text():
    data = request.get_json()
    
    if not data or "object_name" not in data:
        return jsonify({"error": "Please provide object_name in JSON body"}), 400

    object_name_en = data["object_name"].strip()

    ai_info = get_object_info_from_ollama(object_name_en)

    return jsonify({
        "object_name": object_name_en,
        "category": ai_info["category"],        
        "description": ai_info["description"],
        "history": ai_info["history"],
        "usage": ai_info["usage"],
    })

@app.route("/analyze", methods=["POST"])
def analyze():
    if "image" not in request.files:
        return jsonify({"error": "no image"}), 400

    file = request.files["image"]
    path = "temp.jpg"
    file.save(path)

    try:
        predictions = image_classifier(path)
        if not predictions:
            if os.path.exists(path): os.remove(path)
            return jsonify({"error": "No object detected"}), 200

        top_prediction = predictions[0]
        object_name_en = top_prediction['label'].split(',')[0].strip()
        confidence = float(top_prediction['score'])

        ai_info = get_object_info_from_ollama(object_name_en)

        if os.path.exists(path): os.remove(path)

        return jsonify({
            "object_name": object_name_en,
            "category": ai_info["category"],        
            "confidence": confidence,
            "description": ai_info["description"],
            "history": ai_info["history"],
            "usage": ai_info["usage"],
        })
    
    except Exception as e:
        if os.path.exists(path): os.remove(path)
        return jsonify({"error": str(e)}), 500
        
@app.route("/compare-images", methods=["POST"])
def compare_images():
    if "image1" not in request.files or "image2" not in request.files:
        return jsonify({"error": "Please provide both 'image1' and 'image2' files."}), 400

    file1 = request.files["image1"]
    file2 = request.files["image2"]

    path1 = "temp1.jpg"
    path2 = "temp2.jpg"

    file1.save(path1)
    file2.save(path2)

    try:
        predictions1 = image_classifier(path1)
        if not predictions1:
            obj1_name = "Unknown Object"
        else:
            obj1_name = predictions1[0]['label'].split(',')[0].strip()

        predictions2 = image_classifier(path2)
        if not predictions2:
            obj2_name = "Unknown Object"
        else:
            obj2_name = predictions2[0]['label'].split(',')[0].strip()

        if os.path.exists(path1): os.remove(path1)
        if os.path.exists(path2): os.remove(path2)

        comparison_result = compare_objects_via_ollama(obj1_name, obj2_name)

        return jsonify({
            "object_1": obj1_name,
            "object_2": obj2_name,
            "similarities": comparison_result["similarities"],
            "differences": comparison_result["differences"],
            "conclusion": comparison_result["conclusion"]
        })
    except Exception as e:
        if os.path.exists(path1): os.remove(path1)
        if os.path.exists(path2): os.remove(path2)
        return jsonify({"error": str(e)}), 500


if __name__ == "__main__":
    app.run(debug=True, port=5000)