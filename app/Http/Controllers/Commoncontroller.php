<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class Commoncontroller extends Controller
{
    public function index(){
        return view('index');
    }
    public function shop(){
        return view('shop');
    }
    
    public function about(){
        return view('about');
    }
    
    public function shopdetail(){
        return view('shopdetail');
    }

    // холбоо барих хэсэгийг мэдээлэл хадаглах
    public function contact(Request $request){
        
        if(count($request->all()) > 0) {
            $saveInfo = new Contact();
            $saveInfo->name = $request->input('name');
            $saveInfo->email = $request->input('email');
            $saveInfo->phone= $request->input('phone');
            $saveInfo->post = $request->input('message');
            $saveInfo->save();
            return redirect()->route('contact')->with('message', 'таны хүсэлт амжилттай илгээгдлээ');    
            }
        else
            {
            
            return view('contact'); 
            }
    }

}