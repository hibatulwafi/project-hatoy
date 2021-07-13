@extends('layouts.master')

@section('css')
<link rel="stylesheet" href="{{ URL::asset('assets/plugins/morris/morris.css')}}">
@endsection

@section('content')
            <div class="container-fluid">

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="page-title-box">
                                    <h4 class="page-title">Data Kelas</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->

            <div class="row">

                @foreach($kelas as $data)
               
                @if(substr($data->kelas,0,-2) == 'VII')
                    @php $nomor = 7; $warna="primary"; @endphp
                @elseif(substr($data->kelas,0,-2) == 'VIII')
                    @php $nomor = 8; $warna="info"; @endphp
                @elseif(substr($data->kelas,0,-2) == 'IX')
                    @php $nomor = 9; $warna="success"; @endphp
                @else
                    @php $nomor = 0; $warna="danger"; @endphp
                @endif
                <div class="col-xl-3 col-md-4">   
                    <div class="card mini-stat bg-{{$warna}}">
                        <div class="card-body mini-stat-img">
                            <div class="mini-stat-icon">
                                <i class="mdi mdi-numeric-{{$nomor}}-box-multiple-outline float-right"></i>
                            </div>
                            <div class="text-white">
                                <h6 class="text-uppercase mb-3">Kelas <br/> {{$data->kelas}}</h6>
                                <h4 class="mb-4">
                                    <?php
                                     $total =  DB::table('tb_siswa')->where('kelas',"=",$data->kelas)->count();
                                     echo $total.' <font size="3"> Siswa</font>';
                                    ?>
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            
              
  </div> <!-- container-fluid -->
@endsection

@section('script')
		<!--Morris Chart-->
        <script src="{{ URL::asset('assets/plugins/morris/morris.min.js')}}"></script>
        <script src="{{ URL::asset('assets/plugins/raphael/raphael-min.js')}}"></script>

		<script src="{{ URL::asset('assets/pages/dashboard.js')}}"></script>
@endsection