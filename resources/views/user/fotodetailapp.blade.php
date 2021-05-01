@extends('user.master')

@section('content')

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="breadcrumb-hero">
        <div class="container">
          <div class="breadcrumb-hero">
            <h2></h2>
            <p></p>
          </div>
        </div>
      </div>
      <div class="container">
        <ol>
          <li><a href="{{url('qbun')}}">Home</a></li>
          <li>Portfolio Details</li>
        </ol>
      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Portfolio Details Section ======= -->
    <section id="portfolio-details" class="portfolio-details">
      <div class="container">

        <div class="portfolio-details-container">

          <div class="owl-carousel portfolio-details-carousel">
            <img src="{{asset('user/assets/img/Bimtek_Kopi/1.jpg')}}" class="img-fluid" alt="">
            <img src="{{asset('user/assets/img/Bimtek_Kopi/2.jpg')}}" class="img-fluid" alt="">
            <img src="{{asset('user/assets/img/Bimtek_Kopi/3.jpg')}}" class="img-fluid" alt="">
            <img src="{{asset('user/assets/img/Bimtek_Kopi/4.jpg')}}" class="img-fluid" alt="">
            <img src="{{asset('user/assets/img/Bimtek_Kopi/5.jpg')}}" class="img-fluid" alt="">
            <img src="{{asset('user/assets/img/Bimtek_Kopi/6.jpg')}}" class="img-fluid" alt="">
            <img src="{{asset('user/assets/img/Bimtek_Kopi/7.jpg')}}" class="img-fluid" alt="">
            <img src="{{asset('user/assets/img/Bimtek_Kopi/8.jpg')}}" class="img-fluid" alt="">
            <img src="{{asset('user/assets/img/Bimtek_Kopi/9.jpg')}}" class="img-fluid" alt="">
          </div>

          <!--<div class="portfolio-info">
            <h3>Informasi Kegiatan</h3>
            <ul>
              <li><strong>Kategori</strong>: Pelatihan</li>
              <li><strong>Lokasi</strong>: ASU Company</li>
              <li><strong>Tanggal</strong>: 01 March, 2020</li>
            </ul>
          </div>-->

        </div>

        <!--<div class="portfolio-description">
          <h2>This is an example of portfolio detail</h2>
          <p>
            Autem ipsum nam porro corporis rerum. Quis eos dolorem eos itaque inventore commodi labore quia quia. Exercitationem repudiandae officiis neque suscipit non officia eaque itaque enim. Voluptatem officia accusantium nesciunt est omnis tempora consectetur dignissimos. Sequi nulla at esse enim cum deserunt eius.
          </p>
        </div>-->

      </div>

    </section> End Portfolio Details Section 

  </main><!-- End #main -->
  @endsection