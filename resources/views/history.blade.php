@extends('layout.common')
@section('title', 'Түүх')
@include('layout.header')
@section('content')
  <!--Main layout-->
  <main class="mt-4 mb-10">
    <div class="card mb-2 w-auto p-3">
        <img class="img-thumbnail" alt="Cinque Terre"  src="assets/img/g-shock_1.jpg">
        <div class="card-body">
          <h5 class="card-title fw-bold">ЗОХИОН БҮТЭЭГЧ</h5>
          <p class="card-text ">Casio Computer Компанийн инжинер Кикуо Ибэ</p>
          1981 онд Casio Computer Компанийн Кикуо Ибэ ааваасаа бэлэг нд авсан цагаа ажил дээрээ санамсаргүйгээр унагаад эвдэлчихсэн нь 
          g-shock анх бүтээгдэх эхлэл байсан гэдэг. Тухайн үед цаг унасан л бол эвдрэх нь хэвийн үзэгдэл гэсэн нийтлэг итгэл 
          үнэмшлийг G-shock бүтээгдсэнээр халж орхисон гэдэг.
        </div>
        <div class="card-body">
          <h5 class="card-title fw-bold">ТУРШИЛТУУД</h5>
          <p class="card-text"> Casio компанийн 3 давхарт байрлах эрэгтэй 00-ийн цонхоор унагаж туршиж үздэг байв. 
            Унасан ч эвдрэхээргүй цаг гаргаж авахын тулд 2 жил гаруй туршилт  хийсэн боловч төлөвлөсөн бүтээгдэхүүнээ гаргаж авч чадалгүй арга мухардан суухдаа
             Кикуо Ибэ нэгэн хүүхэд бөмбөгөөр 
            тоглож байхыг хараад резинэн бөмбөг дотор цаг хөвж буйгаар төсөөлснөөр g-shock-ийн технологийг бодож олсон гэдэг.
        </div>
        <div class="card-body">
          <h5 class="card-title fw-bold ">АМЕРИКЧУУДЫН АНХААРЛЫГ ТАТСАН НЬ</h5>
          <p class="card-text">Анх 1984 онд Америкд худалдаанд гарч олон хүмүүсийн анхаарлыг татаж 
            1994 онд нээлтээ хийсэн "Speed" кинонд Киану Ривз анхны загвар болох "DW-5600"-ийг зүүсэн байсан нь G-shock-ийг 
            дэлхийд алдартай болоход нөлөөлсөн гэж үздэг. 
            Тэр цагаас G-shock "хурдны загвар" гэж нэрлэгдэх болжээ. G-shock-ийг Америк брэнд гэж андуурдаг хүмүүс цөөнгүй байдаг байна.</p>
        </div>
        <img class="img-thumbnail" alt="Cinque Terre"  src="assets/img/speed.jpg">

        <div class="card-body">
          <h5 class="card-title fw-bold">G-SHOCK ОДОО</h5>
          Дэлхийн 140 гаруй оронд худалдаанд гарсан бөгөөд нийт үйлдвэрлсэн цагны тоо 140 саяас давжээ.
          Та нэг удаа G-shock-ийн цаг аваад түүний шилдэг технологи, бат бөх чанар гоёомсог дизайныг заавал мэдрээрэй.
          <p class="card-text">
        </div>
      </div>
  </main>
    @endsection
@include('layout.footer')