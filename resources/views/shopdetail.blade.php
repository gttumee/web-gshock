@extends('layout.common')
@section('title', 'Дэлгүүр')
@include('layout.header')
@section('content')
    <!-- Open Content -->
    <section class="bg-light">
        <div class="container pb-5">
            <div class="row">
                @foreach($shopDetailWatch as $item)    
                <div class="col-lg-5 mt-5">
                    
                    <div class="card mb-3">
                        <img class="card-img img-fluid" src="{{config('const.image').$item['productAssetList']['0']['path']}}" alt="Card image cap" id="product-detail">
                    </div>
                    <div class="row">
                        <!--Start Controls-->
                        <div class="col-1 align-self-center">
                            <a href="#multi-item-example" role="button" data-bs-slide="prev">
                                <i class="text-dark fas fa-chevron-left"></i>
                                <span class="sr-only">Previous</span>
                            </a>
                        </div>
                        <!--End Controls-->
                        <!--Start Carousel Wrapper-->
                        <div id="multi-item-example" class="col-10 carousel slide carousel-multi-item" data-bs-ride="carousel">
                            <!--Start Slides-->
                            <div class="carousel-inner product-links-wap" role="listbox">
                                <!--First slide-->
                                <div class="carousel-item active">
                                    <div class="row">
                                        <div class="col-4">
                                            <a href="#">
                                            @if(isset($item['productAssetList']['0']['path']))
                                                <img class="card-img img-fluid" src="{{config('const.image').$item['productAssetList']['0']['path']}}" alt="Product Image 1">
                                            @endif
                                            </a>
                                        </div>
                                        <div class="col-4">
                                            <a href="#">
                                                @if(isset($item['productAssetList']['1']['path']))
                                                <img class="card-img img-fluid" src="{{config('const.image').$item['productAssetList']['1']['path']}}" alt="Product Image 1">
                                                @endif
                                            </a>
                                        </div>
                                        <div class="col-4">
                                            <a href="#">
                                                @if(isset($item['productAssetList']['2']['path']))
                                                <img class="card-img img-fluid" src="{{config('const.image').$item['productAssetList']['2']['path']}}" alt="Product Image 1">
                                            @endif
                                        </a>
                                        </div>
                                    </div>
                                </div>
                                <!--/.First slide-->
                                <!--Second slide-->
                                <div class="carousel-item">
                                    <div class="row">
                                        <div class="col-4">
                                            <a href="#">
                                                @if(isset($item['productAssetList']['3']['path']))
                                                <img class="card-img img-fluid" src="{{config('const.image').$item['productAssetList']['3']['path']}}" alt="Product Image 1">
                                                @endif
                                            </a>
                                        </div>
                                        <div class="col-4">
                                            <a href="#">
                                                @if(isset($item['productAssetList']['4']['path']))
                                                <img class="card-img img-fluid" src="{{config('const.image').$item['productAssetList']['4']['path']}}" alt="Product Image 1">
                                                @endif
                                            </a>
                                        </div>
                                        <div class="col-4">
                                            <a href="#">
                                                @if(isset($item['productAssetList']['5']['path']))
                                                <img class="card-img img-fluid" src="{{config('const.image').$item['productAssetList']['5']['path']}}" alt="Product Image 1">
                                                @endif
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <!--/.Second slide-->
                                <!--Third slide-->
                                <div class="carousel-item">
                                    <div class="row">
                                        <div class="col-4">
                                            <a href="#">
                                                @if(isset($item['productAssetList']['6']['path']))
                                                <img class="card-img img-fluid" src="{{config('const.image').$item['productAssetList']['6']['path']}}" alt="Product Image 1">
                                                @endif
                                            </a>
                                        </div>
                                        <div class="col-4">
                                            <a href="#">
                                                @if(isset($item['productAssetList']['7']['path']))
                                                <img class="card-img img-fluid" src="{{config('const.image').$item['productAssetList']['7']['path']}}" alt="Product Image 1">
                                                @endif
                                            </a>
                                        </div>
                                        <div class="col-4">
                                            <a href="#">
                                                @if(isset($item['productAssetList']['8']['path']))
                                                <img class="card-img img-fluid" src="{{config('const.image').$item['productAssetList']['8']['path']}}" alt="Product Image 1">
                                                @endif
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <!--/.Third slide-->
                            </div>
                            <!--End Slides-->
                        </div>
                        <!--End Carousel Wrapper-->
                        <!--Start Controls-->
                        <div class="col-1 align-self-center">
                            <a href="#multi-item-example" role="button" data-bs-slide="next">
                                <i class="text-dark fas fa-chevron-right"></i>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                        <!--End Controls-->
                    </div>
                </div>
                <!-- col end -->
                <div class="col-lg-7 mt-5">
                    <div class="card">
                        <div class="card-body">
                            <form action={{route("orderconfirm")}} method="get"> 
                                @if ((\Carbon\Carbon::parse($item['releaseDate'])->toDateString() > \Carbon\Carbon::today()->subMonths(2)->toDateString()))
                                <img class="img-fluid" src="./assets/img/new.png" alt="">
                                @endif         
                            <input type="hidden" name="id" value="{{$item['index']}}">
                            <h1 class="h2"><input type="hidden" name="name" value="{{$item['sku']}}">{{$item['sku']}}</h1>
                            <p class="h3 py-2"><input type="hidden" name="price" value="{{$item['listPrice'] * $ratePrice}}"> Үнэ: {{number_format($item['listPrice'] * $ratePrice)}} төгрөг</p>
                            @if(substr($item['additionalAttributions']['displayType']['0'],94) == 'analog')
                            <p class="h3 py-2"><input type="hidden"> Төрөл: Аналог </p>
                            @endif
                            @if(substr($item['additionalAttributions']['displayType']['0'],94) == 'digital')
                            <p class="h3 py-2">Төрөл: Дижитал </p>
                           @else
                           <p class="h3 py-2">Төрөл: Дижитал Аналог хосолсон</p>
                           @endif
                            <p class="h3 py-2">Жин: {{$item['weight']}} грам</p>
                            @if(substr($item['additionalAttributions']['batteryAndBatteryLife']['0'],114) == 'solar')
                            <p class="h3 py-2">Баттерны төрөл: Нарны зай хураагуур</p>
                            <p class="h3 py-2">Баттерны цэнэг: Нарны зай хураагуур</p>
                            @elseif(substr($item['additionalAttributions']['batteryAndBatteryLife']['0'],111) == 'wireless_02')
                            <p class="h3 py-2">Баттерны төрөл: Нарны зай Type-A USB цэнэглэгч</p>
                            <p class="h3 py-2">Баттерны цэнэг: Нарны зай Type-A USB цэнэглэгч</p>
                            @else
                            <p class="h3 py-2">Баттерны цэнэг: {{substr(substr($item['additionalAttributions']['batteryAndBatteryLife']['0'],114,),0,1)}} жил</p>
                            @endif
                              @endforeach
                                <input type="hidden" name="product-title" value="Activewear">
                                <div class="row">
                                    <div class="col-auto">
                                        <ul class="list-inline pb-3">
                                            <li class="list-inline-item text-right">
                                                Тоо ширхэг
                                                <input type="hidden" name="product-quanity" id="product-quanity" value="1">
                                            </li>
                                            <li class="list-inline-item"><span class="btn btn-success" id="btn-minus">-</span></li>
                                            <li class="list-inline-item"><span class="btn-outline-dark" id="var-value">1</span></li>
                                            <li class="list-inline-item"><span class="btn btn-success" id="btn-plus">+</span></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="row pb-3">
                                    <ul class="navbar-nav ms-auto">
                                        <!-- Authentication Links -->
                                        @guest
                                            @if (Route::has('login'))
                                                    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                                                        <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                                                          <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                                                        </symbol>
                                                        <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
                                                          <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
                                                        </symbol>
                                                        <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                                                          <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                                                        </symbol>
                                                      </svg>
                                                      
                                                      <div class="alert alert-warning d-flex align-items-center" role="alert">
                                                        <svg class="bi flex-shrink-0 me-2" width="24" height="24"><use xlink:href="#info-fill"/></svg>
                                                        <div>
                                                            Захиалга хийхийн тулд заавал нэвтэрсэн байх шаардлагтай!!
                                                        </div>
                                                      </div>
                                                <a class="btn btn-outline-dark btn-lg"  href="{{ route('login') }}">Нэвтрэх</a>
                                            </div>
                                            @endif
                                        @else
                                        <div class="col d-grid">
                                            <button type="submit" class="btn btn-outline-dark btn-lg" data-toggle="modal" data-bs-target="#exampleModalCenter">Захиалах</button>
                                        </div>
                                        @endguest
                                    </ul>
                                </div>
                        </div>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </section>
    <!-- Start Article -->
    <section class="py-5">
        <div class="container">
            <div class="row text-left p-2 pb-3">
                <h4>Сүүлд нэмэгдсэн загварууд</h4>
            </div>
            <!--Start Carousel Wrapper-->
            <div id="carousel-related-product">
                @foreach ($shopDetailWatchRelated as $item)
                <div class="p-2 pb-3">
                    <div class="product-wap card rounded-0">
                        <div class="card rounded-0">
                            <a href="{{ route('shopdetail', ['id'=>$item['index']]) }}">
                                @if ((\Carbon\Carbon::parse($item['releaseDate'])->toDateString() > \Carbon\Carbon::today()->subMonths(2)->toDateString()))
                                <img class="img-fluid" src="./assets/img/new.png" alt="">
                                @endif  
                                <img  class="card-img rounded-0 img-fluid" src="{{config('const.image').$item['productAssetList']['0']['path']}}" >
                            <div class="card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center">
                            </div>
                        </div>
                        <div class="card-body">
                            <a href="shop-single.html" class="h5 text-decoration-none">{{$item['sku']}}</a>
                            <ul class="w-100 list-unstyled d-flex justify-content-between mb-0">
                                <li>{{ \Carbon\Carbon::parse($item['releaseDate'])->format('Y оны m сар')}}</li>
                                <li class="pt-2">
                                    <span class="product-color-dot color-dot-red float-left rounded-circle ml-1"></span>
                                    <span class="product-color-dot color-dot-blue float-left rounded-circle ml-1"></span>
                                    <span class="product-color-dot color-dot-black float-left rounded-circle ml-1"></span>
                                    <span class="product-color-dot color-dot-light float-left rounded-circle ml-1"></span>
                                    <span class="product-color-dot color-dot-green float-left rounded-circle ml-1"></span>
                                </li>
                            </ul>
                            <p class="text-center mb-0">{{number_format($item['listPrice']* $ratePrice)}}₮</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- End Article -->
    <!-- End Script -->
    <script>  
    </script>
        @include('layout.footer')
    @endsection