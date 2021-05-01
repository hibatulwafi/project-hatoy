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
          <li><a href="{{url('qbun')}}">Beranda</a></li>
          <li>Video</li>
        </ol>
      </div>
    </section><!-- End Breadcrumbs -->

   <!-- ======= About Section ======= -->
   <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="row justify-content-end">
          <div class="col-lg-11">
            <div class="row justify-content-end">

            </div>
          </div>
        </div>

        <div class="row">

          <div class="col-lg-6 video-box align-self-baseline">
            <img src="{{asset('user/assets/img/Aren/1.jpg')}}" class="img-fluid" alt="">
            <a href="hhttps://youtu.be/Nr4x7EBY6y0" class="venobox play-btn mb-4" data-vbtype="video" data-autoplay="true"></a>
          </div>

        </div>

      </div>
    </section><!-- End About Section -->
  @endsection
