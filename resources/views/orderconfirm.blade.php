@extends('layout.common')
@section('title', 'Холбоо барих')
@include('layout.header')
@section('content')
 <!-- Modal -->
<!-- Start Content Page -->
<div class="container-fluid bg-light py-5">
    <div class="col-md-6 m-auto text-center">
      <p class="p-3 mb-2 bg-success text-white">
        Захилага өгсөнд баяралалаа.<br>
        {{$name}} танд захиалга баталгаажиж Монголд буух хугацааг {{$phone}} дугаарт мессежээр мэдээлэх болно.
      </p>
      <p class="p-3 mb-2 bg-secondary text-white">
        Хэрэв та захиалга цуцлах бол 77879987 дугаарт захиалын дугаарыг 3 хоногын мэдэгдэнэ үү {{$ordernumber}}
      </p>
    </div>
</div>
@endsection
@include('layout.footer')