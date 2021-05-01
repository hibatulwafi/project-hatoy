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
          <li><a href="{{ url('beranda') }}">Beranda</a></li>
          <li>Tujuan & Fungsi</li>
        </ol>
      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Frequently Asked Questions Section ======= -->
    <section id="faq" class="faq section-bg">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>Tujuan dan Fungsi</h2>
          <p></p>
        </div>

        <div class="row faq-item d-flex align-items-stretch" data-aos="fade-up">
          <div class="col-lg-5">
            <i class="bx bxl-discourse"></i>
            <h4>Meningkatkan Peningkatan Masyarakat.</h4>
          </div>
          <div class="col-lg-7">
            <p>
              Ekonomi -> Peningkatan kemakmuran dan kesejahteraan rakyat serta penguatan struktur ekonomi wilayah dan nasional.
            </p>
          </div>
        </div><!-- End F.A.Q Item-->

        <div class="row faq-item d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
          <div class="col-lg-5">
            <i class="bx bxl-discourse"></i>
            <h4>Meningkatkan penerimaan negara.</h4>
          </div>
          <div class="col-lg-7">
            <p>
              Ekologi -> Peningkatan konservasi tanah dan air, penyerap karbon, penyedia oksigen, dan penyangga kawasan lindung
            </p>
          </div>
        </div><!-- End F.A.Q Item-->

        <div class="row faq-item d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
          <div class="col-lg-5">
            <i class="bx bxl-discourse"></i>
            <h4>Meningkatkan penerimaan devisa negara.</h4>
          </div>
          <div class="col-lg-7">
            <p>
              Sosial Budaya -> Perekat dan pemersatu bangsa.
            </p>
          </div>
        </div><!-- End F.A.Q Item-->

        <div class="row faq-item d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="300">
          <div class="col-lg-5">
            <i class="bx bxl-discourse"></i>
            <h4>Menyediakan lapangan kerja</h4>
          </div>
          <div class="col-lg-7">
            <p>
            </p>
          </div>
        </div><!-- End F.A.Q Item-->

        <div class="row faq-item d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="400">
          <div class="col-lg-5">
            <i class="bx bxl-discourse"></i>
            <h4>Meningkatkan produktivitas, nilai tambah dan daya saing.</h4>
          </div>
          <div class="col-lg-7">
            <p>
            </p>
          </div>
        </div><!-- End F.A.Q Item-->

        <div class="row faq-item d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="400">
          <div class="col-lg-5">
            <i class="bx bxl-discourse"></i>
            <h4>Memenuhi kebutuhan komsumsi dan bahan baku industri DN.</h4>
          </div>
          <div class="col-lg-7">
            <p>
            </p>
          </div>
        </div><!-- End F.A.Q Item-->

        <div class="row faq-item d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="400">
          <div class="col-lg-5">
            <i class="bx bxl-discourse"></i>
            <h4>Mengoptimalkan pengelolaan SDA secara berkelanjutan.</h4>
          </div>
          <div class="col-lg-7">
            <p>
            </p>
          </div>
        </div><!-- End F.A.Q Item-->

      </div>
    </section><!-- End Frequently Asked Questions Section -->

  </main><!-- End #main -->
  @endsection