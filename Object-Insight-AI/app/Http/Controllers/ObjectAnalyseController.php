<?php

namespace App\Http\Controllers;

use App\Models\Object_Analyse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use RealRashid\SweetAlert\Facades\Alert;


class ObjectAnalyseController extends Controller
{
    public function upload(Request $request)
    {
        $request->validate([
            'image' => 'required|image'
        ]);

        $fileName = time() . '_'  . $request->image->getClientOriginalName();
        $imagePath = $request->image->storeAs('/assets/image', $fileName);

        $response = Http::timeout(120)->attach(
            'image',
            file_get_contents($imagePath),
            'image.jpg'
        )->post('http://127.0.0.1:5000/analyze');

        if ($response->failed()) {
            return redirect()->back()->withErrors(['error' => 'خطا در ارتباط با سرور پردازش تصویر']);
        }
        $data = $response->json();
        // dd($data);
        $translatedDescription = $this->translateText($data['description'] ?? '');
        $translatedName = $this->translateText($data['object_name'] ?? '');
        $translatedHistory = $this->translateText($data['history'] ?? '');
        $translatedUsage = $this->translateText($data['usage'] ?? '');
        $translatedCategory = $this->translateText($data['category'] ?? '');
        $analysis = Object_Analyse::create([
            'user_id'     => auth()->id(),
            'image'       => $imagePath,
            'object_name' => $translatedName,
            'confidence'  => $data['confidence'] ?? 0,
            'category' => $translatedCategory,
            'description' => $translatedDescription,
            'history'     => $translatedHistory,
            'usage'       => $translatedUsage
        ]);

        // dd($analysis);
        return redirect()->back()->with('result', $analysis);
    }

    private function translateText($text)
    {
        if (empty($text) || $text === "N/A") {
            return "اطلاعاتی در دسترس نیست.";
        }

        $url = "https://translate.googleapis.com/translate_a/single";

        try {
            $response = Http::timeout(30)
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





    public function writeUpload(Request $request)
    {
        $request->validate([
            'text' => 'required|string'
        ]);

              $response = Http::timeout(120)->post('http://127.0.0.1:5000/analyze-text', [
                  'object_name' => $request->text
              ]);

        if ($response->failed()) {
            return redirect()->back()->withErrors(['error' => 'خطا در ارتباط با سرور ']);
        }
        $data = $response->json();
        // dd($data);
        $translatedDescription = $this->translateText($data['description'] ?? '');
        $translatedName = $this->translateText($data['object_name'] ?? '');
        $translatedHistory = $this->translateText($data['history'] ?? '');
        $translatedUsage = $this->translateText($data['usage'] ?? '');
        $translatedCategory = $this->translateText($data['category'] ?? '');
        $analysis = Object_Analyse::create([
            'user_id'     => auth()->id(),
            'image'       => $imagePath??null,
            'object_name' => $translatedName,
            'confidence'  => $data['confidence'] ?? 0,
            'category' => $translatedCategory,
            'description' => $translatedDescription,
            'history'     => $translatedHistory,
            'usage'       => $translatedUsage
        ]);
        return redirect()->back()->with('result', $analysis);
       }
}
