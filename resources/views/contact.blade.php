@extends('layout.common')
@section('title', 'Холбоо барих')
@include('layout.header')
@section('content')
 <!-- Modal -->
<!-- Start Content Page -->
<div class="container-fluid bg-light py-5">
    <div class="col-md-6 m-auto text-center">
        <h1 class="h1">Холбоо барих</h1>
        <p>
            та мэйл хаяг аль эсвэл утасны дугаараа заавал оруулна уу 
        </p>
    </div>
</div>
<!-- Start Contact -->
<div class="container py-5">
    <div class="row py-5">
        <form class="col-md-9 m-auto" method="post" action="{{route('contact')}}" role="form">
            @csrf <!-- {{ csrf_field() }} -->
            <div class="row">
            @if(session('message'))
        <div class="alert alert-success">{{session('message')}}</div>
            @endif
                <div class="form-group col-md-6 mb-3">
                    <label for="inputname">Нэр </label><label style="color: red">*</label>
                    <input type="text" class="form-control mt-1" id="name" name="name" placeholder="Нэр">
                    @if($errors->has('name'))
                    @foreach($errors->get('name') as $message)
                    <p class="text-danger">{{ $message }}</p>  <br>
                    @endforeach
                   @endif
                </div>
                <div class="form-group col-md-6 mb-3">
                    <label for="inputemail">И-мэйл</label><label style="color: red">*</label>
                    <input type="email" class="form-control mt-1" id="email" name="email" placeholder="И-мэйл"  type="text" required="required"
                    oninvalid="this.setCustomValidity('И-мэйл оруулна уу')"
                    onvalid="this.setCustomValidity('')">
                    @if($errors->has('email'))
                    @foreach($errors->get('email') as $message)
                    <p class="text-danger">{{ $message }}</p>  <br>
                    @endforeach
                   @endif
                </div>
            </div>
            <div class="mb-3">
                <label for="inputsubject">Утас</label><label style="color: red">*</label>
                <input type="text" class="form-control mt-1" id="phone" name="phone" placeholder="Утас" required="required"
                oninvalid="this.setCustomValidit('Утасны дугаар оруулна уу')"
                onvalid="this.setCustomValidit('')">
                @if($errors->has('phone'))
                    @foreach($errors->get('phone') as $message)
                    <p class="text-danger">{{ $message }}</p>  <br>
                    @endforeach
                   @endif
            </div>
            <div class="mb-3">
                <label for="inputmessage">Мэссэж</label><label style="color: red">*</label>
                <textarea class="form-control mt-1" id="message" name="message" placeholder="Мэссэж" rows="8"></textarea>
                @if($errors->has('message'))
                @foreach($errors->get('message') as $message)
                <p class="text-danger">{{ $message }}</p>  <br>
                @endforeach
               @endif
            </div>
            <div class="row">
                <div class="col text-end mt-2">
                    <button type="submit" class="btn btn-outline-dark btn-lg">Илгээх</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
@include('layout.footer')