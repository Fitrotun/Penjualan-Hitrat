<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;



class HomeController extends Controller
{
    // Home
    
    public function index(){
        // dd(request('search'));
        return view('frontend.pages.home',[
            'title' => 'HomePage',
            
        ]);  
    }

    
    // List Wisata
    // public function wisata(){
    //     return view('frontend.pages.wisata',[
    //         'title' => 'Wisata List',
    //         'wisata' => Wisata::all(),
    //     ]);  
    // }

    // // Detail Wisata
    // public function dwisata($id){
    //     return view('frontend.pages.detailwisata',[
    //         'title' => 'Wisata List',
    //         'wisata' => Wisata::find($id),
    //         'maps' => json_encode(Wisata::find($id)),
    //         'komen' => Comment::where('wisata_id',$id)->get(),
    //     ]);  
    // }

}
