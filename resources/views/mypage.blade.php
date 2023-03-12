@extends('layout.common')
@section('title', 'Миний хуудас')
@include('layout.header')
@section('content')
 <!-- Modal -->
<!-- Start Content Page -->
<section class="bg-light">
    <div class="container py-5">
        <div class="row text-center py-3">
            <div class="col-lg-6 m-auto">
                <h1 class="h1">таны захиалсан цагнууд</h1>
            </div>
        </div>
        @if($myWatch->count()==0)
        Танд одоогоор захиалсан цаг алга байна.
        @endif
        <div class="row">
            @foreach($myWatch as $items)
            <div class="col-12 col-md-4 mb-4">
                <div class="card h-100">
                    <a href="shop-single.html">
                        <img src="./assets/img/{{$items->watch_name}}.jpg" class="card-img-top" alt="...">
                    </a>
                    <div class="card-body">
                        <ul class="list-unstyled d-flex justify-content-between">
                            <li class="text-muted text-right">Захиалын дугаар: {{$items->ordernumber}}</li>
                        </ul>
                        <ul class="list-unstyled d-flex justify-content-between">
                            <li class="text-muted text-right">Тоо ширхэг: {{$items->quanity}}</li>
                        </ul>
                        <ul class="list-unstyled d-flex justify-content-between">
                            <li class="text-muted text-right">Нийт үнэ: {{number_format($items->totalprice)}}₮</li>
                        </ul>
                        <ul class="list-unstyled d-flex justify-content-between">
                            <li class="text-muted text-right">Огноо: {{ \Carbon\Carbon::parse($items->create_at)->format('Y-m-d')}}</li>
                        </ul>
                        @if($items->status == 1)
                        <button class="btn btn-success btn-lg" id="orderbutton">төлөгдсөн</button>
                        @else
                        <button class="btn btn-success btn-lg" id="orderbutton">төлөх</button>
                        <a href="{{ route('mypage', ['id'=>$items->id]) }}" class="btn btn-danger btn-lg" onclick="return confirm('Та цуцлахдаа итгэлтэй байна уу')">цуцлах</a>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
            {{ $myWatch->links('pagination::bootstrap-4') }}
        </div>
    </div>
</section>
@endsection
@include('layout.footer')