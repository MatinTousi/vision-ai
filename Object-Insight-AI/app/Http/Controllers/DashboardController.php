<?php

namespace App\Http\Controllers;

use App\Models\comparison;
use App\Models\Object_Analyse;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.layout.master');
    }

    public function upload_images()
    {
        return view('dashboard.pages.upload-image');
    }

    public function writePage(){
        return view('dashboard.pages.write-image');
    }

    public function compare_images()
    {
        return view('dashboard.pages.Compare-Images');
    }

    public function history()
    {
        $object_analayses = Object_Analyse::where('user_id',auth()->user()->id)->orderBy('id','DESC')->get();

        $comparisons = comparison::where('user_id',auth()->user()->id)->orderBy('id','DESC')->get();
       

        return view('dashboard.pages.History',compact('object_analayses','comparisons'));
    }

    public function historySingleObject(Object_Analyse $analyse)
    {
        return view('dashboard.pages.single-history', compact('analyse'));
    }

    public function historySingleComparison(comparison $comparison)
    {
        return view('dashboard.pages.single-history', compact('comparison'));
    }
}
