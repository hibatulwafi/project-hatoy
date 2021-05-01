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
          <li>Berita</li>
        </ol>
      </div>
    </section><!-- End Breadcrumbs -->

 <section id="blog" class="blog">
      <div class="container">

        <div class="row">

          <div class="col-lg-8 entries">

            <article class="entry entry-single">

              <div class="entry-img">
              <img src="{{ asset('storage/'.$result['master'][0]->gambar) }}"  alt="" class="img-fluid">
              </div>

              <h2 class="entry-title">
              @if(count($result) >0 ) {{$result['master'][0]->judul}} @endif
              </h2>

              <div class="entry-meta">
                <ul>
                  <li class="d-flex align-items-center"><i class="icofont-user"></i> <a href="blog-single.html">Admin</a></li>
                  <li class="d-flex align-items-center"><i class="icofont-wall-clock"></i> {{ date('d F,Y',strtotime($result['master'][0]->tanggal)) }}</li>
                </ul>
              </div>
              <style type="text/css">
              .justify{text-align:justify;}
              </style>
              <div class="entry-content">
                <th colspan="6" style="background-color:#e1e1e1;font-weight:bold;text-align:center;"> <h5  class="justify"> @if(count($result) >0 ) {{$result['master'][0]->isi}} @endif </h5>
                </th>
              </div>

              <div class="entry-footer clearfix">
                <div class="float-left">
                  
                </div>

                <div class="float-right share">
                  <a href="" title="Share on Twitter"><i class="icofont-twitter"></i></a>
                  <a href="" title="Share on Facebook"><i class="icofont-facebook"></i></a>
                  <a href="" title="Share on Instagram"><i class="icofont-instagram"></i></a>
                </div>

              </div>

          </div><!-- End blog entries list -->

          <div class="col-lg-4">

            <div class="sidebar">

              <h3 class="sidebar-title">Postingan Belakangan ini</h3>
              <div class="sidebar-item recent-posts">
              @foreach ($berita ?? '' as $databerita)

                <div class="post-item clearfix">
                  <img src="{{ asset('storage/'.$databerita->gambar) }}"  alt="" >
                  <h4><a href="{{url('/detail-user/'.$databerita->id_berita)}}">{{ substr($databerita->judul,0,40) }}..</a>
                  </h4>
                  <time datetime="2020-01-01"> {{ date('d F,Y',strtotime( $databerita->tanggal)) }}</time>
                </div>
                @endforeach


              </div><!-- End sidebar recent posts-->

            </div><!-- End sidebar -->

          </div><!-- End blog sidebar -->

        </div>

      </div>
    </section><!-- End Blog Section -->

    </section><!-- End Blog Section -->

  </main><!-- End #main -->
  @endsection
