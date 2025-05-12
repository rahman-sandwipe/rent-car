<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home(){
        return view('frontend.home.index');
    }

    public function abouts(){
        return view('frontend.abouts.index');
    }

    public function rentals(){
        return view('frontend.rentals.index');
    }

    public function blogs(){
        return view('frontend.blogs.index');
    }

    public function contact(){
        return view('frontend.contacts.index');
    }


    // Register and login
    public function login(){
        return view('frontend.auth.login');
    }

    public function register(){
        return view('frontend.auth.register');
    }
}
