@extends('layout.common')
@section('title', 'Админ')
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
            <table class="table table-bordered border-primary">
                <thead>
                  <tr>
                    <th scope="col">З.дугаар</th>
                    <th scope="col">Нэр</th>
                    <th scope="col">Утас</th>
                    <th scope="col">Тоо</th>
                    <th scope="col">Нийт Үнэ</th>
                    <th scope="col">Огноо</th>
                    <th scope="col">статус</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($myWatch as $items)
               
                    @if($items->status =='10')
                    <tr class="table-danger">
                    <td> {{$items->ordernumber}}</td>
                    <td> {{$items->inputname}}</td>
                    <td> {{$items->inputphonenumber}}</td>
                    <td>{{$items->quanity}}</td>
                    <td>{{number_format($items->totalprice)}}₮</td>
                    <td>{{ \Carbon\Carbon::parse($items->create_at)->format('Y-m-d')}}</td>
                    <td>
                        <a href="{{ route('mypage', ['id'=>$items->id,'status'=>'0']) }}" class="btn btn-warning" onclick="return confirm('Та цуцлахдаа итгэлтэй байна уу')">Төлөгдөөгүй</a></br>
                        <a href="{{ route('mypage', ['id'=>$items->id,'status'=>'1']) }}" class="btn btn-info" onclick="return confirm('Төлсөн рүү шилжүүлхэд итгэлтэй байна уу')">Төлөгдсөн</a></br>
                        <a href="{{ route('mypage', ['id'=>$items->id,'status'=>'2']) }}" class="btn btn-primary" onclick="return confirm('Түр хүлээнэ үү рүү итгэлтэй байна уу')">Захиалсан..</a></br>
                        <a href="{{ route('mypage', ['id'=>$items->id,'status'=>'3']) }}" class="btn btn-success" onclick="return confirm('Дууссан　良かったですね！！')">Хүргэгдсэн</a></br>
                    </td>
                  </tr>
                    @else
                    <tr  class="table-success">
                    <td> {{$items->ordernumber}}</td>
                    <td> {{$items->inputname}}</td>
                    <td> {{$items->inputphonenumber}}</td>
                    <td>{{$items->quanity}}</td>
                    <td>{{number_format($items->totalprice)}}₮</td>
                    <td>{{ \Carbon\Carbon::parse($items->create_at)->format('Y-m-d')}}</td>
                    <td>
                        <a href="{{ route('mypage', ['id'=>$items->id,'status'=>'0']) }}" class="btn btn-warning" onclick="return confirm('Та цуцлахдаа итгэлтэй байна уу')">Төлөгдөөгүй</a></br>
                        <a href="{{ route('mypage', ['id'=>$items->id,'status'=>'1']) }}" class="btn btn-info" onclick="return confirm('Төлсөн рүү шилжүүлхэд итгэлтэй байна уу')">Төлөгдсөн</a></br>
                        <a href="{{ route('mypage', ['id'=>$items->id,'status'=>'2']) }}" class="btn btn-primary" onclick="return confirm('Түр хүлээнэ үү рүү итгэлтэй байна уу')">Захиалсан..</a></br>
                        <a href="{{ route('mypage', ['id'=>$items->id,'status'=>'3']) }}" class="btn btn-success" onclick="return confirm('Дууссан　良かったですね！！')">Хүргэгдсэн</a></br>
                    </td>
                    @endif
                  </tr>
                  @endforeach
                </tbody>
              </table>
            {{ $myWatch->links('pagination::bootstrap-4') }}
        </div>
    </div>
</section>
@endsection
@include('layout.footer')