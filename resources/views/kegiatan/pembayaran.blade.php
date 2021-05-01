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
                <h4 class="page-title float-left">Pembayaran Uang Kegiatan</h4>
                <ol class="breadcrumb float-right">
                    <li class="breadcrumb-item"><a href="javascript:void(0);">Pembayaran</a></li>
                    <li class="breadcrumb-item active">Kegiatan</li>
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

					<form method="post"  action="{{route('kegiatan.create')}}" id="form" data-parsley-validate="" novalidate="">
		                {{csrf_field ()}}

                    <div class="col-12">
		                <p/>
		                <center><h5>PEMBAYARAN UANG KEGIATAN</h5></center>
		                <p/>

		         
                        <div class="row">
                        <div class="form-group row col-12">
                            <label class="col-3 col-lg-2 col-form-label text-right">Tahun</label>
                            <div class="col-9 col-lg-10">
                                <input name="nis" type="hidden" required="" value="{{$siswa->nis}}" class="form-control" placeholder="Jumlah Bayar">
                            
                            	<select name="tahun" class="form-control">
                            	    @foreach ($tahun ?? '' as $data)
                            		<option value="{{ $data->tahun_masuk }}">{{ $data->tahun_masuk }}</option>
                            		@endforeach
                                    <option value="{{ $data->tahun_masuk+1 }}">{{ $data->tahun_masuk+1 }}</option>
                                    <option value="{{ $data->tahun_masuk+2 }}">{{ $data->tahun_masuk+2 }}</option>
                                    
                            	</select>
                            </div>    
                        </div>

                        <div class="form-group row col-12">
                            <label class="col-4 col-lg-2 col-form-label text-right">Jumlah Bayar</label>
                            <div class="col-9 col-lg-10">
                                <input name="jumlah" type="text" required="" class="form-control" placeholder="Jumlah Bayar">
                            </div>  
                        </div>
                        <div class="form-group row col-12">
                            <label class="col-3 col-lg-2 col-form-label text-right">Keterangan</label>
                            <div class="col-9 col-lg-10">
                                <input name="keterangan" type="text" required="" class="form-control" placeholder="Keterangan">
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

               		</form>


                   <div class="col-12" style="margin-top:20px;">
                        <div class="alert alert-success text-center" role="alert">
                            <p class="mb-0">Siswa dengan NIM : {{$siswa->nis}} A/N {{$siswa->nama_siswa}}, Memiliki tagihan untuk pembayaran uang kegiatan sebesar</p>
                            <h4 class="alert-heading font-24">Rp. ,-</h4>
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
                    <div class="col-12">

		                <p/>
		                <center><h5>RIWAYAT PEMBAYARAN</h5></center>
		                <p/>

            			<table id="datatable" class="table table-striped table-bordered" >
                         	<thead>
		                        <tr>
		                            <th width="5%">No</th>
		                            <th>Tanggal Bayar</th>
		                            <th>Tahun</th>  
		                            <th>Jumlah</th>  
		                            <th>Keterangan</th>     
		                        </tr>
		                    </thead>
		                    <tbody>
                            @php($no=1)
                            @foreach($riwayat as $data)
		                            <tr>
		                                <td align="center"> {{$no++}} </td>
		                                <td>{{$data->dibuat_pada}}</td>
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