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
          <li>Visi Misi</li>
        </ol>
      </div>
    </section><!-- End Breadcrumbs -->


    <!-- ======= Work Process Section ======= -->
    <section id="work-process" class="work-process">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>Visi</h2>
          <p>Terwujudnya argabisnis perkebunan yang produktif, efisien, berdaya saing dan berkelanjutan untuk meningkatkan kemakmuran dan kesejahteraan masyarakat perkebunan secara berkeadilan</p>
        </div>

        <div class="row content">
          <div class="col-md-5" data-aos="fade-right">
            <img src="{{asset('user/assets/img/ca.jpg')}}" class="img-fluid" alt="">
          </div>
          <div class="col-md-7 pt-4" data-aos="fade-left">
            <h3>Misi Pembangunan Kabupaten Sukabumi</h3>
            <ul>
              <li><i class="icofont-check"></i> Meningkatkan pembangunan agribisnis perkebunan yang berkelanjutan melalui penerapan " Good Agriculture Practices (GAP)" dan optimalisasi pemanfaatan sumberdaya secara efisien dan efektif.</li>
              <li><i class="icofont-check"></i> Meningkatkan kemampuan sumberdaya manusia perkebunanyang memiliki kemampuan teknis dan berusaha serta mempunyai integritas moral yang bersih dan peduli.</li>
              <li><i class="icofont-check"></i> Meningkatkan akses terhadap informasi pasar, teknologi, permodalan, sarana prasarana bagi masyarakat perkebunan.</li>
              <li><i class="icofont-check"></i> Meningkatkan nilai tambah produk perkebunan di sentra-sentra produksi.</li>
            </ul>
          </div>
        </div>
      </div>
    </section><!-- End Work Process Section -->

  </main><!-- End #main -->

  @endsection