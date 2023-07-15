@extends('layout.common')
@section('title', 'Захилага')
@include('layout.header')
@section('content')
 <!-- Modal -->
<!-- Start Content Page -->
<div class="container-fluid bg-light py-5">
  <form action="{{route('request')}}" method="GET">
    <div class="col-md-6 m-auto text-center">
      Захиалах цагны нэрийг хайлтын хэсэгт хайна уу
      <div class="input-group">
         <input type="search" class="form-control rounded" placeholder="Цагны нэр оруулна уу " aria-label="хайлт" aria-describedby="search-addon" name="search"/>
        <button type="submit" class="btn btn-success btn-lg px-3"><i class="fas fa-search"></i></button>
      </div>
    </div>
    <div class="col-md-6 m-auto text-center">
      @if(session('message'))
      <div class="alert alert-success">{{session('message')}}</div>
          @else
      <div class="alert alert-success">дээрх хэсэгт цагны нэрээр хайна уу</div>
      @endif
    </div>
  </div>
  @if(isset($data))  
  <div class="row">  
    @foreach ($data as $item)
    <div class="col-md-2">
        <div class="card mb-4 product-wap rounded-0">
            <div class="card rounded-0">
                   <a href="{{ route('shopdetail', ['id'=>$item['index']]) }}"> 
                    <img  class="card-img rounded-0 img-fluid" src="{{'https://www.casio.com/'.$item['productAssetList']['0']['path']}}" >
                <div
                    class="card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center">
                </div>
            </div>
            <div class="card-body">
                <a href="{{ route('shopdetail', ['id'=>$item['index']]) }}" class="h3 text-decoration-none">{{$item['sku']}}</a></br>
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
            </div>
            <div class="col d-grid">
              <button type="submit" class="btn btn-success btn-lg" data-toggle="modal" data-bs-target="#exampleModalCenter">Сонгох</button>
          </div>
        </div>
    </div>
    @endforeach
</div>
  @endif
  </form>
  </div>
</div>
@endsection
@include('layout.footer')