@extends('layout.common')
@section('title', 'G-shock')
@include('layout.header')
@section('content')
<!-- Modal --> 
    <!-- Start Content -->
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-3">
                <h3 class="h3 pb-6">Нийт: {{count($data)}}</h3>
                <ul class="list-unstyled templatemo-accordion">
                    <li class="pb-3">
                        <a class="collapsed d-flex justify-content-between h3 text-decoration-none" href="#">
                            Батерейний төрлөөр
                            <i class="fa fa-fw fa-chevron-circle-down mt-1"></i>
                        </a>  
                        <ul class="collapse show list-unstyled pl-3">
                            <li><a class="text-decoration-none" href="{{route('shop',['battery=other'])}}">Батерей </a></li>
                            <li><a class="text-decoration-none" href="{{route('shop',['battery=solar'])}}">Нарны зай хураагуур</a></li>
                        </ul>
                    </li>
                    <li class="pb-3">
                        <a class="collapsed d-flex justify-content-between h3 text-decoration-none" href="#">
                            Цагны төрлөөр
                            <i class="pull-right fa fa-fw fa-chevron-circle-down mt-1"></i>
                        </a>
                        <ul id="collapseTwo" class="collapse list-unstyled pl-3">
                            <li><a class="text-decoration-none"  href="{{route('shop',['types=digital'])}}">Дижитал</a></li>
                            <li><a class="text-decoration-none"  href="{{route('shop',['types=analog'])}}">Аналог</a></li>
                            <li><a class="text-decoration-none"  href="{{route('shop',['types=digital-analog'])}}">Дижитал Аналог</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="col-lg-9">
                <div class="row">
                    <div class="col-md-6">
                        <ul class="list-inline shop-top-menu pb-3 pt-1">
                                <li class="list-inline-item">
                                    <a class="h4 text-dark text-decoration-none mr-3"  href="{{route('shop',['type=low'])}}">Хямд ↓</a>
                                </li>
                            <li class="list-inline-item">
                                <a class="h4 text-dark text-decoration-none mr-3" href="{{route('shop',['type=higth'])}}">Үнэтэй ↑</a>
                            </li>
                            <li class="list-inline-item">
                                <a class="h4 text-dark text-decoration-none"  href="{{route('shop',['type=new'])}}">Шинэ↑</a>
                            </li>
                            <li class="list-inline-item">
                                <a class="h4 text-dark text-decoration-none"  href="{{route('shop',['type=old'])}}">Хуучин ↓</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-4 pb-3">
                    <form  action="{{ route('shop') }}" accept="get" enctype="application/x-www-form-urlencoded	" >
                        @csrf
                   <div class="input-group">
                    <input type="search" class="form-control rounded" placeholder="хайх" aria-label="хайлт"  name="search" value="{{ old('search') }}" />
                    <button type="submit" class="btn btn-success btn-lg px-3"><i class="fas fa-search"></i></button>
                    </div>
                    </form>
                    </div>
                </div>
                <div class="row">  
                    @foreach ($data as $item)
                    <div class="col-md-4">
                        <div class="card mb-4 product-wap rounded-0">
                            <div class="card rounded-0">
                                   <a href="{{ route('shopdetail', ['id'=>$item['index']]) }}"> 
                                    @if ((\Carbon\Carbon::parse($item['releaseDate'])->toDateString() > \Carbon\Carbon::today()->subMonths(2)->toDateString()))
                                    <img class="img-fluid" src="./assets/img/new.png" alt="">
                                    @endif 
                                    <img  class="card-img rounded-0 img-fluid hidezurag" src="{{config('const.image').$item['productAssetList']['0']['path']}}" >
                                <div
                                    class="card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center">
                                </div>
                            </div>
                            <div class="card-body">
                                <a href="{{ route('shopdetail', ['id'=>$item['index']]) }}" class="h3 text-decoration-none">{{$item['sku']}}</a></br>   
                                <a href="{{ route('shopdetail', ['id'=>$item['index']]) }}" class="h3 text-decoration-none"> {{ \Carbon\Carbon::parse($item['releaseDate'])->format('Y оны m сар')}}</a>
                                <ul class="w-100 list-unstyled d-flex justify-content-between mb-0">
                                    <li class="pt-2">
                                        <span
                                            class="product-color-dot color-dot-red float-left rounded-circle ml-1"></span>
                                        <span
                                            class="product-color-dot color-dot-blue float-left rounded-circle ml-1"></span>
                                        <span
                                            class="product-color-dot color-dot-black float-left rounded-circle ml-1"></span>
                                        <span
                                            class="product-color-dot color-dot-light float-left rounded-circle ml-1"></span>
                                        <span
                                            class="product-color-dot color-dot-green float-left rounded-circle ml-1"></span>
                                    </li>
                                </ul>
                              <p class="text-center mb-0 fw-bold">{{number_format($item['listPrice']* $ratePrice+config('const.une'))}}₮</p>
                                <button name='mybutton' class="btn btn-dark" id="{{$item['sku']}}" type="button">Like <i class="far fa-thumbs-up"></i></button>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        
    </div>
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

