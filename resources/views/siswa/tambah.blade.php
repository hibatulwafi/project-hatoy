@extends('layouts.master')
    
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <h4 class="page-title">Form Tambah Siswa</h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0);">Siswa</a></li>
                    <li class="breadcrumb-item active">Form Tambah</li>
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
                <form method="post"  action="{{ url('siswa/save') }}" id="form" data-parsley-validate="" novalidate="" enctype="multipart/form-data">
                {{csrf_field ()}}

                   

                    <div class="col-12">
                        <div class="row">
                        <div class="form-group row col-6">
                            <label class="col-3 col-lg-2 col-form-label text-right">NIS</label>
                            <div class="col-9 col-lg-10">
                                <input name="nis" type="text" required="" class="form-control" placeholder="Nomor Induk Siswa">
                            </div>  
                        </div>
                          <div class="form-group row col-6">
                            <label class="col-3 col-lg-2 col-form-label text-right">NISN</label>
                            <div class="col-9 col-lg-10">
                                <input name="nisn" type="text" required="" class="form-control" placeholder="Nomor Induk Siswa Nasional">
                            </div>  
                        </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="row">
                        <div class="form-group row col-6">
                            <label class="col-3 col-lg-2 col-form-label text-right">NIK</label>
                            <div class="col-9 col-lg-10">
                                <input name="nik" type="text" required="" class="form-control" placeholder="Nomor Induk Keluarga">
                            </div>  
                        </div>
                          <div class="form-group row col-6">
                            <label class="col-3 col-lg-2 col-form-label text-right">Nama</label>
                            <div class="col-9 col-lg-10">
                                <input name="nama_siswa" type="text" required="" class="form-control" placeholder="Nama Siswa">
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
                                   <option value="VII">7</option>
                                   <option value="VIII">8</option>
                                   <option value="IX">9</option>
                                </select>                           
                            </div>
                             <div class="col-5 col-lg-5">
                                <select name="kelas_huruf" class="form-control">
                                   <option value="A">A</option>
                                   <option value="B">B</option>
                                   <option value="C">C</option>
                                   <option value="D">D</option>
                                   <option value="E">E</option>
                                   <option value="F">F</option>
                                   <option value="G">G</option>
                                </select>                           
                            </div>  
                        </div>
                        <div class="form-group row col-6">
                            <label class="col-3 col-lg-2 col-form-label text-right">Agama</label>
                             <div class="col-9 col-lg-10">
                                <select name="agama" class="form-control">
                                   <option value="Islam">Islam</option>
                                   <option value="Hindu">Hindu</option>
                                   <option value="Budha">Budha</option>
                                   <option value="Kristen Khatolik">Kristen Khatolik</option>
                                   <option value="Kristen Protestan">Kristen Protestan</option>
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
                                   <option value="L">Pria</option>
                                   <option value="P">Wanita</option>
                                </select>                           
                            </div>  
                        </div>
                        <div class="form-group row col-6">
                            <label class="col-3 col-lg-2 col-form-label text-right">TTL</label>
                            <div class="col-lg-4 col-sm-4">
                                <input name="tempat" type="text" required="" class="form-control" placeholder="Sukabumi">
                            </div>
                            <div class="col-lg-6 col-sm-5">
                                <input name="tanggal_lahir" type="date" required="" class="form-control">
                            </div>   
                        </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="row">
                        <div class="form-group row col-6">
                            <label class="col-3 col-lg-2 col-form-label text-right">No Telp</label>
                            <div class="col-9 col-lg-10">
                                <input name="no_telepon" type="text" required="" class="form-control" placeholder="0858 6304 6869">
                            </div>  
                        </div>
                          <div class="form-group row col-6">
                            <label class="col-3 col-lg-2 col-form-label text-right">Asal Skl</label>
                            <div class="col-9 col-lg-10">
                                <input name="asal_sekolah" type="text" required="" class="form-control" placeholder="Asal Sekolah Siswa">
                            </div>  
                        </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="row">
                        <div class="form-group row col-6">
                            <label class="col-3 col-lg-2 col-form-label text-right">Anak Ke</label>
                            <div class="col-4 col-lg-5">
                                <input name="anak_ke" type="text" required="" class="form-control" placeholder="Contoh : 2">
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
                                <input name="no_seri_ijazah" type="text" required="" class="form-control" placeholder="No Seri Ijazah">
                            </div>  
                        </div>
                          <div class="form-group row col-6">
                            <label class="col-3 col-lg-2 col-form-label text-right">No SKHUN</label>
                            <div class="col-9 col-lg-10">
                                <input name="no_seri_skhun" type="text" required="" class="form-control" placeholder="No Seri SKHUN">
                            </div>  
                        </div>
                        </div>
                    </div>

                     <div class="col-12">
                        <div class="row">
                            <div class="form-group row col-6">
                                <label class="col-3 col-lg-2 col-form-label text-right">No UN</label>
                                <div class="col-9 col-lg-10">
                                    <input name="no_peserta_un" type="text" required="" class="form-control" placeholder="No Peserta UN">
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
                               <textarea name="alamat_lengkap" class="form-control" placeholder="Alamat Lengkap"></textarea>
                            </div>  
                           
                        </div>
                        <div class="form-group row col-6">
                            <label class="col-3 col-lg-2 col-form-label text-right">Ket</label>
                            <div class="col-9 col-lg-10">
                               <textarea name="keterangan_tambahan" class="form-control" placeholder="Keterangan Tambahan"></textarea>
                            </div>  
                           
                        </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="row">
                        <div class="form-group row col-6">
                            <label class="col-3 col-lg-2 col-form-label text-right">Foto Siswa</label>
                                <div class="col-9 col-lg-10">
                                    <input type="file" class="form-control logo " name="gambar" id="gambar">
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
                                <input name="nama_ayah" type="text" required="" class="form-control" placeholder="Nama Ayah">
                            </div>  
                        </div>
                          <div class="form-group row col-6">
                            <label class="col-3 col-lg-2 col-form-label text-right">4</label>
                            <div class="col-9 col-lg-10">
                                <input name="nama_ibu" type="text" required="" class="form-control" placeholder="Nama Ibu">
                            </div>  
                        </div>
                        </div>
                    </div>

                     <div class="col-12">
                        <div class="row">
                        <div class="form-group row col-6">
                            <label class="col-3 col-lg-2 col-form-label text-right">2</label>
                            <div class="col-9 col-lg-10">
                                <input name="pekerjaan_ayah" type="text" required="" class="form-control" placeholder="Pekerjaan Ayah">
                            </div>  
                        </div>
                          <div class="form-group row col-6">
                            <label class="col-3 col-lg-2 col-form-label text-right">5</label>
                            <div class="col-9 col-lg-10">
                                <input name="pekerjaan_ibu" type="text" required="" class="form-control" placeholder="Pekerjaan Ibu">
                            </div>  
                        </div>
                        </div>
                    </div>

                     <div class="col-12">
                        <div class="row">
                        <div class="form-group row col-6">
                            <label class="col-3 col-lg-2 col-form-label text-right">3</label>
                            <div class="col-9 col-lg-10">
                                <input name="pendidikan_ayah" type="text" required="" class="form-control" placeholder="Pendidikan Ayah">
                            </div>  
                        </div>
                          <div class="form-group row col-6">
                            <label class="col-3 col-lg-2 col-form-label text-right">6</label>
                            <div class="col-9 col-lg-10">
                                <input name="pendidikan_ibu" type="text" required="" class="form-control" placeholder="Pendidikan Ibu">
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