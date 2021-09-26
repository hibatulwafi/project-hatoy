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
                <h4 class="page-title float-left">Pembayaran Uang Kegiatan</h4>
                <ol class="breadcrumb float-right">
                    <li class="breadcrumb-item"><a href="javascript:void(0);">Pembayaran</a></li>
                    <li class="breadcrumb-item active">Kegiatan</li>
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
                    <a href="{{route('kegiatan.filter')}}" class="btn btn-info text-white">Data Alumni</a>
                    @elseif($filter == 'false')
                    <a href="{{route('kegiatan')}}" class="btn btn-info text-white">Data Siswa</a>
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
                            <th scope="col">Gender</th>  
                            <th scope="col">No Telp</th>
                            <th scope="col">Sisa /Status</th>
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
                                <td>{{ $data->jk }}</td>
                                <td>{{ $data->no_telepon }}</td>

                                <?php  
                                $biaya = DB::table('tb_detail_pembayaran')
                                ->where('tahun_ajaran',$data->tahun_masuk)
                                ->where('id_jenis_pem',2)->first();
                                $id=$data->nis;
                                $tunggakan = 0;
                                $tahunmasuk = $data->tahun_masuk;

                                $selisih = $tahunSekarang - $data->tahun_masuk;

                                if($selisih >= 4){
                                   $tahunSekarang = $data->tahun_masuk+ 3;
                                }             

                                foreach(range($data->tahun_masuk, $tahunSekarang) as $year){
                                       $qrytunggakan = DB::table('tb_pembayaran')
                                       ->where('nis', $id)
                                       ->where('id_jenis_pem',2)
                                       ->where('pembayaran_tahun',$year)
                                       ->select(DB::raw('SUM(jumlah) as jumlah'),DB::raw('SUM(diskon) as diskon'))
                                       ->get();
                                            foreach( $qrytunggakan as $row){   
                                                    $tunggakan1 = $biaya->jumlah - $row->jumlah - $row->diskon; 
                                                    $tunggakan = $tunggakan+$tunggakan1;
                                            }
                                }
                                       

                                $totaltunggakan += $tunggakan;
                                echo "<td class='text-right'> Rp.".number_format($tunggakan)."</td>";

                                ?>
                                <td align="center">
                                    <a class="btn btn-info btn-sm" href="{{url('/kegiatan/pembayaran/'.$data->nis)}}" ><i class="fa fa-plus"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                         <tfoot> 
                                <tr><td></td>
                                    <td colspan="5" class="text-right">Jumlah</td>
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