# Vision AI - Object Insight AI

An AI-powered object recognition and analysis system built with Laravel and Python.

Vision AI allows users to upload images, detect objects using AI models, and receive detailed information including category, description, history, and usage of detected objects.

The system also supports object comparison using artificial intelligence.

---

## Features

- 🖼️ Image object recognition
- 🤖 AI-generated object information
- 📚 Object history and description generation
- 🔍 Text-based object analysis
- ⚖️ Compare two objects using AI
- 👤 User history management
- 🌐 Laravel web dashboard
- 🧠 Local AI processing using Ollama

---

# Project Structure

```
Vision-AI/
│
├── Object-Insight-AI/        # Laravel Application
│
└── ai-service-python/        # Python AI Service
```

---

# Technologies Used

## Laravel Application

- Laravel
- PHP
- Blade
- Bootstrap
- MySQL

## AI Service

- Python
- Flask
- Hugging Face Transformers
- MobileNetV2
- Ollama
- Qwen 2.5 3B AI Model

---

# How It Works

1. User uploads an image through the Laravel website.
2. Laravel sends the image to the Python AI service.
3. Python analyzes the image using MobileNetV2.
4. The detected object name is sent to Ollama.
5. Qwen 2.5 generates:
   - Category
   - Description
   - History
   - Usage
6. The result is returned to Laravel and stored.

---

# Requirements

Before running the project, install:

## Required Software

- PHP >= 8.2
- Composer
- Node.js & NPM
- Python >= 3.10
- MySQL
- Ollama

---

# Laravel Setup

Go to Laravel folder:

```bash
cd Object-Insight-AI
```

Install dependencies:

```bash
composer install
```

Install frontend packages:

```bash
npm install
```

Create environment file:

```bash
cp .env.example .env
```

Generate application key:

```bash
php artisan key:generate
```

Configure database in `.env`

Example:

```
DB_DATABASE=vision_ai
DB_USERNAME=root
DB_PASSWORD=
```

Run migrations:

```bash
php artisan migrate
```

Start Laravel:

```bash
php artisan serve
```

---

# Python AI Service Setup

Go to Python folder:

```bash
cd ai-service-python
```

Create virtual environment:

```bash
python -m venv venv
```

Activate environment:

### Windows

```bash
venv\Scripts\activate
```

### Linux / Mac

```bash
source venv/bin/activate
```

Install dependencies:

```bash
pip install flask
pip install transformers
pip install torch
pip install requests
```

Run Python service:

```bash
python app.py
```

Python API will run on:

```
http://127.0.0.1:5000
```

---

# Install Ollama

Download Ollama:

https://ollama.com

After installation, download Qwen model:

```bash
ollama pull qwen2.5:3b
```

Run Ollama:

```bash
ollama serve
```

The AI service communicates with Ollama locally:

```
http://127.0.0.1:11434
```

---

# API Endpoints

## Analyze Image

### POST

```
/analyze
```

Upload:

```
image
```

Response:

```json
{
 "object_name": "television",
 "category": "Electronics",
 "confidence":0.82,
 "description":"...",
 "history":"...",
 "usage":"..."
}
```

---

## Analyze Text Object

### POST

```
/analyze-text
```

Request:

```json
{
 "object_name":"television"
}
```

---

## Compare Objects

### POST

```
/compare-images
```

Upload:

```
image1
image2
```

Returns:

- Similarities
- Differences
- Conclusion

---

# AI Model

Image recognition:

```
google/mobilenet_v2_1.0_224
```

Language model:

```
qwen2.5:3b
```

---

# Notes

- The AI models run locally.
- No external paid AI API is required.
- GPU is not required, but recommended for faster processing.
- First run may take longer because models need to download.

---

# Author

Matin Tousi

AI Object Recognition & Analysis System
