@extends('layouts.master')

@section('css')
<link rel="stylesheet" href="{{ URL::asset('assets/plugins/morris/morris.css')}}">
@endsection

@section('content')
            <div class="container-fluid">

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="page-title-box">
                                    <h4 class="page-title">Dashboard</h4>
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item active">
                                           Halo, Selamat datang {{Auth::user()->name}}
                                        </li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->

            <div class="row">
                @if(date("m") == 6 || date("m") == 7)
                <div class="col-xl-12 col-md-12"> 
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <h6> <strong>Selamat Kenaikan Kelas!! </strong> ubah status kenaikan kelas disini <a href="#"> Klik Disini</a> </h6>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                </div>
                @endif

                <div class="col-xl-3 col-md-6">   
                    <div class="card mini-stat bg-primary">
                        <div class="card-body mini-stat-img">
                            <div class="mini-stat-icon">
                                <i class="mdi mdi-account-multiple float-right"></i>
                            </div>
                            <div class="text-white">
                                <h6 class="text-uppercase mb-3">Jumlah <br/> Siswa</h6>
                                <h4 class="mb-4">{{number_format($totalsiswa)}}</h4>
<!--                                 <span class="badge badge-success"> +11 </span> <span class="ml-2">Bertambah Dari Tahun Lalu</span>
 -->                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6">   
                    <div class="card mini-stat bg-warning">
                        <div class="card-body mini-stat-img">
                            <div class="mini-stat-icon">
                                <i class="mdi mdi-numeric-7-box float-right"></i>
                            </div>
                            <div class="text-white">
                                <h6 class="text-uppercase mb-3">Jumlah <br/> Siswa Kelas 7</h6>
                                <h4 class="mb-4">
                                    @php $totalsemua = 0; @endphp
                                    @foreach($totalperkelas as $data)
                                        @if(substr($data->kelas,0,-2) == 'VII')
                                            <?php 
                                            $total = DB::table('tb_siswa')->where('kelas',"=",$data->kelas)->count(); 
                                            $totalsemua = $totalsemua + $total;
                                            ?>
                                        @endif
                                    @endforeach
                                    {{$totalsemua}}
                                </h4>
<!--                                 <span class="badge badge-success"> +11 </span> <span class="ml-2">Bertambah Dari Tahun Lalu</span>
 -->                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6">   
                    <div class="card mini-stat bg-warning">
                        <div class="card-body mini-stat-img">
                            <div class="mini-stat-icon">
                                <i class="mdi mdi-numeric-8-box float-right"></i>
                            </div>
                            <div class="text-white">
                                <h6 class="text-uppercase mb-3">Jumlah <br/> Siswa Kelas 8</h6>
                                <h4 class="mb-4">
                                    @php $totalsemua = 0; @endphp
                                    @foreach($totalperkelas as $data)
                                        @if(substr($data->kelas,0,-2) == 'VIII')
                                            <?php 
                                            $total = DB::table('tb_siswa')->where('kelas',"=",$data->kelas)->count(); 
                                            $totalsemua = $totalsemua + $total;
                                            ?>
                                        @endif
                                    @endforeach
                                    {{$totalsemua}}
                                </h4>
<!--                                 <span class="badge badge-success"> +11 </span> <span class="ml-2">Bertambah Dari Tahun Lalu</span>
 -->                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6">   
                    <div class="card mini-stat bg-warning">
                        <div class="card-body mini-stat-img">
                            <div class="mini-stat-icon">
                                <i class="mdi mdi-numeric-9-box float-right"></i>
                            </div>
                            <div class="text-white">
                                <h6 class="text-uppercase mb-3">Jumlah <br/> Siswa Kelas 9</h6>
                                <h4 class="mb-4">
                                    @php $totalsemua = 0; @endphp
                                    @foreach($totalperkelas as $data)
                                        @if(substr($data->kelas,0,-2) == 'IX')
                                            <?php 
                                            $total = DB::table('tb_siswa')->where('kelas',"=",$data->kelas)->count(); 
                                            $totalsemua = $totalsemua + $total;
                                            ?>
                                        @endif
                                    @endforeach
                                    {{$totalsemua}}
                                </h4>
<!--                                 <span class="badge badge-success"> +11 </span> <span class="ml-2">Bertambah Dari Tahun Lalu</span>
 -->                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-md-12">   
                    <div class="card mini-stat bg-info">
                        <div class="card-body mini-stat-img">
                            <div class="mini-stat-icon">
                                <i class="mdi mdi-currency-usd float-right"></i>
                            </div>
                            <div class="text-white">
                                <h6 class="text-uppercase mb-3">Pendapatan <br/>Hari Ini</h6>
                                <h4 class="mb-4">Rp.{{number_format($hariini)}}</h4>
                                <span class="badge badge-warning float-right"> {{date("D, d-m-Y")}} </span>

                            </div>
                        </div>
                    </div>
                </div>

                 <div class="col-xl-4 col-md-12">   
                    <div class="card mini-stat bg-info">
                        <div class="card-body mini-stat-img">
                            <div class="mini-stat-icon">
                                <i class="mdi mdi-calendar-check float-right"></i>
                            </div>
                            <div class="text-white">
                                <h6 class="text-uppercase mb-3">Pendapatan <br/>Bulan Ini</h6>
                                <h4 class="mb-4">Rp.{{number_format($bulanini)}}</h4>
                                <span class="badge badge-warning float-right"> {{date("M Y")}} </span>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-md-12">   
                    <div class="card mini-stat bg-success">
                        <div class="card-body mini-stat-img">
                            <div class="mini-stat-icon">
                                <i class="mdi mdi-calculator float-right"></i>
                            </div>
                            <div class="text-white">
                                <h6 class="text-uppercase mb-3">Pendapatan Total / Semester Sekarang</h6>
                                <h4 class="mb-4">Rp.{{number_format($tahunan)}}</h4>
                                <span class="badge badge-warning float-right"> {{date("Y")}} </span>

                            </div>
                        </div>
                    </div>
                </div>

                 <div class="col-xl-6 col-lg-12">
                        <div class="card m-b-20">
                            <div class="card-body">
                                <h4 class="mt-0 header-title mb-4">Aktifitas Terbaru</h4>

                                <ol class="activity-feed mb-0">
                                    <li class="feed-item">
                                        <div class="feed-item-list">
                                            <span class="date">Jun 25</span>
                                            <span class="activity-text">Ahmad Input Data</span>
                                        </div>
                                    </li>
                                    <li class="feed-item">
                                        <div class="feed-item-list">
                                            <span class="date">Jun 24</span>
                                            <span class="activity-text">Fahmi Request Delete Data</span>
                                        </div>
                                    </li>
                                    <li class="feed-item">
                                        <div class="feed-item-list">
                                            <span class="date">Jun 23</span>
                                            <span class="activity-text">Wafi Logged in App</span>
                                        </div>
                                    </li>
                                   
                                </ol>

                                <div class="text-center">
                                    <a href="#" class="btn btn-sm btn-primary">Load More</a>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-xl-6 col-md-12">
                        <div class="card">
                            <div class="card-header" style="background-color: #343a40;">
                                <strong class="card-title mb-3" style="color:white">User Profil</strong>
                            </div>
                            <div class="card-body">
                                <div class="mx-auto d-block">
                                    <img class="rounded-circle mx-auto d-block" width="80" src="assets/images/users/avatar.jpg" alt="Card image cap">
                                    <h5 class="text-sm-center mt-2 mb-1">{{Auth::user()->name}}</h5>
                                    <h6 class="text-sm-center mt-2 mb-1">
                                     Role : 
                                        @if(Auth::user()->level == 0)
                                            Root
                                        @elseif(Auth::user()->level == 1)
                                            Kepala Sekolah
                                        @elseif(Auth::user()->level == 2)
                                            Akunting
                                        @elseif(Auth::user()->level == 3)
                                            Bendahara
                                        @endif
                                    </h6>
                                    <div class="location text-sm-center"><i class="ti-phone"></i> {{Auth::user()->email}} </div>
                                </div>
                            </div>
                        </div><!-- /# card -->
                    </div><!-- /# column -->
                            <!-- end row -->
            
                            <!-- <div class="row">
            
                                <div class="col-xl-3">
                                    <div class="card m-b-20">
                                        <div class="card-body">
                                            <h4 class="mt-0 header-title">Monthly Earnings</h4>
            
                                            <div class="row text-center m-t-20">
                                                <div class="col-6">
                                                    <h5 class="">$56241</h5>
                                                    <p class="text-muted font-14">Marketplace</p>
                                                </div>
                                                <div class="col-6">
                                                    <h5 class="">$23651</h5>
                                                    <p class="text-muted font-14">Total Income</p>
                                                </div>
                                            </div>
            
                                            <div id="morris-donut-example" class="dashboard-charts morris-charts"></div>
                                        </div>
                                    </div>
                                </div>
            
                                <div class="col-xl-6">
                                    <div class="card m-b-20">
                                        <div class="card-body">
                                            <h4 class="mt-0 header-title">Email Sent</h4>
            
                                            <div class="row text-center m-t-20">
                                                <div class="col-4">
                                                    <h5 class="">$ 89425</h5>
                                                    <p class="text-muted font-14">Marketplace</p>
                                                </div>
                                                <div class="col-4">
                                                    <h5 class="">$ 56210</h5>
                                                    <p class="text-muted font-14">Total Income</p>
                                                </div>
                                                <div class="col-4">
                                                    <h5 class="">$ 8974</h5>
                                                    <p class="text-muted font-14">Last Month</p>
                                                </div>
                                            </div>
            
                                            <div id="morris-area-example" class="dashboard-charts morris-charts"></div>
                                        </div>
                                    </div>
                                </div>
            
                                <div class="col-xl-3">
                                    <div class="card m-b-20">
                                        <div class="card-body">
                                            <h4 class="mt-0 header-title">Monthly Earnings</h4>
            
                                            <div class="row text-center m-t-20">
                                                <div class="col-6">
                                                    <h5 class="">$ 2548</h5>
                                                    <p class="text-muted font-14">Marketplace</p>
                                                </div>
                                                <div class="col-6">
                                                    <h5 class="">$ 6985</h5>
                                                    <p class="text-muted font-14">Total Income</p>
                                                </div>
                                            </div>
            
                                            <div id="morris-bar-stacked" class="dashboard-charts morris-charts"></div>
                                        </div>
                                    </div>
                                </div>
            
                            </div>
                            \\end row -->
                    </div> <!-- container-fluid -->
@endsection

@section('script')
		<!--Morris Chart-->
        <script src="{{ URL::asset('assets/plugins/morris/morris.min.js')}}"></script>
        <script src="{{ URL::asset('assets/plugins/raphael/raphael-min.js')}}"></script>

		<script src="{{ URL::asset('assets/pages/dashboard.js')}}"></script>
@endsection