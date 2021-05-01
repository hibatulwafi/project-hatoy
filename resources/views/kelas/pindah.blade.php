@extends('layouts.master')
    
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <h4 class="page-title">Form Pindah Kelas</h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0);">Kelas</a></li>
                    <li class="breadcrumb-item active">Pindah Kelas</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- end row -->

    <div class="row">
        <div class="col-lg-12">
            <div class="card m-b-20">
                <div class="card-body">
                <center><h5>Pindah Kelas</h5></center>
                <p/>
                <form method="post"  action="#" id="form" data-parsley-validate="" novalidate="">
                {{csrf_field ()}}
                   
                   <div class="col-12">
                        <div class="row">
                        <div class="form-group row col-6">
                            <label class="col-3 col-lg-2 col-form-label text-right">Siswa</label>
                            <div class="col-9 col-lg-10">
                            <select class="form-control">
                                <option>- Pilih Siswa-</option>
                                <option>12345 - Hibatul Wafi</option>
                                <option>12346 - Rida Febria</option>

                            </select>
                            </div>  
                        </div>
                          <div class="form-group row col-6">
                            <label class="col-3 col-lg-2 col-form-label text-right">Kelas</label>
                            <div class="col-4 col-lg-5">
                                <select name="tahun_pr" class="form-control">
                                   <option value="L">7</option>
                                   <option value="L">8</option>
                                   <option value="L">9</option>
                                </select>                           
                            </div>
                             <div class="col-5 col-lg-5">
                                <select name="tahun_pr" class="form-control">
                                   <option value="L">A</option>
                                   <option value="L">B</option>
                                   <option value="L">C</option>
                                   <option value="L">E</option>
                                   <option value="L">F</option>
                                   <option value="L">G</option>
                                </select>                           
                            </div>  
                        </div>
                        </div>
                    </div>


                    <div class="col-12" style="margin-top:20px;">
                        <div class="row">
                        <div class="col-2">&nbsp;</div>
                        <div class="col-4">
                            <button class="btn btn-danger col-12 align-right">RESET</button>
                        </div>
                        <div class="col-4">
                             <button class="btn btn-success col-12 align-right">SIMPAN DATA</button>
                        </div>
                        <div class="col-2">&nbsp;</div>
                        </div>
                    </div>

                </form>

            </div>
            </div>  
        </div>

        <div class="col-lg-12">
            <div class="card m-b-20">
                <div class="card-body">

                    <center style="margin-top:25px;"><h5>Detail Siswa</h5></center>

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
                                <input name="nis" type="text" required="" class="form-control" placeholder="Nomor Induk Siswa Nasional">
                            </div>  
                        </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="row">
                        <div class="form-group row col-6">
                            <label class="col-3 col-lg-2 col-form-label text-right">NIK</label>
                            <div class="col-9 col-lg-10">
                                <input name="nis" type="text" required="" class="form-control" placeholder="Nomor Induk Keluarga">
                            </div>  
                        </div>
                          <div class="form-group row col-6">
                            <label class="col-3 col-lg-2 col-form-label text-right">Nama</label>
                            <div class="col-9 col-lg-10">
                                <input name="nis" type="text" required="" class="form-control" placeholder="Nama Siswa">
                            </div>  
                        </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="row">
                        <div class="form-group row col-6">
                            <label class="col-3 col-lg-2 col-form-label text-right">Kelas</label>
                            <div class="col-4 col-lg-5">
                                <select name="tahun_pr" class="form-control">
                                   <option value="L">7</option>
                                   <option value="L">7</option>
                                   <option value="L">8</option>
                                </select>                           
                            </div>
                             <div class="col-5 col-lg-5">
                                <select name="tahun_pr" class="form-control">
                                   <option value="L">A</option>
                                   <option value="L">B</option>
                                   <option value="L">C</option>
                                </select>                           
                            </div>  
                        </div>
                        <div class="form-group row col-6">
                            <label class="col-3 col-lg-2 col-form-label text-right">Agama</label>
                             <div class="col-9 col-lg-10">
                                <select name="tahun_pr" class="form-control">
                                   <option value="L">Islam</option>
                                   <option value="L">Hindu</option>
                                   <option value="L">Kristen Khatolik</option>
                                   <option value="L">Kristen Protestan</option>
                                   <option value="L">Budha</option>
                                   <option value="L">Lainnya</option>
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
                                <select name="tahun_pr" class="form-control">
                                   <option value="L">Pria</option>
                                   <option value="L">Wanita</option>
                                </select>                           
                            </div>  
                        </div>
                        <div class="form-group row col-6">
                            <label class="col-3 col-lg-2 col-form-label text-right">TTL</label>
                            <div class="col-lg-4 col-sm-4">
                                <input name="nis" type="text" required="" class="form-control" placeholder="Sukabumi">
                            </div>
                            <div class="col-lg-6 col-sm-5">
                                <input name="nis" type="date" required="" class="form-control">
                            </div>   
                        </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="row">
                        <div class="form-group row col-6">
                            <label class="col-3 col-lg-2 col-form-label text-right">No Telp</label>
                            <div class="col-9 col-lg-10">
                                <input name="nis" type="text" required="" class="form-control" placeholder="0858 6304 6869">
                            </div>  
                        </div>
                          <div class="form-group row col-6">
                            <label class="col-3 col-lg-2 col-form-label text-right">Asal Skl</label>
                            <div class="col-9 col-lg-10">
                                <input name="nis" type="text" required="" class="form-control" placeholder="Asal Sekolah Siswa">
                            </div>  
                        </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="row">
                        <div class="form-group row col-6">
                            <label class="col-3 col-lg-2 col-form-label text-right">Anak Ke</label>
                            <div class="col-4 col-lg-5">
                                <input name="nis" type="text" required="" class="form-control" placeholder="Contoh : 2">
                            </div> 
                            <div class="col-5 col-lg-5">
                                <select name="tahun_pr" class="form-control">
                                   <option value="L">Anak Kandung</option>
                                   <option value="L">Anak Sambung</option>
                                </select>                                 
                            </div>  
                        </div>
                          <div class="form-group row col-6">
                            <label class="col-3 col-lg-2 col-form-label text-right">Tahun Masuk</label>
                            <div class="col-9 col-lg-10">
                                <select name="tahun_pr" class="form-control">
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
                            <label class="col-3 col-lg-2 col-form-label text-right">No Seri</label>
                            <div class="col-4 col-lg-5">
                                <input name="nis" type="text" required="" class="form-control" placeholder="No Seri Ijazah">
                            </div>  
                            <div class="col-5 col-lg-5">
                                <input name="nis" type="text" required="" class="form-control" placeholder="No Seri SKHUN">
                            </div>  
                        </div>
                          <div class="form-group row col-6">
                            <label class="col-3 col-lg-2 col-form-label text-right">No UN</label>
                            <div class="col-9 col-lg-10">
                                <input name="nis" type="text" required="" class="form-control" placeholder="No Peserta UN">
                            </div>  
                        </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="row">
                        <div class="form-group row col-6">
                            <label class="col-3 col-lg-2 col-form-label text-right">Alamat</label>
                            <div class="col-9 col-lg-10">
                               <textarea name="" class="form-control" placeholder="Alamat Lengkap"></textarea>
                            </div>  
                           
                        </div>
                        <div class="form-group row col-6">
                            <label class="col-3 col-lg-2 col-form-label text-right">Ket</label>
                            <div class="col-9 col-lg-10">
                               <textarea name="" class="form-control" placeholder="Keterangan Tambahan"></textarea>
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
                                <input name="nis" type="text" required="" class="form-control" placeholder="Nama Ayah">
                            </div>  
                        </div>
                          <div class="form-group row col-6">
                            <label class="col-3 col-lg-2 col-form-label text-right">4</label>
                            <div class="col-9 col-lg-10">
                                <input name="nis" type="text" required="" class="form-control" placeholder="Nama Ibu">
                            </div>  
                        </div>
                        </div>
                    </div>

                     <div class="col-12">
                        <div class="row">
                        <div class="form-group row col-6">
                            <label class="col-3 col-lg-2 col-form-label text-right">2</label>
                            <div class="col-9 col-lg-10">
                                <input name="nis" type="text" required="" class="form-control" placeholder="Pekerjaan Ayah">
                            </div>  
                        </div>
                          <div class="form-group row col-6">
                            <label class="col-3 col-lg-2 col-form-label text-right">5</label>
                            <div class="col-9 col-lg-10">
                                <input name="nis" type="text" required="" class="form-control" placeholder="Pekerjaan Ibu">
                            </div>  
                        </div>
                        </div>
                    </div>

                     <div class="col-12">
                        <div class="row">
                        <div class="form-group row col-6">
                            <label class="col-3 col-lg-2 col-form-label text-right">3</label>
                            <div class="col-9 col-lg-10">
                                <input name="nis" type="text" required="" class="form-control" placeholder="Pendidikan Ayah">
                            </div>  
                        </div>
                          <div class="form-group row col-6">
                            <label class="col-3 col-lg-2 col-form-label text-right">6</label>
                            <div class="col-9 col-lg-10">
                                <input name="nis" type="text" required="" class="form-control" placeholder="Pendidikan Ibu">
                            </div>  
                        </div>
                        </div>
                    </div>

                </div>
            </div>  
        </div>
    </div> <!-- end row -->     
</div> <!-- container-fluid -->
@endsection

@section('script')
        <!-- Parsley js -->
        <script src="{{ URL::asset('assets/plugins/parsleyjs/parsley.min.js')}}"></script>
@endsection

@section('script-bottom')
        <script>
            $(document).ready(function() {
                $('form').parsley();
            });
        </script>
@endsection