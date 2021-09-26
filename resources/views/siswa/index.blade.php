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

                    <div class="row" style="margin-bottom:20px;">
                        <div class="col-6">
                             @if($filter == 'true')
                            <a href="{{route('tabelsiswa.filter',['Alumni'])}}" class="btn btn-info text-white">Data Alumni</a>
                            @elseif($filter == 'false')
                            <a href="{{route('tabelsiswa')}}" class="btn btn-info text-white">Data Siswa</a>
                            @endif  

                        </div>
                        <div class="col-6">
                        <a href="" style="margin-left:10px;" class="btn btn-default btn-light float-right" data-toggle="modal" data-target="#importModal" title="Import File">
                            <i class="fa fa-file-excel"></i> Import
                        </a>
                        <a href="{{ route('siswa.export') }}" class="btn btn-default btn-light float-right" title="Export Excel">
                            <i class="fas fa-file-excel"></i> Export
                        </a>
                        </div>
                    </div>


                    <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                     <thead>
                        <tr>
                            <th scope="col" width="5%">No</th>
                            <th scope="col">NIS</th>
                            <th scope="col">Nama Siswa</th>  
                            <th scope="col">Kelas</th>  
                            <th scope="col">Gender</th>  
                            <th scope="col">No Telp</th>     
                            <th scope="col" width="10%">Aksi</th> 
                        </tr>
                        </thead>
                        <tbody>
                            @php
                            $no=1;
                            @endphp
                            @foreach ($siswa ?? '' as $data)
                            <tr>
                                <td align="center">{{ $no++ }} </td>
                                <td>{{ $data->nis }} </td>
                                <td>{{ $data->nama_siswa }}</td>
                                <td>{{ $data->kelas }}</td>
                                <td>{{ $data->jk }}</td>
                                <td>{{ $data->no_telepon }}</td>
                                <td align="center">
                                    <a class="btn btn-info btn-sm" href="{{url('/siswa/detail/'.$data->nis)}}" ><i class="fa fa-eye"></i></a>
                                    <a class="btn btn-success btn-sm" href="{{url('/siswa/edit/'.$data->nis)}}" ><i class="fa fa-edit"></i></a>
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

 <!-- Modal Import File-->
<div class="modal fade" id="importModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Import Data Siswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
         <form action="{{ route('siswa.import')}}" method="POST" enctype="multipart/form-data">
            <div class="modal-body">
                    @csrf
                    <div class="form-group">
                      <label for="import_produk">Import File</label>
                      <input type="file" class="form-control-file" name="import_siswa" id="import_siswa" placeholder="" aria-describedby="fileHelpId" required>
                      <small id="fileHelpId" class="form-text text-muted">Tipe file : xls, xlsx</small>
                      <small id="fileHelpId" class="form-text text-muted">Pastikan file upload sesuai format. <br> <a href="{{ url('template/siswa_template.xlsx') }}">Download contoh format file xlsx <i class="fas fa-download ml-1   "></i></a></small>
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