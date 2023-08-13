@extends('layout.common')
@section('title', 'Захиалга')
@include('layout.header')
@section('content')
 <!-- Modal -->
<!-- Start Content Page -->
<div class="container-fluid bg-light py-5">
    <div class="col-md-6 m-auto text-center">
      <p class="p-3 mb-2 bg-success text-white">
        Захилага өгсөнд баяралалаа.<br>
        {{$name}} таны и-мэйл хаягаар төлбөр төлөх дансны дугаар болон мөнгөн дүнг илгээлээ.
      </p>
      <a class="btn btn btn-outline-secondary btn-lg"  href="{{ route('shop') }}">Буцах</a>
        <a class="btn btn-outline-dark btn-lg"  href="{{ route('mypage') }}">Захиалга цуцлах шалгах</a>
    </div>
</div>
@endsection
@include('layout.footer')