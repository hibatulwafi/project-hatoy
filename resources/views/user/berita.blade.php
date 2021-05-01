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
          <li><a href="{{url('qbun')}}"">Beranda</a></li>
          <li>Berita</li>
        </ol>
      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog">
      <div class="container">

        <div class="row">
<!-- for each -->
@foreach ($berita ?? '' as $databerita)

          <div class="col-lg-4  col-md-6 d-flex align-items-stretch" data-aos="fade-up">
            <article class="entry">

              <div class="entry-img">
              <img src="{{ asset('storage/'.$databerita->gambar) }}"  alt="" class="img-fluid">
              </div>

              <h2 class="entry-title">
              {{ $databerita->judul }}
              </h2>

              <div class="entry-meta">
                <ul>
                  <li class="d-flex align-items-center"><i class="icofont-user"></i>Admin</a></li>
                  <li class="d-flex align-items-center"><i class="icofont-wall-clock"></i> {{ date('d F,Y',strtotime( $databerita->tanggal)) }}</li>
                </ul>
              </div>

              <div class="entry-content">
                <p>
                {{ substr( $databerita->isi,0,100) }} ..
                
                </p>
                <div class="read-more">
                  <a href="{{url('/detail-user/'.$databerita->id_berita)}}">Read More</a>
                </div>
              </div>

            </article><!-- End blog entry -->
          </div>
@endforeach

<!-- end foreach -->

  </main><!-- End #main -->
  @endsection
