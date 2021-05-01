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
          <li>Sejarah</li>
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
            <img src="{{asset('user/assets/img/teh.jpg')}}" class="img-fluid" alt="">
            <a href="https://www.youtube.com/watch?v=_T_072R6bjo" class="venobox play-btn mb-4" data-vbtype="video" data-autoplay="true"></a>
          </div>

          <div class="col-lg-6 pt-3 pt-lg-0 content">
            <h3>Sejarah Kabupaten Sukabumi</h3>
            Ada yang mengatakan bahwa nama Sukabumi berasal dari bahasa Sunda, yaitu Suka-Bumen, yang bermakna bahwa pada kawasan yang memiliki udara sejuk dan nyaman ini membuat orang-orang suka bumen-bumen atau menetap.  Penjelasan yang lebih masuk akal adalah bahwa nama "Sukabumi" berasal dari bahasa Sansekerta suka, "kesenangan, kebahagiaan, kesukaan" dan bhumi, "bumi". Jadi "Sukabumi" artinya "bumi kesukaan".
Sebelum berstatus kota, Sukabumi hanyalah dusun kecil bernama "Goenoeng Parang" (sekarang Kelurahan Gunungparang) lalu berkembang menjadi beberapa desa seperti Cikole atau Parungseah. Lalu pada 1 April 1914, pemerintah Hindia Belanda menjadikan kota Sukabumi sebagai Burgerlijk Bestuur dengan status Gemeente (Kotapraja) dengan alasan bahwa di kota ini banyak berdiam orang-orang Belanda dan Eropa pemilik perkebunan-perkebunan yang berada di daerah Kabupaten Sukabumi bagian selatan yang harus mendapatkan pengurusan dan pelayanan yang istimewa.
            </p>
          </div>

        </div>

      </div>
    </section><!-- End About Section -->

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
            <h3>Sejarah Perkebunan Kabupaten Sukabumi</h3>
            <p>
            Sejarah Kota dan Kabupaten Sukabumi bermula dari pembukaan lahan perkebunan kopi di wilayah Priangan barat di masa pemerintahan kolonial VOC.[4][5] Karena besarnya permintaan akan komoditas kopi di Eropa, pada tahun 1709 Gubernur Jenderal Abraham van Riebeeck mulai membuka perkebunan kopi di daerah Tjibalagoeng (Bogor), Tjiandjoer, Djogdjogan, Pondok Kopo, dan Goenoeng Goeroeh.[6] 
Perkebunan kopi di kelima daerah ini lalu mengalami perluasan dan peningkatan di era pemerintahan Gubernur Jenderal Hendrick Zwaardecroon (1718-1725), di mana Bupati Tjiandjoer saat itu Wira Tanoe III mendapatkan perluasan wilayah dari Zwaardecroon dengan syarat adanya pembukaan ladang-ladang kopi baru di wilayah tersebut.[7][8]
Seiring waktu, kawasan sekitar perkebunan kopi di Goenoeng Goeroeh berkembang menjadi beberapa pemukiman kecil, salah-satunya adalah kampung Tjikole. Pada tahun 1776, Bupati Tjiandjoer Wiratanu VI membentuk Kepatihan Tjikole yang merupakan pendahulu dari Kabupaten Sukabumi saat ini. Kepatihan Tjikole terdiri dari enam distrik yaitu Distrik Goenoeng Parang, Tjimahi, Tjiheoelang, Tjitjoeroeg, Djampang Koelon, dan Djampang Tengah.
Pusat kepatihannya berada di Tjikole, dikarenakan Tjikole dipandang memiliki lokasi yang sangat strategis untuk komunikasi antara Batavia dan Tjiandjoer yang saat itu merupakan ibu kota dari Karesidenan Priangan.
            </p>
          </div>

        </div>

      </div>
    </section><!-- End About Section -->

    
  </main><!-- End #main -->

  @endsection
