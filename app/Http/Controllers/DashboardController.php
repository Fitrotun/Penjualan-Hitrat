<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    // public function __construct(){
    //     return $this->middleware('login');
    // }

    // Dashboard
    public function index(){
        return view('backend.pages.dashboard');
        
    }
}
