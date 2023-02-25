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
  @if(isset($data))  
  <table class="table">
    <thead class="thead-dark">
        <tr>
          <th scope="col" ></th>
          <th scope="col" class="col-md-1">Зураг</th>
          <th scope="col">Нэр</th>
          <th scope="col">Захиалга сонгох</th>
          <th scope="col">Өнгө сонгох</th>
          <th scope="col">Захилах</th>
        </tr>
      </thead>
      <tbody>  
      @foreach($data as $items)
      <form action="{{route('request')}}" method="post">
        @csrf
        <tr>
          <th></th>
          <td><img  class="card-img rounded-0 img-fluid" src="assets/img/{{$items['sku']}}.jpg" ></td>
          <td> {{$items['sku']}} </td>
          <input type="hidden" name="id" value="{{$items['index']}}">
          <td><select class="form-select" name="select">
            <option value="0" >--Сонгох--</option>
            <option value="case" >Кэйс</option>
            <option value="belt">Оосор</option>
            <option value="battery">Баттери</option>
            <option value="set">Сэт</option>
          </select>   
          <td>
            <input type="text" name="color" placeholder="Өнгө оруулана уу">
          </td>
          <td><input class="btn btn-success btn-lg" type="submit" value="Захиалах" ></td>
        </tr>
        @endforeach
      </form>

        @endif
      </tbody>
    </table>
  </form>
  </div>
@endsection
@include('layout.footer')