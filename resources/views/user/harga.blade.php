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
          <li>Harga Komoditas</li>
        </ol>
      </div>
    </section><!-- End Breadcrumbs -->
    
     <!-- ======= Cta Section ======= -->
     <section id="cta" class="cta">
      <div class="container" data-aos="fade-in">

        <div class="text-center">
          <h3>Harga Komoditi Perkebunan Kabupaten Sukabumi</h3>

                        <div class="row">
                            <div class="col-12">
                                <div class="card m-b-20">
                                    <div class="card-body">                           
                                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>
                                            <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama Komoditas</th>
                                    <th scope="col">Tahun</th>
                                    <th scope="col">Wujud Produksi</th>
                                    <th scope="col">Harga Rata</th>
                                </tr>
                                            </thead>


                                            <tbody>
                                        @php
                                        $no = 1;
                                        @endphp
                                            @foreach ($laporanharga ?? '' as $dataharga)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $dataharga->nama_komoditas }}</td>
                                        <td>{{ $dataharga->tahun }}</td>
                                        <td>{{ $dataharga->wujud_produksi }}</td>
                                        <td>{{ number_format($dataharga->harga_rata) }}</td>
                                        
                                    </tr>
                                @endforeach
                                            </tbody>
                                        </table>
                                    
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->
          <a class="cta-btn" href="{{asset('user/assets/laporan/harga.pdf')}}">Download</a>
        </div>

      </div>
    </section><!-- End Cta Section -->
    
  </main><!-- End #main -->

@endsection
