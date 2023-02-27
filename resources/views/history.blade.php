@extends('layout.common')
@section('title', 'Түүх')
@include('layout.header')
@section('content')
  <!--Main layout-->
  <main class="mt-4 mb-10">
    <div class="card mb-4 w-auto p-3">
        <img class="img-thumbnail" alt="Cinque Terre" src="assets/img/g-shock-first.jpg">
        <div class="card-body">
          <h5 class="card-title">ЗОХИОН БҮТЭЭГЧ</h5>
          <p class="card-text"> Хэзээ ч эврэхгүй цаг бүтээх мөрөөдөл</p>
        1983 онд Японы Casio компанийн инженер Кикуо Ибэ тэрээр төвөөс зугтах болон цохилтын хүч, 
        түүнчлэн усны өндөр даралтыг тэсвэрлэх чадвартай цаг зохион бүтээжээ. Тэр цагаас хойш G-shock нь дэлхийн алдартай брэндийн нэг болж чадсан байна.
        </div>
        <img class="img-thumbnail" alt="Cinque Terre"  src="assets/img/history2.jpg">
        <div class="card-body">
          <h5 class="card-title">ТУРШИЛТУУД</h5>
          <p class="card-text"> Casio компанийн эрэгтэй 3 давхрын 00-ийн цонхоор унагаж туршиж үздэг байв. Унагаад эвдэрсэн тохиолдолд хар 
            лент давхарласаар сүүлдээ бейсболын бөмбөг шиг болсон нь доор зураг 2 жилийн хугацаанд 200 гаруй цаг хийж туршсан боловч зорьж 
            байсан цагаа гаргаж авч чадалгүй арга мухардсан ч эцэст нь зорьсон G-shock-ийг гарган авсан.
        </div>
        <img class="card-img-top" src="assets/img/history4.jpg" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title">АМЕРИКЧУУДЫН АНХААРЛЫГ ТАТСАН НЬ</h5>
          <p class="card-text">Анх 1984 онд Америкд олон хүмүүсийн анхаарлыг татаж 1994 онд нээлтээ хийсэн "Speed" кинонд Киану Ривз анхны загвар болох "DW-5600"-ийг зүүсэн байсан нь G-shock-ийг дэлхийд алдартай болоход нөлөөлсөн гэж үздэг. 
            тэр цагаас G-shock "хурдны загвар" гэж нэрлэгдэх болжээ. G-shock-ийг Америк брэнд гэж андуурдаг хүмүүс цөөнгүй байдаг байна.</p>
        </div>
        <img class="img-thumbnail" alt="Cinque Terre"  src="assets/img/history1.jpg">
        <div class="card-body">
          <h5 class="card-title"></h5>
          Дэлхийн 140 гаруй оронд худалдаанд гарсан бөгөөд нийт үйлдвэрлсэн цагны тоо 140 саяас давжээ.
          Та нэг удаа G-shock-ийн цаг аваад түүний шилдэг технологи, бат бөх чанар гоёомсог дизайныг мэдрээрэй.
          <p class="card-text">
        </div>
      </div>
  </main>
    @endsection
@include('layout.footer')