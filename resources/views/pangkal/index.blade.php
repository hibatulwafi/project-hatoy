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
    <div class="row" style="margin-bottom:16px;">
        <div class="col-sm-12">
            <div class="page-title-box">
                <h4 class="page-title float-left">Pembayaran Uang Pangkal</h4>
                <ol class="breadcrumb float-right">
                    <li class="breadcrumb-item"><a href="javascript:void(0);">Pembayaran</a></li>
                    <li class="breadcrumb-item active">Pangkal</li>
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
                    <a href="{{route('pangkal.alumni')}}" class="btn btn-info text-white">Data Alumni</a>
                    @elseif($filter == 'false')
                    <a href="{{route('pangkal')}}" class="btn btn-info text-white">Data Siswa</a>
                    @endif
                </div>
                <div class="col-6">
                <a href="" style="margin-left:10px;" class="btn btn-default btn-light float-right" data-toggle="modal" data-target="#importModal" title="Import File">
                    <i class="fa fa-file-excel"></i> Import
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
                            <th scope="col">No Telp</th>     
                            <th scope="col">Sisa/Status</th>  
                            <th scope="col" width="10%">Aksi</th> 
                        </tr>
                        </thead>
                        <tbody>
                            @php
                            $no=1;
                            $totaltunggakan=0;
                            @endphp
                            @foreach ($siswa ?? '' as $data)
                            <tr>
                                <td align="center">{{ $no++ }} </td>
                                <td>{{ $data->nis }} </td>
                                <td>{{ $data->nama_siswa }}</td>
                                <td>{{ $data->kelas }}</td>
                                <td>{{ $data->no_telepon }}</td>
                                <td class="text-right">
                                @php
                                     $cek = DB::table('tb_siswa')
                                      ->join('tb_detail_pembayaran','tb_detail_pembayaran.tahun_ajaran','tb_siswa.tahun_masuk')
                                      ->where('tb_detail_pembayaran.id_jenis_pem',3)
                                      ->where('tb_siswa.nis',$data->nis)
                                      ->select('tb_detail_pembayaran.jumlah')
                                      ->first();

                                     $sisa = DB::table('tb_pembayaran')
                                     ->where('nis',$data->nis)
                                     ->where('id_jenis_pem',3)
                                     ->where('pembayaran_tahun',$data->tahun_masuk)
                                     ->sum('jumlah');

                                     $tunggakan = $cek->jumlah - $sisa;
                                     $totaltunggakan += $tunggakan;

                                @endphp
                                Rp.{{number_format($tunggakan)}}
                                </td>
                                <td align="center">
                                    <a class="btn btn-info btn-sm" href="{{url('/pangkal/pembayaran/'.$data->nis)}}" ><i class="fa fa-plus"></i></a>
                                </td>
                            </tr>

                            @endforeach
                        </tbody>
                         <tfoot> 
                                <tr><td></td>
                                    <td colspan="4" class="text-right">Jumlah</td>
                                    <td class="text-right">Rp.{{number_format($totaltunggakan)}}</td>
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
        <script src="{{ URL::asset('assets/pages/datatables.init.js')}}"></script>
@endsection