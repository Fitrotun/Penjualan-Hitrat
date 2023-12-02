<?php

namespace App\Http\Controllers;



class AboutController extends Controller
{
    // public function __construct(){
    //     return $this->middleware('login');
    // }

    // Dashboard
    public function index(){
        return view('frontend.pages.about');
        
    }
}
