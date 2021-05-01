@extends('layouts.master')

@section('content')
            <div class="container-fluid">

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="page-title-box">
                                    <h4 class="page-title">Form Edit</h4>
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="javascript:void(0);">Qbun</a></li>
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
                                            <form method="post" action="{{url('produksi/update')}}" id="form" data-parsley-validate="" novalidate="">
                                    {{csrf_field ()}} 
                                        <div class="form-group row">
                                            <label class="col-3 col-lg-2 col-form-label text-right">Id Produksi</label>
                                            <div class="col-5 col-lg-10">
                                                <input value="@if(count($result) >0 ) {{$result['master'][0]->id_produksi}} @endif" name="id_produksi" type="text" readonly class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-3 col-lg-2 col-form-label text-right">Id Komoditas</label>
                                            <div class="col-5 col-lg-10">
                                                <input value="@if(count($result) >0 ) {{$result['master'][0]->id_komoditas}} @endif" name="id_komoditas" type="text" readonly class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-3 col-lg-2 col-form-label text-right">Tahun </label>
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
                                        <div class="form-group row">
                                            <label class="col-3 col-lg-2 col-form-label text-right">Jumlah Produksi</label>
                                            <div class="col-9 col-lg-10">
                                                <input value="@if(count($result) >0 ) {{$result['master'][0]->jml_produksi}} @endif" name="jml_produksi" type="text" required="" class="form-control">
                                            </div>  
                                        </div>
                                        <div class="row pt-2 pt-sm-5 mt-1">
                                            
                                            <div class="col-sm-6 pl-0">
                                                <p class="text-right">
                                                    <button type="submit" class="btn btn-default">Save</button>
                                                    <button type="reset" class="btn btn-default"><a href="{{ route('produksi') }}">Cancel</button>
                                                </p>
                                            </div>
                                        </div>
                                    </form>
        
                                    </div>
                                </div>
                            </div> <!-- end col -->                                
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