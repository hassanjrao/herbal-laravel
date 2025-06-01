<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    public function index()
    {
        $aboutUs = \App\Models\AboutUs::first();
        return view('front.about-us.index', compact('aboutUs'));
    }

}
