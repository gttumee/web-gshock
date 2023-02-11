@extends('layout.common')
@section('title', 'Холбоо барих')
@include('layout.header')
@section('content')
 <!-- Modal -->
<!-- Start Content Page -->
<section class="bg-light">
    <div class="container pb-5">
        <div class="row">
            <div class="col-lg-3 mt-5">
                <div class="card mb-3">
                    <ul class="list-inline">
                        <li class="list-inline-item">
                        </li>
                        <li class="list-inline-item">
                            <div>
                            <p class="text-muted"><strong>Нэр: {{$name}}</strong></p>
                            <p class="text-muted"><strong>Нийт үнэ: {{$totalprice}} Төгрөг</strong></p>
                            <p class="text-muted"><strong>Тоо ширхэг: {{$quanity}} Ширхэг</strong></p>
                            {{-- <p class="text-muted"><strong>Данс:Худалаа хөгжлийн банк 132456789</strong></p>
                            <p class="text-muted"><strong>Данс Нэр:Ганболд Анхтуяа</strong></p>
                            <p class="text-muted"><strong>Гүйлгээний утга:{{$result}} + Утасны дугаар</strong></p> --}}
                            <div class="form-outline mb-4">
                                <label class="form-label" for="form3Example3">Нэр</label>
                                <input type="email" id="form3Example3" class="form-control form-control-lg"
                                  placeholder="өөрийн нэр оруулна уу" />
                              </div>
                              <div class="form-outline mb-4">
                                <label class="form-label" for="form3Example3">Утас</label>
                                <input type="email" id="form3Example3" class="form-control form-control-lg"
                                  placeholder="Утаны дугаар эсвэл имэйл хаяг" />
                              </div>
                            <div class="col d-grid">
                                 <button type="submit" class="btn btn-success btn-lg" id="confirm">Баталгаажуулах</button>
                                 <button id="btn1">Append text</button>

                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- col end -->
            </div>
        </div>
    </div>
</section>
<script>
$(document).ready(function(){
  $("#btn1").click(function(){
    
    $("p").append(" <b>Appended text</b>.");
  });
});
</script>
@endsection
@include('layout.footer')