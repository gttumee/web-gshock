<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Productorder;
use App\Models\Watchs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class Commoncontroller extends Controller
{
    public function index(){
        $shopDetailWatchRelated = Watchs::orderByDesc('updated_at')
        ->paginate(3);
        
        return view('index',compact('shopDetailWatchRelated'));
    }

    //дэлгүүрийн лимт ангилал гарах хэсэг
    public function shop(Request $request){
        $lastResult = Http::get("https://monxansh.appspot.com/xansh.json?currency=JPY")->json();
        $ratePrice = round($lastResult[0]['rate_float']);
        
        if($request->type){

            $shopall = Watchs::where('type',$request->type)
            ->paginate(15)
            ->withQueryString();
        } 
        
        elseif($request->types)
        
        {
            $shopall = Watchs::where('brand',$request->types)
            ->paginate(15)
            ->withQueryString();
        }
        
        elseif($request->search)
        {
            $shopall = Watchs::where('name','like','%'.$request->search.'%')->paginate(15)->withQueryString();
        }
        elseif($request->sort)
        {
            $shopall = Watchs::orderBy('price',$request->sort)->paginate(15)->withQueryString();
        }
        else
        {
            $shopall = Watchs::paginate(15)->withQueryString();
        } 
        return view('shop',compact('shopall','ratePrice'));

    }
    
    public function about(){
        return view('about');
    }
    
    //цагны дэлгэрэнгүй мэдээлэл гарах хэсэг
    public function shopdetail(Request $request){
        
        $lastResult = Http::get("https://monxansh.appspot.com/xansh.json?currency=JPY")->json();
        $ratePrice = round($lastResult[0]['rate_float']);

        $shopDetailWatch = Watchs::where('id','=',$request->id)
        ->first();
        
        $shopDetailWatchRelated = Watchs::orderByDesc('updated_at')
        ->paginate(5);
        
        return view('shopdetail',compact('shopDetailWatch','shopDetailWatchRelated','ratePrice'));
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
    
    public function orderconfirm(Request $request){
        $id = $request->input('id');
        $name = $request->input('name');
        $price = $request->input('price');
        $quanity = $request->input('product-quanity');
        $totalprice = $price * $quanity;
        $result = str::random(2).date(today()->format('dmY'));
        return view('order',compact('totalprice','quanity','name','result','id'));
    }
    public function order(Request $request){
        if($request){
            $orderData = new Productorder(); 
            $name = $request->input('inputname'); 
            $phone =  $request->input('inputphonenumber'); 
            $ordernumber = $request->input('result'); 
            $orderData->watchid = $request->input('watchid'); 
            $orderData->quanity = $request->input('quanity'); 
            $orderData->totalprice = $request->input('totalprice'); 
            $orderData->inputname = $name;
            $orderData->inputphonenumber = $phone;
            $orderData->ordernumber = $ordernumber;
            $orderData->save();       
            return view('orderconfirm',compact('name','phone','ordernumber'));
            
        }   
        return view('orderconfirm');
    }


}