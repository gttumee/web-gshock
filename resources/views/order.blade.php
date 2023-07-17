@extends('layout.common')
@section('title', 'Холбоо барих')
@include('layout.header')
@section('content')
 <!-- Modal -->
<!-- Start Content Page -->
<div class="container-fluid bg-light py-5">
    <div class="col-md-6 m-auto text-center">
      <div id="fistorder">
        <h1 class="h1">Захиалга</h1>
        <form action="{{'order'}}" method="POST" id="orderform">
          @csrf <!-- {{ csrf_field() }} -->
          <input type="hidden" value="{{$id}}" name="watchid">
          <input type="hidden" value="{{$quanity}}" name="quanity">
          <input type="hidden" value="{{$totalprice}}" name="totalprice">
          <input type="hidden" value="{{$result}}" name="result">
          <input type="hidden" value="{{$name}}" name="watch_name">
        <table class="table table-bordered">
            <tbody>
              <tr>
                <th scope="row">Нэр</th>
                <td>{{$name}}</td>
              </tr>
              <tr>
                <th scope="row">Тоо ширхэг</th>
                <td>{{$quanity}} ширхэг</td>
              </tr>
              <tr>
                <th scope="row">Нийт үнэ</th>
                <td>{{number_format($totalprice)}} Төгрөг </td>
              </tr> 
            </tbody>
          </table>
        </form>
          <button class="btn btn-secondary btn-lg" id="cancel">Буцах</button>
          @guest
          @if (Route::has('login'))
          <a href="{{ route('facebook-login') }}">
          <button class="btn btn-primary btn-lg" id="orderbutton">facebook-ээр нэвтрэх</button></br></a>
          <span>Та захиалга хийхийн тулд заавал өөрийн facebook-ээр хаягаараа нэвтэрнэ үү.
          </span>
          @endif
          @else
          <button class="btn btn-success btn-lg" id="orderbutton">Үргэлжлүүлэх</button> 
          @endguest
          </div>
          <div id="secondorder">
          <h1 class="h1">Төлбөр төлөх </h1>
            <h4 class="p-3 mb-2 bg-secondary text-white">Та доорх дансанд төлбөрөө төлснөөр захиалга таны гар утсанд мессэжээр мэдээлэл илгээх болно.</h4>
          <table class="table table-bordered">
            <tbody>
              <tr>
                <th scope="row">Банк</th>
                <td>Худалаа хөгжлийн банк</td>
              </tr>
              <tr>
                <th scope="row">Данс дугаар</th>
                <td>4589898989</td>
              </tr>
              <tr>
                <th scope="row">Данс Нэр</th>
                <td>ТЕСТ ТЕСТ</td>
              </tr>
              <tr>
                <th scope="row">Мөнгөн дүн</th>
                <td>{{number_format($totalprice)}} Төгрөг</td>
              </tr>
              <tr>
                <th scope="row">Гүйлгээний утга</th>
                <td>{{$result}} <p id="phonenumber"></p></td>
              </tr>
            </tbody>
          </table>   
          <button class="btn btn-secondary btn-lg" id="cancelorder">Буцах</button>
          <button type="submit" class="btn btn-success btn-lg" form="orderform">Захиалах</button>
        </div>
        </div>
</div>
@endsection
@include('layout.footer')