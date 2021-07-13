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
                <h4 class="page-title float-left">Laporan</h4>
                <ol class="breadcrumb float-right">
                    <li class="breadcrumb-item"><a href="javascript:void(0);">Laporan</a></li>
                    <li class="breadcrumb-item active">Bulanan</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- end row -->

    <div class="row">
        <div class="col-12">
            <div class="card m-b-20">
                <div class="card-body">

                    <a href="{{ route('laporan.harian') }}" class="btn btn-info">Harian</a>
                    <a href="{{ route('laporan.bulanan') }}" class="btn btn-success">Bulanan</a>
                    <a href="{{ route('laporan.semester') }}" class="btn btn-info">Semester</a>
                    <br/>
                    <br/>
           

                    <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th scope="col" width="5%">No</th>
                                <th scope="col" class="text-center">Bulan</th>
                                <th scope="col" class="text-center">Tahun</th>
                                <th scope="col" class="text-center">Total Pemasukan</th>  
                                <th scope="col"  width="10%">Detail</th> 
                            </tr>
                        </thead>
                        <tbody>
                        @php
                        $no = 1;
                        @endphp
                        @foreach($bulanan as $data)
                      

                            <tr>
                               <td>{{$no++}}</td>
                               <td>
                                    @if($data->date == 1)
                                    Januari
                                    @elseif($data->date == 2)
                                    Februari
                                    @elseif($data->date == 3)
                                    Maret
                                    @elseif($data->date == 4)
                                    April
                                    @elseif($data->date == 5)
                                    Mei
                                    @elseif($data->date == 6)
                                    Juni
                                    @elseif($data->date == 7)
                                    Juli
                                    @elseif($data->date == 8)
                                    Agustus
                                    @elseif($data->date == 9)
                                    September
                                    @elseif($data->date == 10)
                                    Oktober
                                    @elseif($data->date == 11)
                                    November
                                    @elseif($data->date == 12)
                                    Desember
                                    @endif
                               </td>
                               <td class="text-center">{{date_format(date_create($data->dibuat_pada),'Y')}}</td>
                               <td class="text-right">{{number_format($data->total)}}</td>
                               <td><a class="btn btn-info btn-sm" href="{{route('laporan.bulanan.detail',$data->date)}}" ><i class="fa fa-eye"></i></a></td>
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