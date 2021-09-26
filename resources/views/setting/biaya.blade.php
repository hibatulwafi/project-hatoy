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
                <h4 class="page-title float-left">Setting Master Biaya</h4>
                <ol class="breadcrumb float-right">
                    <li class="breadcrumb-item"><a href="javascript:void(0);">Setting</a></li>
                    <li class="breadcrumb-item active">Master Biaya</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- end row -->

    <div class="row">
        <div class="col-12">
            <div class="card m-b-20">
                <div class="card-body">
                   <div class="row" style="margin-bottom:20px;">
                        <div class="col-6">
                        <a href="" style="margin-left:10px;" class="btn btn-default btn-success " data-toggle="modal" data-target="#importModal" title="Import File">
                            <i class="fa fa-plus-square"></i>  Tambah Data
                        </a>      
                        </div>
                    </div>


                    <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                     <thead>
                        <tr>
                            <th scope="col" width="5%">No</th>
                            <th scope="col">Nama Biaya</th>
                            <th scope="col" width="40%">Kategori Operasianal</th>
                            <th scope="col" width="10%">Aksi</th> 
                        </tr>
                        </thead>
                        <tbody>
                            @php
                            $no=1;
                            @endphp
                            @foreach ($qry ?? '' as $data)
                            <tr>
                                <td align="center">{{ $no++ }} </td>
                                <td>{{ $data->nama_biaya }} </td>
                                <td>{{ $data->kategori_operasional }} </td>
                                <td align="center">
                                    <div class="btn-group" role="group" aria-label="Basic example">

                                    <a class="btn btn-info btn-sm" data-toggle="modal" data-target="#edit-{{$data->id_master_biaya}}" title="Import File" href="" ><i class="fa fa-edit"></i></a>
                                    <a class="btn btn-danger btn-sm" onclick="return confirm('Apakah kamu yakin ingin menghapus data ini?')" href="{{url('/setting/biaya/delete/'.$data->id_master_biaya)}}"  ><i class="fa fa-trash"></i></a>
                                </div>

                                 <!-- Modal Add-->
                                <div class="modal fade" id="edit-{{$data->id_master_biaya}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="deleteModalLabel">Edit Data - {{$data->nama_biaya}}</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="{{ route('edit.biaya')}}" method="POST" enctype="multipart/form-data">

                                            <div class="modal-body">
                                                    @csrf
                                                    <div class="form-group">
                                                        <div class="form-group row col-12">
                                                            <div class="col-9 col-lg-10">
                                                                <input name="id_master_biaya" value="{{$data->id_master_biaya}}" type="hidden" readonly required="" class="form-control" placeholder="Nominal SPP">
                                                            </div>  
                                                        </div>

                                                        <div class="form-group row col-12">
                                                            <label class="col-3 col-lg-2 col-form-label text-left">Kategori</label>
                                                            <div class="col-9 col-lg-10">
                                                                <select name="kategori_operasional" class="form-control">
                                                                    <option value="Operasional I" @if($data->kategori_operasional == 'Operasional I' ) selected @endif> Operasional I </option>
                                                                    <option value="Operasional II"  @if($data->kategori_operasional == 'Operasional II' ) selected @endif> Operasional II </option>
                                                                    <option value="Operasional III"  @if($data->kategori_operasional == 'Operasional III' ) selected @endif> Operasional III </option>
                                                                </select> 
                                                            </div>  
                                                        </div>

                                                        <div class="form-group row col-12">
                                                            <label class="col-3 col-lg-2 col-form-label text-left">Biaya</label>
                                                            <div class="col-9 col-lg-10">
                                                                <input name="biaya" value="{{$data->nama_biaya}}"  type="text" required="" class="form-control" placeholder="E.G : Gaji Karyawan">
                                                            </div>  
                                                        </div>
                                                        
                                                    </div>
                                                
                                            </div>
                                            <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                        </form>
                                        </div>
                                    </div>
                                </div>


                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
 </div> <!-- container-fluid -->

 <!-- Modal Add-->
<div class="modal fade" id="importModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="{{ route('add.biaya')}}" method="POST" enctype="multipart/form-data">

            <div class="modal-body">
                    @csrf
                    <div class="form-group">

                        <div class="form-group row col-12">
                            <label class="col-3 col-lg-2 col-form-label text-left">Kategori</label>
                            <div class="col-9 col-lg-10">
                                <select name="kategori_operasional" class="form-control">
                                    <option value="Operasional I"> Operasional I </option>
                                    <option value="Operasional II"> Operasional II </option>
                                    <option value="Operasional III"> Operasional III </option>
                                </select> 
                            </div>  
                        </div>

                        <div class="form-group row col-12">
                            <label class="col-3 col-lg-2 col-form-label text-left">Biaya</label>
                            <div class="col-9 col-lg-10">
                                <input name="biaya" type="text" required="" class="form-control" placeholder="E.G : Gaji Karyawan">
                            </div>  
                        </div>
                      
                    </div>
                
            </div>
            <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
        </div>
    </div>
</div>

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