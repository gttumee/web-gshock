<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Productorder;
use App\Models\Requesttable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class Commoncontroller extends Controller 
{
    
    //Ханшийн мээдээлэл авах
     function rate(){
        $lastResult = Http::get(config('const.rate_url'))->json();  
        return round($lastResult[0]['rate_float']);
      
    }
    //url дуудах
    function shock(){
        $lastResult = Http::get(config('const.shock_url'));
         return $lastResult['data']; 
    }
    
    public function index(request $request){
        if($request->all()){
            return redirect('/')->with(Auth::logout());
        }
        $orderData = Productorder::distinct('watchid')->get();
        $orderData =Productorder::orderBy('watchid','desc')->distinct()->select('watchid')->get()->take(3);
        $ratePrice =  $this->rate();
        $shopDetailWatchRelated = (collect($this->shock())->whereIn('index',$orderData->pluck('watchid')->toarray()));
        return view('index',compact('shopDetailWatchRelated','ratePrice'));
    }

    //дэлгүүрийн лимт ангилал гарах хэсэг
    public function shop(Request $request){
        $ratePrice =  $this->rate();
        $collection=$this->shock();
        $data = collect($this->shock())->sortByDesc('releaseDate')->values()->all();
        //request ээр ямар нэгэн юм ирж байвал шалгана.
            if($request->all()){

                //хямдаар эрэмблэх тохиолдолд 
                if($request->type == 'low'){
                    $data = collect($collection)->sortBy('listPrice')->values()->all();
                }

                //үнэтэйгээр эрэмбэлэх тохиолдолд
                if($request->type == 'higth'){
                    $data = collect($collection)->sortByDesc('listPrice')->values()->all();
                }  

                //шинээр эрэмбэлэх тохиолдолд
                if($request->type == 'new'){
                    $data = collect($collection)->sortByDesc('releaseDate')->values()->all();
                }  

                //хуучнаар эрэмбэлэх тохиолдолд
                if($request->type == 'old'){
                    $data = collect($collection)->sortBy('releaseDate')->values()->all();
                }

                //дижиталаар филтер хийх үед
                if($types=$request->types){
                    {
                        $data = collect($data)->filter(function ($user) use ($types) {
                            return (substr($user['additionalAttributions']['displayType']['0'],94)) == $types;
                         }); 
                    }
                } 
                    //баттери филтер хийх үед
                if($request->battery){
                        {
                            if($request->battery == 'solar'){
                                $data = collect($data)->filter(function ($user) {
                                    return (substr($user['additionalAttributions']['batteryAndBatteryLife']['0'],114)) == 'solar';
                                 });   
                            }
                            else
                            {
                                $data = collect($data)->filter(function ($user)  {
                                    return (substr($user['additionalAttributions']['batteryAndBatteryLife']['0'],114)) <> 'solar';
                                });  
                            }
                        }
                    } 
                    
                if( $search = $request->input('search')){
                    {
                        $data = collect($data)->filter(function ($user) use ($search) {
                           return strpos($user['sku'], strtoupper($search)) !== false;
                        });
                    }
                } 
            }
        return view('shop',compact('ratePrice','data'));

    }
    
    public function about(){
        return view('about');
    }
    
    //цагны дэлгэрэнгүй мэдээлэл гарах хэсэг
    public function shopdetail(Request $request){
        $ratePrice = $this->rate();
        $lastResult = Http::get(config('const.shock_url'));
        $collection=collect($lastResult['data']); 
        $shopDetailWatchRelateds = collect($collection)->sortByDesc('releaseDate')->values()->all();       
        $shopDetailWatch = $collection->where('index',$request->id)->toArray();
        $shopDetailWatchRelated =array_slice($shopDetailWatchRelateds,0,8);
        $battery = substr($collection['70']['additionalAttributions']['batteryAndBatteryLife']['0'],114);
        $model = substr($collection['150']['additionalAttributions']['displayType']['0'],94);
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
            return view('contact'); 
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
            $watchName = $request->input('watch_name'); 
            $name = $request->input('inputname'); 
            $phone =  $request->input('inputphonenumber'); 
            $ordernumber = $request->input('result'); 
            $orderData->watchid = $request->input('watchid'); 
            $orderData->quanity = $request->input('quanity'); 
            $orderData->totalprice = $request->input('totalprice'); 
            $orderData->inputname = $name;
            if(isset(Auth::user()->id)){
                $orderData->user_id=Auth::user()->id;
            }else
            {
                $orderData->user_id="not login";
            }
            $orderData->inputphonenumber = $phone;
            $orderData->ordernumber = $ordernumber;
            $orderData->watch_name = $watchName;
            $orderData->status = '0';
            $orderData->save();       
            return view('orderconfirm',compact('name','phone','ordernumber'));
            
        }   
        return view('orderconfirm');
    }

    public function request(Request $request ){
        if( $search = $request->input('search')){
            {
                $collection=$this->shock();
                $data = collect($collection)->sortByDesc('releaseDate')->values()->all();
                $data = collect($data)->filter(function ($user) use ($search) {
                   return strpos($user['sku'], strtoupper($search)) !== false;
                });
                return view('request',compact('data'));
            }
        }
        if($request->input('color') or $request->input('select'))
        {
            $requestData = new Requesttable(); 
            $requestData->watchid = $request->input('id'); 
            $requestData->color = $request->input('color'); 
            $requestData->type = $request->input('select'); 
            if(isset(Auth::user()->id)){
                $requestData->user=Auth::user()->id;
            }else
            {
                $requestData->user="not login";
            }
            $requestData->save();
            return redirect()
            ->route('request')
            ->with('message', 'Таны хүсэлт амжилттай илгээгдлээ.');    
            
        }
        return view('request');
    }
    public function mypage(request $request){
        if($request->id){
            Productorder::where('id','=', $request->id)
            ->update(['status' =>'2']);
        }
        $myWatch = Productorder::where([['user_id','=',Auth::user()->id],['status', '<>', '2']])
        ->orderby('created_at','desc')
        ->paginate(10);
        return view('mypage',compact('myWatch'));
    }
}