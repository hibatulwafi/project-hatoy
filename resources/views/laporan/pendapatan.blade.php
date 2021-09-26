@extends('layouts.master')

@section('css')
        <!-- DataTables -->
        <link href="{{ URL::asset('assets/plugins/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ URL::asset('assets/plugins/datatables/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- Responsive datatable examples -->
        <link href="{{ URL::asset('assets/plugins/datatables/responsive.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ URL::asset('assets/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}" rel="stylesheet">

@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <h4 class="page-title float-left">Laporan</h4>
                <ol class="breadcrumb float-right">
                    <li class="breadcrumb-item"><a href="javascript:void(0);">Laporan</a></li>
                    <li class="breadcrumb-item active">Harian</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- end row -->

    <div class="row">
        <div class="col-12">
            <div class="card m-b-20">
                <div class="card-body">
                    <div class="col-12 mt-2">
                    <form action="{{route('laporan.filter')}}" method="GET" enctype="multipart/form-data" class="form-inline float-right">
                    @csrf
                        <div class="form-group">
                            <div class="row" style="margin-bottom:16px;">
                                    <label>Filter Tanggal &nbsp;</label>
                                    <div class="input-daterange input-group" id="date-range">
                                        <input type="text" class="form-control" placeholder="Tanggal Awal" name="start" autocomplete="off"/>
                                        <input type="text" class="form-control" placeholder="Tanggal Akhir" name="end" autocomplete="off"/>
                                    </div>
                                    <button type="submit" class="btn btn-success"><i class="fa fa-search"></i> Filter</button>

                            </div>
                        </div>
                    </form>
                    </div>

                    <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap " style="border-collapse: collapse; border-spacing: 0; width: 100%; ">
                        <thead>
                            <tr>
                                <th scope="col" width="5%">No</th>
                                <th scope="col" class="text-center">Tanggal</th>
                                <th scope="col" class="text-center">Total Pemasukan</th>  
                                <th scope="col"  width="10%">Detail</th> 
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                                $total_pemasukan = 0;
                            @endphp
                            @forelse($pendapatan as $data)
                            
                            <tr>
                               <td>{{$no++}}</td>
                               <td>{{date_format(date_create($data->date),'D, d/M/Y')}}</td>
                               <td class="text-right">{{number_format($data->total)}}</td>
                               <td><a class="btn btn-info btn-sm" href="{{route('laporan.harian.detail',$data->date)}}" ><i class="fa fa-eye"></i></a></td>
                            </tr>
                            @php
                                $total_pemasukan += $data->total;
                            @endphp
                            @empty
                            <tr>
                                <td colspan="4" class="text-center"> Data Kosong - Silahan Filter Tanggal </td>
                            </tr>
                           @endforelse
                        </tbody>
                        <tfoot>
                            <tr>
                            <td></td>
                            <td class="text-center">Total</td>
                            <td class="text-right">Rp.{{number_format($total_pemasukan)}}</td>
                            <td></td>
                            </tr>
                        </tfoot>
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
        <script src="{{ URL::asset('assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js')}}"></script>
        <script src="{{ URL::asset('assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js')}}"></script>
        <!-- Plugins Init js -->
        <script src="{{ URL::asset('assets/pages/form-advanced.js')}}"></script>

@endsection