<?php

namespace App\Http\Controllers;

use App\Mail\OrderMail;
use App\Models\Contact;
use App\Models\Productorder;
use App\Models\Requesttable;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;

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
                if($types = $request->types){
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
    function shopdetail(Request $request){
        $ratePrice = $this->rate();
        $lastResult = Http::get(config('const.shock_url'));
        $collection = collect($lastResult['data']);
        if(count($collection) > $request->id) {
            $shopDetailWatchRelateds = collect($collection)->sortByDesc('releaseDate')->values()->all();       
            $shopDetailWatch = $collection->where('index',$request->id)->toArray();
            $shopDetailWatchRelated = array_slice($shopDetailWatchRelateds,0,8);
            $battery = substr($collection['70']['additionalAttributions']['batteryAndBatteryLife']['0'],114);
            $model = substr($collection['150']['additionalAttributions']['displayType']['0'],94);
            return view('shopdetail',compact('shopDetailWatch','shopDetailWatchRelated','ratePrice'));
            
        }else
        {
            return back();
        }
     
    }

    // холбоо барих хэсэгийг мэдээлэл хадаглах
    public function contact(Request $request){
        if(count($request->all()) > 0) {
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'email' => 'required',
                'phone' => 'required',
                'message' => 'required',
            ],
            [
                'name.required' => 'Та өөрийн нэрээ оруулна уу',
                'email.required' => 'Өөрийн и-мэйл хаяг оруулна уу',
                'phone.required' => 'Өөрийн утасны дугаараа оруулна уу',
                'message.required' => 'Зурвас оруулна уу',
            ]);
            if ($validator->fails()) {
                return redirect()->route("contact")->withErrors($validator->errors());
              } 
              else 
              {
                $saveInfo = new Contact();
                $saveInfo->name = $request->input('name');
                $saveInfo->email = $request->input('email');
                $saveInfo->phone = $request->input('phone');
                $saveInfo->post = $request->input('message');
                $saveInfo->save();
                return redirect()
                ->route('contact')
                ->with('message', 'Таны хүсэлт амжилттай илгээгдлээ.');    
                }    
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
        if(Auth::user()){
            $id = $request->input('id');
            $name = $request->input('name');
            $price = $request->input('price');
            $quanity = $request->input('product-quanity');
            $totalprice = $price * $quanity;
            $result = str_pad(random_int(0,99999999),8,0, STR_PAD_LEFT);
            $allData = [$id,$name,$price,$quanity,$totalprice,$result]; 
            session(["alldata"=>$allData]);
            return view('order',compact('totalprice','quanity','name','result','id'));

        }else
        {
            return back();
        }
       
    }

    public function order(Request $request){
        if(count($data = $request->all()) > 0) 
        {
            $validator = Validator::make($request->all(), [
                'input_name' => 'required',
                'input_phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:8',
            ],
            [
                'input_name.required' => 'Та өөрийн нэрээ оруулна уу',
                'input_name.required' => 'Та өөрийн нэрээ оруулна уу',
                'input_phone.required' => 'Утасны дугаараа оруулна уу',
                'input_address.required' => 'Гэрийн хаяг оруулна уу',
                'input_phone.regex' => 'Утасны дугаар буруу байна',
                'input_phone.min' => 'Утасны дугаар 8 оронтой байх ёстой',
            ]);
            
            if ($validator->fails()) {
                $request->session()->flash('_old_input',[
                    'input_name' => $request->input('input_name'),
                    'input_phone' => $request->input('input_phone'),
                    'input_address' => $request->input('input_address'),
                ]);
                return back()->withErrors($validator->errors());
              } 
              else 
              {
            $allData = session("alldata");
            $orderData = new Productorder(); 
            $watchName = $allData[1];
            $name = $request->input('input_name'); 
            $phone =  $request->input('input_phone'); 
            $address =  $request->input('input_address');
            $allprice = $allData[4];
            $quanity = $allData[3];
            $ordernumber = $allData[5]; 
            $orderData->watchid = $allData[0]; 
            $orderData->quanity = $quanity;
            $orderData->totalprice =  $allprice;
            $orderData->inputname = $name;
            if(isset(Auth::user()->id)){
                $orderData->user_id=Auth::user()->id;
            }else
            {
                $orderData->user_id="not login";
            }
            $orderData->inputphonenumber = $phone;
            $orderData->ordernumber = $ordernumber;
            $orderData->address = $address;
            $orderData->watch_name = $watchName;
            $orderData->status = '0';
            $orderData->save();
            Mail::send(new OrderMail($name,$orderData->user_id=Auth::user()->email,$ordernumber,$allprice,$watchName,$quanity,$phone));
            session()->forget('alldata');
            return view('orderconfirm',compact('name','phone','ordernumber'));
        }
            
        }   
        return view('order');
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
        if(Auth::user()){
            if($request->id){
                Productorder::where('id','=', $request->id)
                ->update(['status' =>'10']);
            }
            if(Auth::user()->email == 'tmkee0525@gmail.com'){
                $myWatch = Productorder::first()
                ->orderby('created_at','desc')
                ->paginate(10); 
                
                if($request->id){
                    $watchStatus = $request->status;
                    Productorder::where('id','=', $request->id)
                    ->update(['status' =>$watchStatus]);
                }
                return view('admin',compact('myWatch'));
            }
            $myWatch = Productorder::where([['user_id','=',Auth::user()->id],['status', '<>', '10']])
            ->orderby('created_at','desc')
            ->paginate(10);
            return view('mypage',compact('myWatch'));
        }else
        {
            return back();
        }
    
       
    }
    public function login(){
        return view('login');
    }
}