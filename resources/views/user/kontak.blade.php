@extends('user.master')

@section('content')

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="breadcrumb-hero">
        <div class="container">
          <div class="breadcrumb-hero">
            <h2>  </h2>
            <p> </p>
          </div>
        </div>
      </div>
      <div class="container">
        <ol>
          <li><a href="{{ url('qbun') }}">Beranda</a></li>
          <li>Kontak</li>
        </ol>
      </div>
    </section><!-- End Breadcrumbs -->
  
      <!-- ======= Contact Section ======= -->
      <section id="contact" class="contact">
      <div class="container">
        <div class="row mt-5">

          <div class="col-lg-4" data-aos="fade-right">
            <div class="info">
              <div class="address">
                <i class="icofont-google-map"></i>
                <h4>Lokasi :</h4>
                <p>Jalan Raya Cisolok Km.10 Cisolok-Palabuhanratu, Kabupaten Sukabumi</p>
              </div>

              <div class="email">
                <i class="icofont-paper-plane"></i>
                <h4>Kode Pos :</h4>
                <p>43366</p>
              </div>

              <div class="email">
                <i class="icofont-envelope"></i>
                <h4>Email :</h4>
                <p>dinaspertanian_kab.sukabumi@yahoo.co.id</p>
              </div>

              <div class="phone">
                <i class="icofont-phone"></i>
                <h4>Telp/Fax :</h4>
                <p>(0266) 436407-436408</p>
              </div>

            </div>

          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main>
  <!-- End #main -->

@endsection
