@extends('layout.common')
@section('title', 'G-shock Түүх')
@include('layout.header')
@section('content')
  <!--Main layout-->
  <main class="mt-4 mb-10">
    <div class="card mb-4 w-auto p-3">
        <img class="img-thumbnail" alt="Cinque Terre" src="assets/img/g-shock-first.jpg">
        <div class="card-body">
          <h5 class="card-title">Card title</h5>
          <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
        </div>
        <img class="card-img-top" src="assets/img/gshock-ibe-180130.jpg" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title">Card title</h5>
          <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
        </div>
      </div>
  </main>
    @endsection
@include('layout.footer')