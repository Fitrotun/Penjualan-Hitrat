<?php

namespace App\Http\Controllers;



class ContactController extends Controller
{

    // Dashboard
    public function index(){
        return view('frontend.pages.contact');
        
    }
}
