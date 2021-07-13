@extends('layouts.master')

@section('css')
<link rel="stylesheet" href="{{ URL::asset('assets/plugins/morris/morris.css')}}">
@endsection

@section('content')
    <div class="container-fluid">

                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                            <h4 class="page-title">Kenaikan Kelas</h4>
                        </div>
                    </div>
                </div>
                <!-- end row -->

    <div class="row">
    	<div class="col-12">
    	<div class="alert alert-primary" role="alert">
		  <h4 class="alert-heading">Selamat Tahun Ajaran Baru!</h4>
		  <hr>
		  Dengan menekan tombol dibawah, anda dapat melalukan kenaikan kelas pada siswa.  Siswa yang duduk di kelas 7 akan berubah menjadi kelas 8 pada database <br/>
		  1. VII > VIII <br/>
		  2. VIII > IX <br/>
		  3. IX > Alumni <br/>
		  <hr>
		  <p class="mb-0">Jangan lupa untuk menginput tahun ajaran baru. pada menu setting dan atur biaya SPP, Pangkal dan Kegiatan</p>
		</div>
		</div>

		  <div class="col-xl-6 col-md-6">   
                <a href="{{route('updatekelas')}}">   
                <div class="card mini-stat bg-primary">
                    <div class="card-body mini-stat-img">
                        <div class="mini-stat-icon">
                            <i class="mdi mdi-trophy float-right"></i>
                        </div>
                        <div class="text-white">
                            <h6 class="text-uppercase mb-3">Klik Disini <br/>Untuk Kenaikan Kelas</h6>
                     </div>
                    </div>
                </div>
                </a> 
            </div>

              <div class="col-xl-6 col-md-6">   
                <a href="">   
                <div class="card mini-stat bg-primary">
                    <div class="card-body mini-stat-img">
                        <div class="mini-stat-icon">
                            <i class="mdi mdi-settings float-right"></i>
                        </div>
                        <div class="text-white">
                            <h6 class="text-uppercase mb-3">Klik Disini <br/>Atur Tahun Ajaran </h6>
                     </div>
                    </div>
                </div>
                </a> 
            </div>

  	</div> <!-- container-fluid -->

  	</div>
@endsection

@section('script')
		<!--Morris Chart-->
        <script src="{{ URL::asset('assets/plugins/morris/morris.min.js')}}"></script>
        <script src="{{ URL::asset('assets/plugins/raphael/raphael-min.js')}}"></script>

		<script src="{{ URL::asset('assets/pages/dashboard.js')}}"></script>
@endsection