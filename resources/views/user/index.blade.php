@extends('user.master')

@section('content')
  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div class="hero-container" data-aos="fade-up">
      <h1>Selamat Datang di Perkebunan
      <br>Kabupaten Sukabumi</h2>
    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="row justify-content-end">
          <div class="col-lg-11">
            <div class="row justify-content-end">

              <div class="col-lg-3 col-md-5 col-6 d-md-flex align-items-md-stretch">
                <div class="count-box py-5">
                  <i class="icofont-tree"></i>
                  <span data-toggle="counter-up">{{$kec}}</span>
                  <p>Kecamatan</p>
                </div>
              </div>

              <div class="col-lg-3 col-md-5 col-6 d-md-flex align-items-md-stretch">
                <div class="count-box py-5">
                  <i class="icofont-tree"></i>
                  <span data-toggle="counter-up">{{$komo}}</span>
                  <p>Komoditas</p>
                </div>
              </div>

              <div class="col-lg-3 col-md-5 col-6 d-md-flex align-items-md-stretch">
                <div class="count-box pb-5 pt-0 pt-lg-5">
                  <i class="icofont-tree"></i>
                  <span data-toggle="counter-up">{{$pk}}</span>
                  <p>Pekebun</p>
                </div>
              </div>

              <div class="col-lg-3 col-md-5 col-6 d-md-flex align-items-md-stretch">
                <div class="count-box pb-5 pt-0 pt-lg-5">
                  <i class="icofont-tree"></i>
                  <span data-toggle="counter-up">{{$per}}</span>
                  <p>Rata-Rata Produksi</p>
                </div>
              </div>

            </div>
          </div>
        </div>

        <div class="row">

          <div class="col-lg-12">
          <h3><center>Peta Lokasi Kebun Kab Sukabumi</center></h3>
          </br>
          <div id='map' style='width: 100%; height: 500px;'></div>  
          </div>

          <form method="get"  action="{{ url('maps-user') }}" id="form" data-parsley-validate="" novalidate="">
            <div class="form-group row">
                
                <div class="col-12 col-lg-12">
                    <br>
                </div>
                <div class="col-8 col-lg-8 float-right text-right">
                <select name="id" type="text" required="" class="form-control">
                @foreach ($komoditas ?? '' as $p)
                <option value="{{$p->id_komoditas}}">{{$p->nama_komoditas}}</option>
                @endforeach
                </select>

                </div>  

                <div class="col-lg-1 float-right text-right">
                    <button type="submit" class="btn btn-success">Save</button>
                </div>

            </div>
            </form>

        </div>

      </div>
    </section><!-- End About Section -->

    <!-- ======= Cta Section =======
    <section id="cta" class="cta">
      <div class="container" data-aos="fade-in">

        <div class="text-center">
          <h3>Berita Terbaru</h3>
          <p> 
          </p>
           <a class="cta-btn" href="{{ url('berita-user')}}">Berita</a>
        </div>

      </div>
    </section> End Cta Section -->

    <!-- ======= Our Clients Section ======= -->
    <section id="clients" class="clients">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>Galeri</h2>
          <p></p>
        </div>

        <div class="owl-carousel clients-carousel" data-aos="fade-up">
          <img src="{{asset('user/assets/img/clients/client-1.png')}}" alt="">
          <img src="{{asset('user/assets/img/clients/2.png')}}" alt="">
          <img src="{{asset('user/assets/img/clients/3.png')}}" alt="">
          <img src="{{asset('user/assets/img/clients/4.png')}}" alt="">
          <img src="{{asset('user/assets/img/clients/5.png')}}" alt="">
          <img src="{{asset('user/assets/img/clients/6.png')}}" alt="">
          <img src="{{asset('user/assets/img/clients/7.png')}}" alt="">
          <img src="{{asset('user/assets/img/clients/8.png')}}" alt="">
          <img src="{{asset('user/assets/img/clients/9.png')}}" alt="">
        </div>

      </div>
    </section><!-- End Our Clients Section -->


    <!-- ======= Services Section ======= -->
   <!-- <section id="services" class="services  section-bg ">
      <div class="container">

        <div class="section-title pt-5" data-aos="fade-up">
          <h2>Our Services</h2>
        </div>

        <div class="row">
          <div class="col-md-6">
            <div class="icon-box" data-aos="fade-up">
              <div class="icon"><i class="las la-basketball-ball" style="color: #ff689b;"></i></div>
              <h4 class="title"><a href="">Lorem Ipsum</a></h4>
              <p class="description">Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident</p>
            </div>
          </div>
          <div class="col-md-6">
            <div class="icon-box" data-aos="fade-up">
              <div class="icon"><i class="las la-book" style="color: #e9bf06;"></i></div>
              <h4 class="title"><a href="">Dolor Sitema</a></h4>
              <p class="description">Minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat tarad limino ata</p>
            </div>
          </div>

          <div class="col-md-6" data-aos="fade-up" data-aos-delay="100">
            <div class="icon-box">
              <div class="icon"><i class="las la-file-alt" style="color: #3fcdc7;"></i></div>
              <h4 class="title"><a href="">Sed ut perspiciatis</a></h4>
              <p class="description">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur</p>
            </div>
          </div>
          <div class="col-md-6" data-aos="fade-up" data-aos-delay="100">
            <div class="icon-box">
              <div class="icon"><i class="las la-tachometer-alt" style="color:#41cf2e;"></i></div>
              <h4 class="title"><a href="">Magni Dolores</a></h4>
              <p class="description">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>
            </div>
          </div>

          <div class="col-md-6" data-aos="fade-up" data-aos-delay="200">
            <div class="icon-box">
              <div class="icon"><i class="las la-globe-americas" style="color: #d6ff22;"></i></div>
              <h4 class="title"><a href="">Nemo Enim</a></h4>
              <p class="description">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque</p>
            </div>
          </div>
          <div class="col-md-6" data-aos="fade-up" data-aos-delay="200">
            <div class="icon-box">
              <div class="icon"><i class="las la-clock" style="color: #4680ff;"></i></div>
              <h4 class="title"><a href="">Eiusmod Tempor</a></h4>
              <p class="description">Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi</p>
            </div>
          </div>
        </div>

      </div>
    </section>--><!-- End Services Section -->

  </main><!-- End #main -->

<script>
        mapboxgl.accessToken = 'pk.eyJ1IjoiYW5kaWthbnAiLCJhIjoiY2tmdDd2dnZqMHZmMzJxbzgxbDlnbXF6ayJ9.0byTApAQB5DaY7ycr-h8fg';
        var map = new mapboxgl.Map({
        container: 'map',
        style: 'mapbox://styles/mapbox/streets-v11',
        center: [106.9242804814092,-6.922011778169306],
        zoom: 12
    });

        @foreach($ops as $data)      

        //create popup 
        var popup = new mapboxgl.Popup({ offset: 25}).setHTML(
            'Kecamatan : {{ $data->nama_kecamatan }}'+'<br>Komoditas : {{ $data->nama_komoditas }}'
            +'<br>Luas (Ha) : {{ $data->luas }}'
          
        );

        var marker = new mapboxgl.Marker()
        .setLngLat([{{ $data->long }},{{ $data->lat }}]) 
        .setPopup(popup)
        .addTo(map);               
        @endforeach

        map.addControl(
new MapboxGeocoder({
accessToken: mapboxgl.accessToken,
mapboxgl: mapboxgl
})
);


     
</script>


  @endsection
