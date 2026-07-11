<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\comparison;


class ComparisonController extends Controller
{
    public function upload(Request $request)
    {

        $request->validate([
            'imageOne'=>'required|image',
            'imageTwo'=>'required|image'
        ]);
        
        $fileNameOne = time() . '_'  . $request->imageOne->getClientOriginalName();
        $fileNameTwo = time() . '_'  . $request->imageTwo->getClientOriginalName();
        
        $imagePathOne=$request->imageOne->storeAs('/assets/image',$fileNameOne);
        $imagePathTwo=$request->imageTwo->storeAs('/assets/image',$fileNameTwo);
        
        
        
        $response = Http::timeout(120)
        ->attach('image1', file_get_contents($imagePathOne), 'image1.jpg')
        ->attach('image2', file_get_contents($imagePathTwo), 'image2.jpg')
        ->post('http://127.0.0.1:5000/compare-images');
        
        if ($response->failed()) {
            return redirect()->back()->withErrors(['error' => 'خطا در ارتباط با سرور پردازش تصویر']);
        }
        $data = $response->json();
        
        
        // dd($data);


        $translatedNameOne = $this->translateText($data['object_1'] ?? '');
        $translatedNameTwo = $this->translateText($data['object_2'] ?? '');
        $translatedDifferences = $this->translateText($data['differences'] ?? '');
        $translatedSimilarities = $this->translateText($data['similarities'] ?? '');
        $translatedResult = $this->translateText($data['conclusion'] ?? '');
        $compare = comparison::create([
            'user_id'     => auth()->id(),
            'image_one'       => $imagePathOne,
            'image_two'       => $imagePathTwo,
            'object_one' => $translatedNameOne,
            'object_two' => $translatedNameTwo,
            'comparison_result'  => $translatedResult,
            'similarities' => $translatedSimilarities,
            'differences' => $translatedDifferences,
        ]);

        return redirect()->back()->with('compare',$compare);

    }

     private function translateText($text)
    {
        if (empty($text) || $text === "N/A") {
            return "اطلاعاتی در دسترس نیست.";
        }

        $url = "https://translate.googleapis.com/translate_a/single";

        try {
            $response = Http::timeout(120)
                ->withoutVerifying() // دور زدن ارور cURL 77 گواهی SSL لارگون
                ->get($url, [
                    'client' => 'gtx',
                    'sl'     => 'en', // مبدا انگلیسی
                    'tl'     => 'fa', // مقصد فارسی
                    'dt'     => 't',
                    'q'      => $text
                ]);

            if ($response->successful()) {
                $result = $response->json();

                // استخراج و چسباندن تمام جملات ترجمه شده به یکدیگر
                $translatedString = "";
                if (isset($result[0]) && is_array($result[0])) {
                    foreach ($result[0] as $sentence) {
                        $translatedString .= $sentence[0] ?? "";
                    }
                }
                return !empty($translatedString) ? trim($translatedString) : $text;
            }
        } catch (\Exception $e) {
            // در صورت بروز خطای غیرمنتظره شبکه، خود متن انگلیسی بازمی‌گردد تا سیستم کرش نکند
            return $text;
        }

        return $text;
    }
}
