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
          <li>Foto</li>
        </ol>
      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">
      <div class="container">

        <div class="row">
          <div class="col-lg-12 d-flex justify-content-center" data-aos="fade-up">
            <ul id="portfolio-flters">
              <li data-filter="*" class="filter-active">Semua</li>
              <li data-filter=".filter-app">Kopi</li>
              <li data-filter=".filter-card">Aren</li>
              <li data-filter=".filter-web">Sereh Wangi</li>
              <li data-filter=".filter-test">Lainnya</li>
            </ul>
          </div>
        </div>

        <div class="row portfolio-container" data-aos="fade-up">

          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <div class="portfolio-wrap">
              <img src="{{asset('user/assets/img/Bimtek_Kopi/1.jpg')}}" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Bimtek pengolahan kopi</h4>
                <p>Sukaraja 2020</p>
                <div class="portfolio-links">
                  <a href="{{asset('user/assets/img/Bimtek_Kopi/1.jpg')}}" data-gall="portfolioGallery" class="venobox" title="Kopi"><i class="bx bx-plus"></i></a>
                  <a href="{{url('fotodetailapp')}}" title="More Details"><i class="bx bx-link"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-test">
            <div class="portfolio-wrap">
              <img src="{{asset('user/assets/img/distribusi/3.jpg')}}" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Pendistribusian alat pengolahan</h4>
                <p>Sukaraja 2020</p>
                <div class="portfolio-links">
                  <a href="{{asset('user/assets/img/distribusi/3.jpg')}}" data-gall="portfolioGallery" class="venobox" title="Lainnya"><i class="bx bx-plus"></i></a>
                  <a href="{{url('fotodetailweb')}}" title="More Details"><i class="bx bx-link"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <div class="portfolio-wrap">
              <img src="{{asset('user/assets/img/Bimtek_Kopi/7.jpg')}}" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Kegiatan perencanaan penciptaan desa wisata kopi </h4>
                <p>Sukaraja 2020</p>
                <div class="portfolio-links">
                  <a href="{{asset('user/assets/img/Bimtek_Kopi/7.jpg')}}" data-gall="portfolioGallery" class="venobox" title="Kopi"><i class="bx bx-plus"></i></a>
                  <a href="{{url('fotodetailapp')}}" title="More Details"><i class="bx bx-link"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-card">
            <div class="portfolio-wrap">
              <img src="{{asset('user/assets/img/Aren/3.jpg')}}" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Kegiatan Pengawasan Produksi Gula Semut Aren</h4>
                <p>Kecamatan Cisolok</p>
                <div class="portfolio-links">
                  <a href="{{asset('user/assets/img/Aren/1.jpg')}}" data-gall="portfolioGallery" class="venobox" title="Card 2"><i class="bx bx-plus"></i></a>
                  <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-web">
            <div class="portfolio-wrap">
              <img src="{{asset('user/assets/img/Sereh/2.jpg')}}" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Kegiatan sosialisasi dan fasilitasi pasar minyak sereh wangi </h4>
                <p>Ciemas 2020</p>
                <div class="portfolio-links">
                  <a href="{{asset('user/assets/img/Sereh/1.jpg')}}" data-gall="portfolioGallery" class="venobox" title="Web 2"><i class="bx bx-plus"></i></a>
                  <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <div class="portfolio-wrap">
              <img src="{{asset('user/assets/img/Bimtek_Kopi/15.jpg')}}" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Pengawasan produksi kopi</h4>
                <p>Gegerbitung 2020</p>
                <div class="portfolio-links">
                  <a href="{{asset('user/assets/img/Bimtek_Kopi/15.jpg')}}" data-gall="portfolioGallery" class="venobox" title="Kopi"><i class="bx bx-plus"></i></a>
                  <a href="{{url('fotodetailapp')}}" title="More Details"><i class="bx bx-link"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <div class="portfolio-wrap">
              <img src="{{asset('user/assets/img/Bimtek_Kopi/20.jpg')}}" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Kegiatan bimtek budidaya dan pengolahan kopi</h4>
                <p>Kecamatan Cisolok tahun 2020</p>
                <div class="portfolio-links">
                  <a href="{{asset('user/assets/img/Bimtek_Kopi/17.jpg')}}" data-gall="portfolioGallery" class="venobox" title="Kopi"><i class="bx bx-plus"></i></a>
                  <a href="{{url('fotodetailapp')}}" title="More Details"><i class="bx bx-link"></i></a>
                </div>
              </div>
            </div>
          </div>

      

        </div>

      </div>
    </section><!-- End Portfolio Section -->

  </main><!-- End #main -->
  @endsection
