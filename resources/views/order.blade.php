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
          @csrf 
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
              <tr>
                <th scope="row">Нэр<label style="color: red">*</label></th>
                <td>
                  <div class="col-md-12">
                    @if($errors->has('input_name'))
                    <input type="text" class="form-control is-invalid" id="validationServer03"  name="input_name" value="{{ old('input_name') }}">
                    <div id="validationServer03Feedback" class="invalid-feedback">
                      <li>{{$errors->first('input_name')}}</li>
                    </div>
                    @else
                    <input type="text" class="form-control" id="validationServer03"  name="input_name"  value="{{ old('input_name') }}" >
                    @endif
                  </div>    
                  </td>
              </tr> 
              <tr>
                <th scope="row">Утасны дугаар<label style="color: red">*</label></th>
                <td>
                  <div class="col-md-12">
                  @if($errors->has('input_phone'))
                  <input type="text" class="form-control is-invalid" id="validationServer03"  name="input_phone" value="{{ old('input_phone') }}" >
                  <div id="validationServer03Feedback" class="invalid-feedback">
                    <li>{{$errors->first('input_phone')}}</li>
                  </div>
                  @else
                  <input type="text" class="form-control" id="validationServer03"  name="input_phone"  value="{{ old('input_phone') }}" >
                  @endif
                </div>   
              </td>
              </tr>  
            </tbody>
          </table>
        </form>
          <button class="btn btn btn-outline-secondary btn-lg" id="cancelorder" onClick="history.back()">Буцах</button>
          <button type="submit" class="btn btn-outline-dark btn-lg" form="orderform">Захиалах</button>
        </div>
        </div>
</div>
@endsection
@include('layout.footer')