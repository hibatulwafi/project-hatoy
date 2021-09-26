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
                                    <h4 class="page-title">Data Petugas</h4>
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="javascript:void(0);">Petugas</a></li>
                                        <li class="breadcrumb-item active">Data Petugas</li>
                                    </ol>
                                    <div>
                                        <!-- <a href="{{ url('petugas/tambah') }}" class="btn btn-sm btn-primary">Tambah Petugas</a> -->
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->

                        <div class="row">
                            <div class="col-12">
                                <div class="card m-b-20">
                                    <div class="card-body">
                                        <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>
                                            <tr>
                                                <th scope="col">No</th>
                                                <th scope="col">Email</th>
                                                <th scope="col">Name</th>
                                                <th scope="col">Role</th>
                                                <th scope="col">Aksi</th>
                                            </tr>
                                            </thead>

                                            <tbody>
                                @php
                                $no = 1;
                                @endphp

                                @foreach ($petugas ?? '' as $datapetugas)
                                    <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $datapetugas->email }}</td>
                                    <td>{{ $datapetugas->name }}</td>
                                    <td>@if($datapetugas->level == 1)
                                            Kepala Sekolah
                                        @elseif($datapetugas->level == 2)
                                            Akuntan
                                        @elseif($datapetugas->level == 3)
                                            Bendahara
                                        @elseif($datapetugas->level == 0)
                                            Root
                                        @endif
                                    </td>
                                    <td class="text-center">
                                   <!--  <a class="btn btn-danger btn-link btn-sm" href="{{url('/petugas/delete/'.$datapetugas->id)}}"> <i class="fa fa-trash"></i>
                                    </a> -->
                                    <a class="btn btn-info btn-sm" href="{{url('/petugas/edit/'.$datapetugas->id)}}" ><i class="fas fa-user-edit"></i>
                                    </a>
                                    <a class="btn btn-warning btn-sm" href="{{ route('editpass') }}" > <i class="fa fa-key"></i>
                                    </a>
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