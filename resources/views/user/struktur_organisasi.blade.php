@extends('user.master')

@section('content')
  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="breadcrumb-hero">
        <div class="container">
          <div class="breadcrumb-hero">
            <h2></h2>
            <p> </p>
          </div>
        </div>
      </div>
      <div class="container">
        <ol>
          <li><a href="{{ url('beranda') }}">Home</a></li>
          <li>Struktur Organisasi</li>
        </ol>
      </div>
    </section><!-- End Breadcrumbs -->
    <section id="work-process" class="work-process">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2></h2>
          <p></p>
        </div>

        <div class="row content">
          <div class="col-md-5" data-aos="fade-right">
            <img src="{{asset('user/assets/img/so.png')}}" class="img-fluid" alt="" >
          </div>
          <div class="col-md-7 pt-4" data-aos="fade-left">
            <h3></h3>
            
          </div>
        </div>
      </div>
    </section>
  </main><!-- End #main -->
  @endsection