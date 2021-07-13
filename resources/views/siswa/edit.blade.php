@extends('layouts.master')
    
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <h4 class="page-title">Form Edit Siswa</h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0);">Siswa</a></li>
                    <li class="breadcrumb-item active">Form Edit</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- end row -->

    <div class="row">
        <div class="col-lg-12">
            <div class="card m-b-20">
                <div class="card-body">
                <center><h5>DATA SISWA</h5></center>
                <p/>
                <form method="post"  action="{{ url('siswa/update') }}" id="form" data-parsley-validate="" novalidate="" enctype="multipart/form-data">
                {{csrf_field ()}}

                   

                    <div class="col-12">
                        <div class="row">
                        <div class="form-group row col-6">
                            <label class="col-3 col-lg-2 col-form-label text-right">NIS</label>
                            <div class="col-9 col-lg-10">
                                <input name="nis" type="text" required="" class="form-control" placeholder="Nomor Induk Siswa" readonly value="{{$data->nis}}">
                            </div>  
                        </div>
                          <div class="form-group row col-6">
                            <label class="col-3 col-lg-2 col-form-label text-right">NISN</label>
                            <div class="col-9 col-lg-10">
                                <input name="nisn" type="text" required="" class="form-control" placeholder="Nomor Induk Siswa Nasional" value="{{$data->nisn}}" readonly="">
                            </div>  
                        </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="row">
                        <div class="form-group row col-6">
                            <label class="col-3 col-lg-2 col-form-label text-right">NIK</label>
                            <div class="col-9 col-lg-10">
                                <input name="nik" value="{{$data->nik}}" type="text" required="" class="form-control" placeholder="Nomor Induk Keluarga">
                            </div>  
                        </div>
                          <div class="form-group row col-6">
                            <label class="col-3 col-lg-2 col-form-label text-right">Nama</label>
                            <div class="col-9 col-lg-10">
                                <input name="nama_siswa" value="{{$data->nama_siswa}}" type="text" required="" class="form-control" placeholder="Nama Siswa">
                            </div>  
                        </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="row">
                        <div class="form-group row col-6">
                            <label class="col-3 col-lg-2 col-form-label text-right">Kelas</label>
                            <div class="col-4 col-lg-5">
                                <select name="kelas_angka" class="form-control">
                                   <option value="VII" @if(substr($data->kelas,0,-2) == 'VII') selected @endif>7</option>
                                   <option value="VIII" @if(substr($data->kelas,0,-2) == 'VIII') selected @endif>8</option>
                                   <option value="IX" @if(substr($data->kelas,0,-2) == 'IX') selected @endif>9</option>
                                </select>                           
                            </div>
                             <div class="col-5 col-lg-5">
                                <select name="kelas_huruf" class="form-control">
                                   <option value="A" @if(substr($data->kelas,-1) == 'A') selected @endif>A</option>
                                   <option value="B" @if(substr($data->kelas,-1) == 'B') selected @endif>B</option>
                                   <option value="C" @if(substr($data->kelas,-1) == 'C') selected @endif>C</option>
                                   <option value="D" @if(substr($data->kelas,-1) == 'D') selected @endif>D</option>
                                   <option value="E" @if(substr($data->kelas,-1) == 'E') selected @endif>E</option>
                                   <option value="F" @if(substr($data->kelas,-1) == 'F') selected @endif>F</option>
                                   <option value="G" @if(substr($data->kelas,-1) == 'G') selected @endif>G</option>
                                </select>                           
                            </div>  
                        </div>
                        <div class="form-group row col-6">
                            <label class="col-3 col-lg-2 col-form-label text-right">Agama</label>
                             <div class="col-9 col-lg-10">
                                <select name="agama" class="form-control">
                                   <option value="Islam" @if($data->agama == 'Islam') selected @endif>Islam</option>
                                   <option value="Hindu" @if($data->agama == 'Hindu') selected @endif>Hindu</option>
                                   <option value="Budha" @if($data->agama == 'Budha') selected @endif>Budha</option>
                                   <option value="Kristen Khatolik" @if($data->agama == 'Kristen Khatolik') selected @endif>Kristen Khatolik</option>
                                   <option value="Kristen Protestan" @if($data->agama == 'Kristen Protestan') selected @endif>Kristen Protestan</option>
                                </select>                               
                            </div>  
                        </div>
                        </div>
                    </div>

                     <div class="col-12">
                        <div class="row">
                        <div class="form-group row col-6">
                            <label class="col-3 col-lg-2 col-form-label text-right">Gender</label>
                            <div class="col-9 col-lg-10">
                                <select name="jk" class="form-control">
                                   <option value="L">Pria </option>
                                   <option value="P" @if($data->jk == 'P') selected  @endif >Wanita</option>
                                </select>                           
                            </div>  
                        </div>
                        <div class="form-group row col-6">
                            <label class="col-3 col-lg-2 col-form-label text-right">TTL</label>
                            <div class="col-lg-10 col-sm-10">
                                <input name="ttl" value="{{$data->ttl}}" type="text" required="" class="form-control" placeholder="Sukabumi">
                            </div>  
                        </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="row">
                        <div class="form-group row col-6">
                            <label class="col-3 col-lg-2 col-form-label text-right">No Telp</label>
                            <div class="col-9 col-lg-10">
                                <input name="no_telepon"  value="{{$data->no_telepon}}" type="text" required="" class="form-control" placeholder="0858 6304 6869">
                            </div>  
                        </div>
                          <div class="form-group row col-6">
                            <label class="col-3 col-lg-2 col-form-label text-right">Asal Skl</label>
                            <div class="col-9 col-lg-10">
                                <input name="asal_sekolah"  value="{{$data->asal_sekolah}}" type="text" required="" class="form-control" placeholder="Asal Sekolah Siswa">
                            </div>  
                        </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="row">
                        <div class="form-group row col-6">
                            <label class="col-3 col-lg-2 col-form-label text-right">Anak Ke</label>
                            <div class="col-4 col-lg-5">
                                <input name="anak_ke" type="text" required=""  value="{{$data->anak_ke}}" class="form-control" placeholder="Contoh : 2">
                            </div> 
                            <div class="col-5 col-lg-5">
                                <select name="status_dlm_keluarga" class="form-control">
                                   <option value="Anak Kandung">Anak Kandung</option>
                                   <option value="Anak Sambung">Anak Sambung</option>
                                </select>                                 
                            </div>  
                        </div>
                          <div class="form-group row col-6">
                            <label class="col-3 col-lg-2 col-form-label text-right">Tahun Masuk</label>
                            <div class="col-9 col-lg-10">
                                <select name="tahun_masuk" class="form-control">
                                    <option value="{{$data->tahun_masuk}}">{{$data->tahun_masuk}}</option>
                                    <?php 
                                    for($i = date('Y')  ; $i >= 2000; $i--){
                                        echo "<option>$i</option>";
                                    }
                                    ?>
                                </select>                            
                        </div>  
                        </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="row">
                        <div class="form-group row col-6">
                            <label class="col-3 col-lg-2 col-form-label text-right">No Ijazah</label>
                            <div class="col-9 col-lg-10">
                                <input name="no_seri_ijazah" type="text" value="{{$data->no_seri_ijazah}}" required="" class="form-control" placeholder="No Seri Ijazah">
                            </div>  
                        </div>
                          <div class="form-group row col-6">
                            <label class="col-3 col-lg-2 col-form-label text-right">No SKHUN</label>
                            <div class="col-9 col-lg-10">
                                <input name="no_seri_skhun" type="text" required="" value="{{$data->no_seri_skhun}}" class="form-control" placeholder="No Seri SKHUN">
                            </div>  
                        </div>
                        </div>
                    </div>

                     <div class="col-12">
                        <div class="row">
                            <div class="form-group row col-6">
                                <label class="col-3 col-lg-2 col-form-label text-right">No UN</label>
                                <div class="col-9 col-lg-10">
                                    <input name="no_peserta_un" type="text" required="" class="form-control" value="{{$data->no_peserta_un}}" placeholder="No Peserta UN">
                                </div>  
                            </div>
                            <div class="form-group row col-6">
                                <label class="col-3 col-lg-2 col-form-label text-right">Ket Siswa</label>
                                <div class="col-9 col-lg-10">
                                <select name="keterangan" class="form-control">
                                    <option value="Umum">Umum</option>
                                    <option value="Anak Guru">Anak Guru</option>
                                </select>
                                </div>  
                            </div>
                        </div>
                    </div>


                    <div class="col-12">
                        <div class="row">
                        <div class="form-group row col-6">
                            <label class="col-3 col-lg-2 col-form-label text-right">Alamat</label>
                            <div class="col-9 col-lg-10">
                               <textarea name="alamat_lengkap" class="form-control" placeholder="Alamat Lengkap">{{$data->alamat_lengkap}}</textarea>
                            </div>  
                           
                        </div>
                        <div class="form-group row col-6">
                            <label class="col-3 col-lg-2 col-form-label text-right">Ket</label>
                            <div class="col-9 col-lg-10">
                               <textarea name="keterangan_tambahan" class="form-control" placeholder="Keterangan"></textarea>
                            </div>  
                           
                        </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="row">
                        <div class="form-group row col-6">
                            <label class="col-3 col-lg-2 col-form-label text-right">Foto Siswa</label>
                                <div class="col-9 col-lg-10">
                                    <input type="file" class="form-control logo" name="gambar" id="gambar">
                               </div>  

                        </div>
                        </div>
                    </div>


                <p/>
                <p/>
                <center><h5>DATA ORANGTUA</h5></center>
                <p/>
                    <div class="col-12">
                        <div class="row">
                        <div class="form-group row col-6">
                            <label class="col-3 col-lg-2 col-form-label text-right">1</label>
                            <div class="col-9 col-lg-10">
                                <input name="nama_ayah" value="{{$data->nama_ayah}}" type="text" required="" class="form-control" placeholder="Nama Ayah">
                            </div>  
                        </div>
                          <div class="form-group row col-6">
                            <label class="col-3 col-lg-2 col-form-label text-right">4</label>
                            <div class="col-9 col-lg-10">
                                <input name="nama_ibu" type="text" required="" value="{{$data->nama_ibu}}" class="form-control" placeholder="Nama Ibu">
                            </div>  
                        </div>
                        </div>
                    </div>

                     <div class="col-12">
                        <div class="row">
                        <div class="form-group row col-6">
                            <label class="col-3 col-lg-2 col-form-label text-right">2</label>
                            <div class="col-9 col-lg-10">
                                <input name="pekerjaan_ayah" type="text" required="" value="{{$data->pekerjaan_ayah}}" class="form-control" placeholder="Pekerjaan Ayah">
                            </div>  
                        </div>
                          <div class="form-group row col-6">
                            <label class="col-3 col-lg-2 col-form-label text-right">5</label>
                            <div class="col-9 col-lg-10">
                                <input name="pekerjaan_ibu" type="text" required="" value="{{$data->pekerjaan_ibu}}" class="form-control" placeholder="Pekerjaan Ibu">
                            </div>  
                        </div>
                        </div>
                    </div>

                     <div class="col-12">
                        <div class="row">
                        <div class="form-group row col-6">
                            <label class="col-3 col-lg-2 col-form-label text-right">3</label>
                            <div class="col-9 col-lg-10">
                                <input name="pendidikan_ayah" type="text" required="" value="{{$data->pendidikan_ayah}}" class="form-control" placeholder="Pendidikan Ayah">
                            </div>  
                        </div>
                          <div class="form-group row col-6">
                            <label class="col-3 col-lg-2 col-form-label text-right">6</label>
                            <div class="col-9 col-lg-10">
                                <input name="pendidikan_ibu" type="text" required="" value="{{$data->pendidikan_ibu}}" class="form-control" placeholder="Pendidikan Ibu">
                            </div>  
                        </div>
                        </div>
                    </div>

                    <div class="col-12" style="margin-top:20px;">
                        <div class="row">
                        <div class="col-2">&nbsp;</div>
                        <div class="col-4">
                            <a class="btn btn-info col-12 align-right" href="{{url('/tabelsiswa')}}">KEMBALI</a>
                        </div>
                        <div class="col-4">
                             <button type="submit" class="btn btn-success col-12 align-right">SIMPAN DATA</button>
                        </div>
                        <div class="col-2">&nbsp;</div>
                        </div>
                    </div>

                </form>
                </div>
            </div>  
        </div>
    </div> <!-- end row -->     
</div> <!-- container-fluid -->
@endsection

@section('script')
        <!-- Parsley js -->
        <script src="{{ URL::asset('assets/plugins/parsleyjs/parsley.min.js')}}"></script>

        <script>
            $(document).ready(function () {
                $('.logo').dropify({
                    messages: {
                        'default': '',
                        'replace': 'Drag and drop or click to replace',
                        'remove':  'Remove',
                        'error':   'Ooops, something wrong happended.'
                    }
                });
            });

        </script>
@endsection

@section('script-bottom')
        <script>
            $(document).ready(function() {
                $('form').parsley();
            });
        </script>
@endsection