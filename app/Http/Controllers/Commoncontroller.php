<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Watchs;
use Illuminate\Http\Request;

class Commoncontroller extends Controller
{
    public function index(){
        return view('index');
    }
    public function shop(){
        $shopall = Watchs::paginate(15);
        return view('shop',compact('shopall'));
    }
    
    public function about(){
        return view('about');
    }
    
    //цагны дэлгэрэнгүй мэдээлэл гарах хэсэг
    public function shopdetail($id){
        $shopDetailWatch = Watchs::where('id','=',$id)->first();
        $shopDetailWatchRelated = Watchs::orderByDesc('updated_at')->paginate(5);
        return view('shopdetail',compact('shopDetailWatch','shopDetailWatchRelated'));
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