@extends('layout.common')
@section('title', 'Эхлэл')
@include('layout.header')
@section('content')
    <!-- Modal -->
    <div class="modal fade bg-white" id="templatemo_search" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="w-100 pt-1 mb-5 text-right">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="get" class="modal-content modal-body border-0 p-0">
                <div class="input-group mb-2">
                    <input type="text" class="form-control" id="inputModalSearch" name="q" placeholder="Search ...">
                    <button type="submit" class="input-group-text bg-success text-light">
                        <i class="fa fa-fw fa-search text-white"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>
    <!-- Start Banner Hero -->
    <div id="template-mo-zay-hero-carousel" class="carousel slide" data-bs-ride="carousel">
        <ol class="carousel-indicators">
            <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="0" class="active"></li>
            <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="1"></li>
            <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="container">
                    <div class="row p-5">
                        <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                            <img class="img-fluid" src="./assets/img/first.png" alt="">
                        </div>
                        <div class="col-lg-6 mb-0 d-flex align-items-center">
                            <div class="text-align-left align-self-center">
                                <h1 class="h2">G-SHOCK Анхны загвар </h1>
                                <h1 class="h2">DW-5000C</h1>
                                <h3 class="h2">1983 он</h3>
                                <p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="container">
                    <div class="row p-5">
                        <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                            <img class="img-fluid" src="./assets/img/first_analog.png" alt="">
                        </div>
                        <div class="col-lg-6 mb-0 d-flex align-items-center">
                            <div class="text-align-left">
                                <h1 class="h2">G-SHOCK Анхны аналог загвар </h1>
                                <h1 class="h2">AWM-500-1AJF</h1>
                                <h3 class="h2">1989 он</h3>
                                <p>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="container">
                    <div class="row p-5">
                        <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                            <img class="img-fluid" src="./assets/img/image412.png" alt="">
                        </div>
                        <div class="col-lg-6 mb-0 d-flex align-items-center">
                            <div class="text-align-left">
                                <h1 class="h2">G-SHOCK Анхны метал загвар </h1>
                                <h1 class="h2">MTG-B2000B-1A2JF </h1>
                                <h3 class="h2">2000 он</h3>
                                <p>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev text-decoration-none w-auto ps-3" href="#template-mo-zay-hero-carousel"
            role="button" data-bs-slide="prev">
            <i class="fas fa-chevron-left"></i>
        </a>
        <a class="carousel-control-next text-decoration-none w-auto pe-3" href="#template-mo-zay-hero-carousel"
            role="button" data-bs-slide="next">
            <i class="fas fa-chevron-right"></i>
        </a>
    </div>
    <!-- End Banner Hero -->


    <!-- Start Categories of The Month -->
    <section class="container py-5">
        <div class="row text-center pt-3">
            <div class="col-lg-6 m-auto">
                <h1 class="h1">Ангилал</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-4 p-5 mt-3">
                <a href="{{route('shop',['types=analog'])}}"><img src="./assets/img/analog.png" class="rounded-circle img-fluid border"></a>
                <h5 class="text-center mt-3 mb-3">Аналог</h5>
                <p class="text-center"><a class="btn btn-outline-dark btn-lg" href="{{route('shop',['types=analog'])}}">Захиалга</a></p>
            </div>
            <div class="col-12 col-md-4 p-5 mt-3">
                <a href="{{route('shop',['types=digital'])}}"><img src="./assets/img/digital.png" class="rounded-circle img-fluid border"></a>
                <h2 class="h5 text-center mt-3 mb-3">Дижитал</h2>
                <p class="text-center"><a class="btn btn-outline-dark btn-lg" href="{{route('shop',['types=analog'])}}">Захиалга</a></p>
            </div>
            <div class="col-12 col-md-4 p-5 mt-3">
                <a href="{{route('request')}}"><img src="./assets/img/digtal_ananlog.png" class="rounded-circle img-fluid border"></a>
                <h2 class="h5 text-center mt-3 mb-3">Аналог Дижитал хосолсон </h2>
                <p class="text-center"><a class="btn btn-outline-dark btn-lg" href="{{route('shop',['types=digital-analog'])}}">Захиалга</a></p>
            </div>
        </div>
    </section>
    <!-- End Categories of The Month -->


    <!-- Start Featured Product -->
    <section class="bg-light">
        <div class="container py-5">
            <div class="row text-center py-3">
                <div class="col-lg-6 m-auto">
                    <h1 class="h1">Хамгийн их захиалагдсан</h1>
                </div>
            </div>
            <div class="row">
                @foreach($shopDetailWatchRelated as $items)
                <div class="col-12 col-md-4 mb-4">
                    <div class="card h-100">
                        <a href="shop-single.html">
                            <a href="{{ route('shopdetail', ['id'=>$items['index']]) }}">
                                 @if ((\Carbon\Carbon::parse($items['releaseDate'])->toDateString() > \Carbon\Carbon::today()->subMonths(2)->toDateString()))
                                <img class="img-fluid" src="./assets/img/new.png" alt="">
                                @endif  
                            <img src="{{config('const.image').$items['productAssetList']['0']['path']}}" class="card-img-top" alt="...">
                        </a>
                        <div class="card-body">
                            <ul class="list-unstyled d-flex justify-content-between">
                                <li class="text-muted text-right">{{$items['sku']}}</li>
                            </ul>
                            {{ \Carbon\Carbon::parse($items['releaseDate'])->format('Y оны m сар')}}
                            <p class="card-text">
                                <p class="text-center mb-0">{{number_format($items['listPrice']* $ratePrice)}}₮</p>
                            </p>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </section>
    <!-- End Featured Product -->
@endsection
@include('layout.footer')