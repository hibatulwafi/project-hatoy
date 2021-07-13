@extends('layouts.master')

@section('css')
        <!-- DataTables -->
        <link href="{{ URL::asset('assets/plugins/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ URL::asset('assets/plugins/datatables/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- Responsive datatable examples -->
        <link href="{{ URL::asset('assets/plugins/datatables/responsive.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />

        <link href="{{ URL::asset('assets/plugins/ion-rangeslider/ion.rangeSlider.skinModern.css')}}" rel="stylesheet" type="text/css"/>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <h4 class="page-title float-left">Data Siswa</h4>
                <ol class="breadcrumb float-right">
                    <li class="breadcrumb-item"><a href="javascript:void(0);">Siswa</a></li>
                    <li class="breadcrumb-item active">Data Siswa</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- end row -->

    <div class="row">
        <div class="col-12">
            <div class="card m-b-20">
                <div class="card-body">

                <center><h5>DATA SISWA</h5></center>
                <p/>

                	<div class="col-12">
                        <div class="row">
                        <div class="form-group row col-4">
                            <img class="col-12" src="{{ asset('storage/fotosiswa/'.$siswa->foto_siswa) }}" >
                        </div>

                        <div class="form-group row col-8">
                           <table class="table table-striped dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
		                        <tbody>
		                            <tr>
		                                <td>NIS</td>
		                                <td align="center" width="10px">:</td>
		                                <td>{{$siswa->nis}}</td>
		                            </tr>
                                    <tr>
                                        <td>NISN</td>
                                        <td align="center" width="10px">:</td>
                                        <td>{{$siswa->nisn}}</td>
                                    </tr>
		                            <tr>
		                                <td>Nama Siswa</td>
		                                <td align="center" width="10px">:</td>
		                                <td>{{$siswa->nama_siswa}}</td>
		                            </tr>
		                            <tr>
		                                <td>Kelas</td>
		                                <td align="center" width="10px">:</td>
		                                <td>{{$siswa->kelas}}</td>
		                            </tr> 
		                            <tr>
		                                <td>Gender</td>
		                                <td align="center" width="10px">:</td>
		                                <td>{{$siswa->jk}}</td>
		                            </tr>
		                            <tr>
		                                <td>Agama</td>
		                                <td align="center" width="10px">:</td>
		                                <td>{{$siswa->agama}}</td>
		                            </tr>
		                        </tbody>
                    		</table>  
                        </div>

                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->

     <div class="row">
        <div class="col-12">
            <div class="card m-b-20">
                <div class="card-body">

					<form method="post"  action="{{route('spp.create')}}" id="form" data-parsley-validate="" novalidate="">
		                {{csrf_field ()}}

                    <div class="col-12">
		                <p/>
		                <center><h5>PEMBAYARAN SPP</h5></center>
		                <p/>

		         
                        <div class="row">
                        <div class="form-group row col-6">
                            <label class="col-3 col-lg-2 col-form-label text-right">Bulan</label>
                            <div class="col-9 col-lg-10">
                                <input name="nis" type="hidden" value="{{$siswa->nis}}" required="" class="form-control" placeholder="">
                            	<select name="bulan" class="form-control">
                            	    @foreach ($bulan ?? '' as $data)
                            		<option value="{{ $data->id_ajaran }}">{{ $data->bulan }}</option>
                            		@endforeach
                            	</select>
                            </div>  
                        </div>
                        <div class="form-group row col-6">
                            <label class="col-3 col-lg-2 col-form-label text-right">Tahun</label>
                            <div class="col-9 col-lg-10">
                            	<select name="tahun" class="form-control">
                            	    @foreach ($tahun ?? '' as $data)
                            		<option value="{{ $data->tahun_ajaran }}">{{ $data->tahun_ajaran }}</option>
                            		@endforeach
                            	</select>
                            </div>    
                        </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="row">
                        <div class="form-group row col-6">
                            <label class="col-3 col-lg-2 col-form-label text-right">Jml</label>
                            <div class="col-9 col-lg-10">
                                <input name="jumlah" type="text" required="" value="500000" class="form-control" placeholder="Jumlah Bayar">
                            </div>  
                        </div>
                        <div class="form-group row col-6">
                            <label class="col-3 col-lg-2 col-form-label text-right">Ket</label>
                            <div class="col-9 col-lg-10">
                                <input name="keterangan" type="text" required="" value="Pembayaran SPP" class="form-control" placeholder="Keterangan">
                            </div>  
                        </div>
                        </div>
                    </div>

            		<div class="col-12" style="margin-top:20px;">
                        <div class="row">
                        <div class="col-4">&nbsp;</div>
                        <div class="col-4">
                             <button type="submit" class="btn btn-success col-12 align-right">SIMPAN DATA</button>
                        </div>
                        <div class="col-4">&nbsp;</div>
                        </div>
                    </div>
                    <p> <p>
                   <!--  <div class="col-12">
                        <div class="alert alert-success text-center" role="alert">
                            <p class="mb-0">Siswa dengan NIM : {{$siswa->nis}} A/N {{$siswa->nama_siswa}}, Memiliki tagihan untuk pembayaran uang SPP sebesar</p>
                            <h4 class="alert-heading font-24">Rp.{{number_format($tunggakan)}}</h4>
                        </div>
                    </div> -->


               		</form>
              
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->


     <div class="row">
        <div class="col-12">
            <div class="card m-b-20">
                <div class="card-body">
                    <div class="col-12">

		                <p/>
		                <center><h5>RIWAYAT PEMBAYARAN</h5></center>
		                <p/>

            			<table id="datatable" class="table table-striped table-bordered" >
                         	<thead>
		                        <tr>
		                            <th width="5%">No</th>
		                            <th>Tanggal Bayar</th>
		                            <th>Bulan</th>  
		                            <th>Tahun</th>  
		                            <th>Jumlah</th>  
		                            <th>Keterangan</th>     
		                        </tr>
		                    </thead>
		                    <tbody>
                                @php
                                $no=1;
                                @endphp
                                @foreach ($riwayat ?? '' as $data)
		                            <tr>
		                                <td align="center">{{ $no++ }}</td>
		                                <td><?php
                                            $date=date_create($data->dibuat_pada);
                                            echo date_format($date,"D, d M Y [H:i]");
                                            ?>
                                        </td>
		                                <td>{{$data->bulan}}</td>
		                                <td>{{$data->pembayaran_tahun}}</td>
		                                <td>Rp.{{number_format($data->jumlah)}}</td>
		                                <td>{{$data->keterangan}}</td>
		                            </tr>                            
                                @endforeach
		                    </tbody>
            			</table>    
                    </div>
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->


     <div class="row">
        <div class="col-12">
            <div class="card m-b-20">
                <div class="card-body">
                    <div class="col-12">

                        <p/>
                        <center><h5>KARTU SPP</h5></center>
                        <p/>

                        <nav>                 
                            <div class="nav nav-tabs nav-fill nav-pills" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link active" id="nav-vii-tab" data-toggle="tab" href="#nav-vii" role="tab" aria-controls="nav-vii" aria-selected="true">VII</a>
                                <a class="nav-item nav-link" id="nav-viii-tab" data-toggle="tab" href="#nav-viii" role="tab" aria-controls="nav-viii" aria-selected="false">VIII</a>
                                <a class="nav-item nav-link" id="nav-ix-tab" data-toggle="tab" href="#nav-ix" role="tab" aria-controls="nav-ix" aria-selected="false">IX</a>
                            </div>
                        </nav>

                <div class="tab-content" id="nav-tabContent" style="padding:16px;">
                    <div class="tab-pane fade show active" id="nav-vii" role="tabpanel" aria-labelledby="nav-vii-tab">
                        <div class="row">               
                            @foreach( $bulan as $bl)
                            @if($bl->posisi <= 6)
                               @php
                               $tahun = $tahunSPP;
                               $spp = DB::table('tb_pembayaran')
                               ->leftJoin('tb_siswa','tb_siswa.nis','tb_pembayaran.nis')
                               ->leftJoin('tb_jenis_pembayaran','tb_jenis_pembayaran.id_jenis_pem','tb_pembayaran.id_jenis_pem')
                               ->leftJoin('tb_bulan_ajaran','tb_bulan_ajaran.id_ajaran','tb_pembayaran.pembayaran_bulan')
                               ->where('tb_pembayaran.nis',$id)
                               ->where('tb_pembayaran.id_jenis_pem',1)
                               ->where('tb_bulan_ajaran.id_ajaran',$bl->id_ajaran)
                               ->where('tb_pembayaran.pembayaran_tahun',$tahun)
                               ->select('tb_bulan_ajaran.bulan','tb_pembayaran.dibuat_pada',DB::raw('SUM(tb_pembayaran.jumlah) as jml'))
                               ->get();
                               @endphp
                            @else
                               @php
                               $tahun = $tahunSPP+1;
                               $spp = DB::table('tb_pembayaran')
                               ->leftJoin('tb_siswa','tb_siswa.nis','tb_pembayaran.nis')
                               ->leftJoin('tb_jenis_pembayaran','tb_jenis_pembayaran.id_jenis_pem','tb_pembayaran.id_jenis_pem')
                               ->leftJoin('tb_bulan_ajaran','tb_bulan_ajaran.id_ajaran','tb_pembayaran.pembayaran_bulan')
                               ->where('tb_pembayaran.nis',$id)
                               ->where('tb_pembayaran.id_jenis_pem',1)
                               ->where('tb_bulan_ajaran.id_ajaran',$bl->id_ajaran)
                               ->where('tb_pembayaran.pembayaran_tahun',$tahun)
                               ->select('tb_bulan_ajaran.bulan','tb_pembayaran.dibuat_pada',DB::raw('SUM(tb_pembayaran.jumlah) as jml'))
                               ->get();
                               @endphp
                            @endif

                            @foreach($spp as $data)
                            <div class="col-md-3 col-sm-12">
                             <div class="card card-body text-center">
                                <h6>{{$bl->bulan}} | {{$tahun}}</h6>
                                @if($data->jml == 0)
                                    <div class="alert alert-success text-center mb-0" role="alert">
                                        <p class="mb-0">Sisa</p>
                                        <h4 class="alert-heading font-14 mb-0">Rp.{{number_format($biayaspp)}}</h4>
                                    </div> 
                                @elseif($biayaspp-$data->jml <= 0)
                                    <span>
                                    <img src="{{ URL::asset('assets/images/stempel-lunas.png')}}" alt="" height="60">
                                    </span>
                                @else
                                    <div class="alert alert-success text-center mb-0" role="alert">
                                        <p class="mb-0">Sisa</p>
                                        <h4 class="alert-heading font-14 mb-0">Rp.{{number_format($biayaspp - $data->jml)}}</h4>
                                    </div> 
                                @endif
                                @if($data->dibuat_pada != null || $data->dibuat_pada = "")
                                  <h6 class="text-success">{{date_format(date_create($data->dibuat_pada),'D, d/m/Y')}}</h6>
                                @endif
                             </div>
                            </div>
                            @endforeach

                            @endforeach
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-viii" role="tabpanel" aria-labelledby="nav-viii-tab">
                        <div class="row">               
                            @foreach( $bulan as $bl)
                            @if($bl->posisi <= 6)
                               @php
                               $tahun = $tahunSPP+1;
                               $spp = DB::table('tb_pembayaran')
                               ->leftJoin('tb_siswa','tb_siswa.nis','tb_pembayaran.nis')
                               ->leftJoin('tb_jenis_pembayaran','tb_jenis_pembayaran.id_jenis_pem','tb_pembayaran.id_jenis_pem')
                               ->leftJoin('tb_bulan_ajaran','tb_bulan_ajaran.id_ajaran','tb_pembayaran.pembayaran_bulan')
                               ->where('tb_pembayaran.nis',$id)
                               ->where('tb_pembayaran.id_jenis_pem',1)
                               ->where('tb_bulan_ajaran.id_ajaran',$bl->id_ajaran)
                               ->where('tb_pembayaran.pembayaran_tahun',$tahun)
                               ->select('tb_bulan_ajaran.bulan','tb_pembayaran.dibuat_pada',DB::raw('SUM(tb_pembayaran.jumlah) as jml'))
                               ->get();
                               @endphp
                            @else
                               @php
                               $tahun = $tahunSPP+2;
                               $spp = DB::table('tb_pembayaran')
                               ->leftJoin('tb_siswa','tb_siswa.nis','tb_pembayaran.nis')
                               ->leftJoin('tb_jenis_pembayaran','tb_jenis_pembayaran.id_jenis_pem','tb_pembayaran.id_jenis_pem')
                               ->leftJoin('tb_bulan_ajaran','tb_bulan_ajaran.id_ajaran','tb_pembayaran.pembayaran_bulan')
                               ->where('tb_pembayaran.nis',$id)
                               ->where('tb_pembayaran.id_jenis_pem',1)
                               ->where('tb_bulan_ajaran.id_ajaran',$bl->id_ajaran)
                               ->where('tb_pembayaran.pembayaran_tahun',$tahun)
                               ->select('tb_bulan_ajaran.bulan','tb_pembayaran.dibuat_pada',DB::raw('SUM(tb_pembayaran.jumlah) as jml'))
                               ->get();
                               @endphp
                            @endif

                            @foreach($spp as $data)
                            <div class="col-md-3 col-sm-12">
                             <div class="card card-body text-center">
                                <h6>{{$bl->bulan}} | {{$tahun}}</h6>
                                @if($data->jml == 0)
                                    <div class="alert alert-success text-center mb-0" role="alert">
                                        <p class="mb-0">Sisa</p>
                                        <h4 class="alert-heading font-14 mb-0">Rp.{{number_format($biayaspp)}}</h4>
                                    </div> 
                                @elseif($biayaspp-$data->jml <= 0)
                                    <span>
                                    <img src="{{ URL::asset('assets/images/stempel-lunas.png')}}" alt="" height="60">
                                    </span>
                                @else
                                    <div class="alert alert-success text-center mb-0" role="alert">
                                        <p class="mb-0">Sisa</p>
                                        <h4 class="alert-heading font-14 mb-0">Rp.{{number_format($biayaspp - $data->jml)}}</h4>
                                    </div> 
                                @endif
                                @if($data->dibuat_pada != null || $data->dibuat_pada = "")
                                  <h6 class="text-success">{{date_format(date_create($data->dibuat_pada),'D, d/m/Y')}}</h6>
                                @endif
                             </div>
                            </div>
                            @endforeach

                            @endforeach
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-ix" role="tabpanel" aria-labelledby="nav-ix-tab">
                        <div class="row">               
                            @foreach( $bulan as $bl)
                            @if($bl->posisi <= 6)
                               @php
                               $tahun = $tahunSPP+2;
                               $spp = DB::table('tb_pembayaran')
                               ->leftJoin('tb_siswa','tb_siswa.nis','tb_pembayaran.nis')
                               ->leftJoin('tb_jenis_pembayaran','tb_jenis_pembayaran.id_jenis_pem','tb_pembayaran.id_jenis_pem')
                               ->leftJoin('tb_bulan_ajaran','tb_bulan_ajaran.id_ajaran','tb_pembayaran.pembayaran_bulan')
                               ->where('tb_pembayaran.nis',$id)
                               ->where('tb_pembayaran.id_jenis_pem',1)
                               ->where('tb_bulan_ajaran.id_ajaran',$bl->id_ajaran)
                               ->where('tb_pembayaran.pembayaran_tahun',$tahun)
                               ->select('tb_bulan_ajaran.bulan','tb_pembayaran.dibuat_pada',DB::raw('SUM(tb_pembayaran.jumlah) as jml'))
                               ->get();
                               @endphp
                            @else
                               @php
                               $tahun = $tahunSPP+3;
                               $spp = DB::table('tb_pembayaran')
                               ->leftJoin('tb_siswa','tb_siswa.nis','tb_pembayaran.nis')
                               ->leftJoin('tb_jenis_pembayaran','tb_jenis_pembayaran.id_jenis_pem','tb_pembayaran.id_jenis_pem')
                               ->leftJoin('tb_bulan_ajaran','tb_bulan_ajaran.id_ajaran','tb_pembayaran.pembayaran_bulan')
                               ->where('tb_pembayaran.nis',$id)
                               ->where('tb_pembayaran.id_jenis_pem',1)
                               ->where('tb_bulan_ajaran.id_ajaran',$bl->id_ajaran)
                               ->where('tb_pembayaran.pembayaran_tahun',$tahun)
                               ->select('tb_bulan_ajaran.bulan','tb_pembayaran.dibuat_pada',DB::raw('SUM(tb_pembayaran.jumlah) as jml'))
                               ->get();
                               @endphp
                            @endif

                            @foreach($spp as $data)
                            <div class="col-md-3 col-sm-12">
                             <div class="card card-body text-center">
                                <h6>{{$bl->bulan}} | {{$tahun}}</h6>
                                @if($data->jml == 0)
                                    <div class="alert alert-success text-center mb-0" role="alert">
                                        <p class="mb-0">Sisa</p>
                                        <h4 class="alert-heading font-14 mb-0">Rp.{{number_format($biayaspp)}}</h4>
                                    </div> 
                                @elseif($biayaspp-$data->jml <= 0)
                                    <span>
                                    <img src="{{ URL::asset('assets/images/stempel-lunas.png')}}" alt="" height="60">
                                    </span>
                                @else
                                    <div class="alert alert-success text-center mb-0" role="alert">
                                        <p class="mb-0">Sisa</p>
                                        <h4 class="alert-heading font-14 mb-0">Rp.{{number_format($biayaspp - $data->jml)}}</h4>
                                    </div> 
                                @endif
                                @if($data->dibuat_pada != null || $data->dibuat_pada = "")
                                  <h6 class="text-success">{{date_format(date_create($data->dibuat_pada),'D, d/m/Y')}}</h6>
                                @endif
                             </div>
                            </div>
                            @endforeach

                            @endforeach
                        </div>
                    </div>
                </div>

                       
                           

                        </div>

                    </div>
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->




 </div> <!-- container-fluid -->


@endsection


@section('script')
        <!-- Required datatable js -->
        <script src="{{ URL::asset('assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
        <script src="{{ URL::asset('assets/plugins/datatables/dataTables.bootstrap4.min.js')}}"></script>
        <!-- Buttons examples -->
        <script src="{{ URL::asset('assets/plugins/datatables/dataTables.buttons.min.js')}}"></script>
        <script src="{{ URL::asset('assets/plugins/datatables/buttons.bootstrap4.min.js')}}"></script>
        <script src="{{ URL::asset('assets/plugins/datatables/jszip.min.js')}}"></script>
        <script src="{{ URL::asset('assets/plugins/datatables/pdfmake.min.js')}}"></script>
        <script src="{{ URL::asset('assets/plugins/datatables/vfs_fonts.js')}}"></script>
        <script src="{{ URL::asset('assets/plugins/datatables/buttons.html5.min.js')}}"></script>
        <script src="{{ URL::asset('assets/plugins/datatables/buttons.print.min.js')}}"></script>
        <script src="{{ URL::asset('assets/plugins/datatables/buttons.colVis.min.js')}}"></script>
        <!-- Responsive examples -->
        <script src="{{ URL::asset('assets/plugins/datatables/dataTables.responsive.min.js')}}"></script>
        <script src="{{ URL::asset('assets/plugins/datatables/responsive.bootstrap4.min.js')}}"></script>

        <!-- Datatable init js -->
        <script src="{{ URL::asset('assets/pages/datatables.init.js')}}"></script>
@endsection