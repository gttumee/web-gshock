@extends('layout.common')
@section('title', 'G-shock')
@include('layout.header')
@section('content')
    <!-- Open Content -->
    <section class="bg-light">
        <div class="container pb-5">
            <div class="row">
                @foreach($shopDetailWatch as $item)    
                <div class="col-lg-5 mt-5">
                    <div class="card mb-3">
                        <small class="h6 m-2">gshock.casio.com</small>
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
                                @csrf
                                @if ((\Carbon\Carbon::parse($item['releaseDate'])->toDateString() > \Carbon\Carbon::today()->subMonths(2)->toDateString()))
                                <img class="img-fluid" src="./assets/img/new.png" alt="">
                                @endif         
                            <input type="hidden" name="id" value="{{$item['index']}}">
                            <h1 class="h2"><input type="hidden" name="name" value="{{$item['sku']}}">{{$item['sku']}}</h1>
                            <p class="h3 py-2"><input type="hidden" name="price" value="{{$item['listPrice'] * $ratePrice}}"> Үнэ: {{number_format($item['listPrice'] * $ratePrice+config('const.une'))}} төгрөг</p>
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
                            <p class="h3 py-2">Батарей: Нарны зай хураагуур</p>
                            <p class="h3 py-2">Цэнэг: Нарны зай хураагуур</p>
                            @elseif(substr($item['additionalAttributions']['batteryAndBatteryLife']['0'],111) == 'wireless_02')
                            <p class="h3 py-2">Батарей: Нарны зай Type-A USB цэнэглэгч</p>
                            <p class="h3 py-2">Цэнэг: Нарны зай Type-A USB цэнэглэгч</p>
                            @else
                            <p class="h3 py-2">Цэнэг: {{substr(substr($item['additionalAttributions']['batteryAndBatteryLife']['0'],114,),0,1)}} жил</p>
                            @endif
                              @endforeach
                              <div class="mb-2">
                                <button name='mybutton' class="btn btn-dark" id="{{$item['sku']}}" type="button">Like <i class="far fa-thumbs-up"></i></button>
                              </div>
                              <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <strong>Захиалга</strong> болон бусад мэдээллийг доорх "Мессежээр холбогдох" товчийг дарж чатаар лавлана уу
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                              </div>
                                <div class="row pb-3">
                                    <ul class="navbar-nav ms-auto">
                                        <div class="col d-grid">                
                                            <a href="https://www.facebook.com/profile.php?id=61550717050412" target="_blank" class="btn btn-outline-dark btn-lg">    Мэссэжээр холбогдох</a>
                                        </div>
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
                <h4>Энэ сард нэмэгдсэн загварууд</h4>
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
                            <p class="text-center mb-0">{{number_format($item['listPrice']* $ratePrice+config('const.une'))}}₮</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
@include('layout.footer')
<script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script type="text/javascript">
$(function() {
  $("button[name='mybutton']").click(function() {
    var id = this.id;
    $.ajax({
      type: 'get',
      url: 'like/'+id,
      data: id,
      headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
    })
    .done(function (data) {
        console.log(data);
    })
    .fail(function () {
      console.log('fail'); 
    });
    var $this = $(this);
    if ($this.hasClass('highlighted')) {
      $this.removeClass('highlighted');
      $this.text('Like');
    } else {
      $this.addClass('highlighted');
      $this.text('Unlike');
    }
  });
});
</script>