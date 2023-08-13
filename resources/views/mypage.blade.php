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
                <h1 class="h1">таны захиалсан цаг</h1>
            </div>
        </div>
        @if($myWatch->count()==0)
        Танд одоогоор захиалсан цаг алга байна.
        @endif
        <div class="row">
            @foreach($myWatch as $items)
            <div class="col-12 col-md-4 mb-4">
                <div class="card h-100">
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
                            <li class="text-muted text-right">Огноо: {{$items->created_at}}</li>
                        </ul>
                        @if($items->status == 0)
                        <ul class="list-unstyled d-flex justify-content-between">
                            <li class="text-warning bg-dark"> Статус: Төлөгдөөгүй</li>
                        </ul>
                        <a href="{{ route('mypage', ['id'=>$items->id]) }}" class="btn btn-danger btn-lg" onclick="return confirm('Та цуцлахдаа итгэлтэй байна уу')">цуцлах</a>
                        @elseif($items->status == 1)
                        <ul class="list-unstyled d-flex justify-content-between">
                            <li class="text-warning bg-dark"> Статус: Төлөгдсөн</li>
                        </ul>
                        @elseif($items->status == 2)
                        <ul class="list-unstyled d-flex justify-content-between">
                            <li class="text-warning bg-dark"> Статус: Захиалагдсан</li>
                        </ul>
                        @elseif($items->status == 3)
                        <ul class="list-unstyled d-flex justify-content-between">
                            <li class="text-warning bg-dark"> Статус: Захиалга дууссан</li>
                        </ul>
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