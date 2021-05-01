@extends('layouts.master')

@section('css')
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
                <form method="post"  action="#" id="form" data-parsley-validate="" novalidate="">
                {{csrf_field ()}}

                	<div class="col-12">
                        <div class="row">
                        <div class="form-group row col-6">
                            <img class="col-12" src="{{ asset('storage/fotosiswa/'.$siswa->foto_siswa) }}" >
                        </div>

                        <div class="form-group row col-6">
                           <table id="datatable" class="table table-striped dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
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
		                                <td>Gender</td>
		                                <td align="center" width="10px">:</td>
		                                <td>{{$siswa->jk}}</td>
		                            </tr>
		                            <tr>
		                                <td>Kelas</td>
		                                <td align="center" width="10px">:</td>
		                                <td>{{$siswa->kelas}}</td>
		                            </tr>
		                            <tr>
		                                <td>Agama</td>
		                                <td align="center" width="10px">:</td>
		                                <td>{{$siswa->agama}}</td>
		                            </tr>
		                            <tr>
		                                <td>TTL</td>
		                                <td align="center" width="10px">:</td>
		                                <td>{{$siswa->ttl}}</td>
		                            </tr>
		                            <tr>
		                                <td>No Telp</td>
		                                <td align="center" width="10px">:</td>
		                                <td>{{$siswa->no_telepon}}</td>
		                            </tr>
		                            <tr>
		                                <td>Alamat</td>
		                                <td align="center" width="10px">:</td>
		                                <td>{{$siswa->alamat_lengkap}}</td>
		                            </tr> 
		                        </tbody>
                    		</table>  
                        </div>
                        </div>
                    </div>

                <p/>
                <center><h5>DATA LAINNYA</h5></center>
                <p/>
                    <div class="col-12">
                        <div class="row">
                        <div class="form-group row col-6">
                           	 <table id="datatable" class="table dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
		                        <tbody>
		                            <tr>
		                                <td>No Seri Ijazah</td>
		                                <td align="center" width="10px">:</td>
		                                <td>{{$siswa->no_seri_ijazah}}</td>
		                            </tr>
		                            <tr>
		                                <td>No Seri SKHUN</td>
		                                <td align="center" width="10px">:</td>
		                                <td>{{$siswa->no_seri_skhun}}</td>
		                            </tr>
		                            <tr>
		                                <td>No Peserta UN</td>
		                                <td align="center" width="10px">:</td>
		                                <td>{{$siswa->no_peserta_un}}</td>
		                            </tr>
		                            <tr>
		                                <td>Sekolah Asal</td>
		                                <td align="center" width="10px">:</td>
		                                <td>{{$siswa->asal_sekolah}}</td>
		                            </tr>
		                        </tbody>
                    		</table>    
                        </div>

                        <div class="form-group row col-6">
                           	 <table id="datatable" class="table dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
		                        <tbody>
		                            <tr>
		                                <td>NIK</td>
		                                <td align="center" width="10px">:</td>
		                                <td>{{$siswa->nik}}</td>
		                            </tr>
		                            <tr>
		                                <td>Tahun Masuk</td>
		                                <td align="center" width="10px">:</td>
		                                <td>{{$siswa->tahun_masuk}}</td>
		                            </tr>
		                            <tr>
		                                <td>Status Siswa</td>
		                                <td align="center" width="10px">:</td>
		                                <td> <a class="btn btn-success btn-sm">{{$siswa->status_siswa}} </a></td>      
		                            </tr>
		                        </tbody>
                    		</table>    
                        </div>
                         
                        </div>
                    </div>

                <p/>
                <center><h5>DATA KELUARGA</h5></center>
                <p/>
                    <div class="col-12">
                        <div class="row">
                        <div class="form-group row col-6">
                           	 <table id="datatable" class="table dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
		                        <tbody>
		                            <tr>
		                                <td>Nama Ayah</td>
		                                <td align="center" width="10px">:</td>
		                                <td>{{$siswa->nama_ayah}}</td>
		                            </tr>
		                            <tr>
		                                <td>Pekerjaan Ayah</td>
		                                <td align="center" width="10px">:</td>
		                                <td>{{$siswa->pekerjaan_ayah}}</td>
		                            </tr>
		                            <tr>
		                                <td>Pendidikan Ayah</td>
		                                <td align="center" width="10px">:</td>
		                                <td>{{$siswa->pendidikan_ayah}}</td>
		                            </tr>
		                            <tr>
		                                <td>Anak Ke</td>
		                                <td align="center" width="10px">:</td>
		                                <td>{{$siswa->anak_ke}}</td>
		                            </tr>
		                        </tbody>
                    		</table>    
                        </div>

                        <div class="form-group row col-6">
                           	 <table id="datatable" class="table dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
		                        <tbody>
		                            <tr>
		                                <td>Nama Ibu</td>
		                                <td align="center" width="10px">:</td>
		                                <td>{{$siswa->nama_ibu}}</td>
		                            </tr>
		                            <tr>
		                                <td>Pekerjaan Ibu</td>
		                                <td align="center" width="10px">:</td>
		                                <td>{{$siswa->pekerjaan_ibu}}</td>
		                            </tr>
		                            <tr>
		                                <td>Pendidikan Ibu</td>
		                                <td align="center" width="10px">:</td>
		                                <td>{{$siswa->pendidikan_ibu}}</td>
		                            </tr>
		                            <tr>
		                                <td>Status Dlm Keluarga</td>
		                                <td align="center" width="10px">:</td>
		                                <td>{{$siswa->status_dlm_keluarga}}</td>
		                            </tr>
		                        </tbody>
                    		</table>    
                        </div>
                         
                        </div>
                    </div>

                    <div class="col-12" style="margin-top:20px;">
                        <div class="row">
                        <div class="col-2">&nbsp;</div>
                        <div class="col-4">
                        	<a class="btn btn-danger col-12 align-right" href="{{url('/siswa/edit/'.$siswa->nis)}}">UBAH DATA</a>
                        </div>
                        <div class="col-4">
                        	<a class="btn btn-success col-12 align-right" href="{{url('/tabelsiswa')}}">KEMBALI</a>
                        </div>
                        <div class="col-2">&nbsp;</div>
                        </div>
                    </div>

                </form>

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
 </div> <!-- container-fluid -->
@endsection