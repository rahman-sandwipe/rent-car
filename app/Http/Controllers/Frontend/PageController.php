<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        return view('frontend.home.index');
    }

    public function abouts()
    {
        return view('frontend.abouts');
    }

    public function contact()
    {
        return view('frontend.contact');
    }
}
