
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dinas Perkebunan Kab Sukabumi</title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link rel="shortcut icon" href="{{ URL::asset('assets/images/kab.ico')}}">
  <link href="{{asset('user/assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('user/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('user/assets/vendor/icofont/icofont.min.css')}}" rel="stylesheet">
  <link href="{{asset('user/assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('user/assets/vendor/venobox/venobox.css')}}" rel="stylesheet">
  <link href="{{asset('user/assets/vendor/line-awesome/css/line-awesome.min.css')}}" rel="stylesheet">
  <link href="{{asset('user/assets/vendor/owl.carousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
  <link href="{{asset('user/assets/vendor/aos/aos.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{asset('user/assets/css/style.css')}}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Serenity - v2.1.0
  * Template URL: https://bootstrapmade.com/serenity-bootstrap-corporate-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->

  <script src="{{ url('https://api.mapbox.com/mapbox-gl-js/v1.12.0/mapbox-gl.js') }}"></script>
        <script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.5.1/mapbox-gl-geocoder.min.js"></script>
        <link href="{{ url('https://api.mapbox.com/mapbox-gl-js/v1.12.0/mapbox-gl.css') }}" rel="stylesheet" />
        <link rel="stylesheet" href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.5.1/mapbox-gl-geocoder.css" type="text/css"/>
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex">

      <div class="logo mr-auto">
        <!-- <h1 class="text-light"><a href="{{ url('qbun') }}">Qbun Kab Sukabumi</a></h1>-->
        <!-- Uncomment below if you prefer to use an image logo -->
        <a href="{{ url('qbun') }}"><img src="{{ URL::asset('assets/images/2.png')}}" alt="" class="img-fluid" style="width:120px;"></a>
      </div>

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li class="active"><a href="{{ url('qbun') }}">Beranda</a></li>

          <li class="drop-down"><a href="#">Profil</a>
            <ul>
              <li><a href="{{ url('sejarah') }}">Sejarah</a></li>
              <li><a href="{{ url('visimisi') }}">Visi Misi</a></li>
              <li><a href="{{ url('tujuan') }}">Tujuan dan Fungsi</a></li>
              <li><a href="{{ url('struktur_organisasi') }}">Struktur Organisasi</a></li>
            </ul>
          </li>

          <li class="drop-down"><a href="#">Galeri</a>
            <ul>
              <li><a href="{{ url('foto') }}">Foto</a></li>
              <li><a href="{{ url('video') }}">Video</a></li>
            </ul>
          </li>
          <li class="drop-down"><a href="#">Info Publik</a>
            <ul>
              <li><a href="{{ url('statistik')}}">Statistik Perkebunan</a></li>
              <li><a href="{{ url('harga')}}">Harga Komoditi Perkebunan</a></li>
            </ul>
          </li>
          <li><a href="{{ url('berita-user')}}">Berita</a>
          </li>
          <li><a href="{{ url('kontak')}}">Kontak</a></li>
        </ul>
      </nav><!-- .nav-menu -->

    </div>
  </header><!-- End Header -->

  @yield('content')
  
  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-4 col-md-6 footer-info">
            <h3>Perkebunan</h3>
            <p>Perkebunan  merupakan  kegiatan    yang  mengusahakan  tanaman  tertentu  pada  tanah  dan/atau  media  tumbuh  lainnya  dalam  ekosistem  yang  sesuai,  mengolah  dan  memasarkan  barang  dan  jasa    hasil  tanaman  tersebut,  dengan  bantuan  ilmu  pengetahuan  dan  teknologi,  permodalan  serta  manajemen  untuk  mewujudkan kesejahteraan bagi pelaku usaha perkebunan dan masyarakat.</p>
          </div>

          <div class="col-lg-4 col-md-6 footer-links">
            <h4>Tautan</h4>
            <ul>
              <li><a href="{{ url('qbun') }}">Beranda</a></li>
              <li><a href="{{ url('visi') }}">Visi&Misi</a></li>
              <li><a href="{{ url('informasi') }}">Berita</a></li>
              <li><a href="{{ url('statistik') }}">Statistik</a></li>
              <li><a href="{{ url('kontak') }}">Kontak</a></li>
            </ul>
          </div>

          <div class="col-lg-4 col-md-6 footer-contact">
            <h4>Kontak</h4>
            <p>
            Jalan Raya Cisolok Km.10 <br>
            Cisolok-Palabuhanratu<br>
             Kabupaten Sukabumi<br>
              <strong>Tel/Fax:</strong> (0266) 436407-43640<br>
              <strong>Email:</strong> dinaspertanian_kab.sukabumi@yahoo.co.id<br>
            </p>

            <div class="social-links">
              <a href="#" class="twitter"><i class="icofont-twitter"></i></a>
              <a href="#" class="facebook"><i class="icofont-facebook"></i></a>
              <a href="#" class="instagram"><i class="icofont-instagram"></i></a>
            </div>

          </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>Qbun</span></strong>-Sukabumi  by Andikanp</span>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{asset('user/assets/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('user/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('user/assets/vendor/jquery.easing/jquery.easing.min.js')}}"></script>
  <script src="{{asset('user/assets/vendor/php-email-form/validate.js')}}"></script>
  <script src="{{asset('user/assets/vendor/waypoints/jquery.waypoints.min.js')}}"></script>
  <script src="{{asset('user/assets/vendor/counterup/counterup.min.js')}}"></script>
  <script src="{{asset('user/assets/vendor/venobox/venobox.min.js')}}"></script>
  <script src="{{asset('user/assets/vendor/owl.carousel/owl.carousel.min.js')}}"></script>
  <script src="{{asset('user/assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
  <script src="{{asset('user/assets/vendor/aos/aos.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{asset('user/assets/js/main.js')}}"></script>

</body>

</html>