<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Watchs;
use Illuminate\Http\Request;

class Commoncontroller extends Controller
{
    public function index(){
             
        $shopDetailWatchRelated = Watchs::orderByDesc('updated_at')
        ->paginate(3);
        
        return view('index',compact('shopDetailWatchRelated'));
    }

    //дэлгүүрийн лимт ангилал гарах хэсэг
    public function shop(Request $request){

        if($request->type){

            $shopall = Watchs::where('type',$request->type)
            ->paginate(15)
            ->withQueryString();
            return view('shop',compact('shopall'));
        } 
        
        elseif($request->types)
        
        {
            $shopall = Watchs::where('brand',$request->types)
            ->paginate(15)
            ->withQueryString();
            return view('shop',compact('shopall'));
        }
        
        elseif($request->search)
        {
            $shopall = Watchs::where('name','like','%'.$request->search.'%')->paginate(15)->withQueryString();
            return view('shop',compact('shopall'));
        }
        else
        {
            $shopall = Watchs::paginate(15)->withQueryString();
            return view('shop',compact('shopall'));
        } 
    }
    
    public function about(){
        return view('about');
    }
    
    //цагны дэлгэрэнгүй мэдээлэл гарах хэсэг
    public function shopdetail(Request $request){

        $shopDetailWatch = Watchs::where('id','=',$request->id)
        ->first();
        
        $shopDetailWatchRelated = Watchs::orderByDesc('updated_at')
        ->paginate(5);
        
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
            return redirect()
            ->route('contact')
            ->with('message', 'Таны хүсэлт амжилттай илгээгдлээ.');    
            }
        else
            {
            return view('contact'); 
            }
    }
    
    public function history(){
        return view('history');
    }

    public function technology(){
        return view('technology');
    }

    public function mygshock(){
        return view('mygshock');
    }


}