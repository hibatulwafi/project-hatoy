@extends('layouts.master')

@section('content')
            <div class="container-fluid">

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="page-title-box">
                                    <h4 class="page-title">Form Edit</h4>
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="javascript:void(0);">Qbun</a></li>
                                        <li class="breadcrumb-item"><a href="{{ route('petugas') }}">Forms</a></li>
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
                                            <form method="post" action="{{url('petugas/update')}}" id="form" data-parsley-validate="" novalidate="">
                                    {{csrf_field ()}} 
                                    <div class="form-group row">
                                            <label class="col-3 col-lg-2 col-form-label text-right">Id Petugas</label>
                                            <div class="col-5 col-lg-10">
                                                <input value="@if(count($result) >0 ) {{$result['master'][0]->id_petugas}} @endif" name="id_petugas" type="text" readonly class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-3 col-lg-2 col-form-label text-right">Email</label>
                                            <div class="col-9 col-lg-10">
                                                <input value="@if(count($result) >0 ) {{$result['master'][0]->email}} @endif" name="email" type="text" required="" class="form-control">
                                            </div>  
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-3 col-lg-2 col-form-label text-right">Nama Lengkap</label>
                                            <div class="col-9 col-lg-10">
                                                <input value="@if(count($result) >0 ) {{$result['master'][0]->namalengkap}} @endif" name="namalengkap" type="text" required="" class="form-control">
                                            </div>  
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-3 col-lg-2 col-form-label text-right">Role 
                                            
                                            
                                            </label>
                                            <div class="col-9 col-lg-10">
                                                <input value="@if($result['master'][0]->role==1)Admin Web @elseif($result['master'][0]->role==0)Super Admin @endif"name="role" type="text" readonly class="form-control">
                                            </div>
                                        </div>
                                        <div class="row pt-2 pt-sm-5 mt-1">
                                            
                                            <div class="col-sm-6 pl-0">
                                                <p class="text-right">
                                                    <button type="submit" class="btn btn-default">Save</button>
                                                    <button type="reset" class="btn btn-default"><a href="{{ route('petugas') }}">Cancel</button>
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