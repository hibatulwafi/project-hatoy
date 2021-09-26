@extends('layouts.master')

@section('css')
        <!-- DataTables -->
        <link href="{{ URL::asset('assets/plugins/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ URL::asset('assets/plugins/datatables/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- Responsive datatable examples -->
        <link href="{{ URL::asset('assets/plugins/datatables/responsive.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">

            @if(session('success'))
            <br/>
            <div class="alert alert-success bg-success text-white alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <strong>{{session('success')}}</strong> 
            </div>

            @elseif(session('error'))
            <br/>
            <div class="alert alert-success bg-warning text-white alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <strong>{{session('error')}}</strong> 
            </div>
            @endif
            <div class="page-title-box" style="margin-bottom:16px;">
                <h4 class="page-title float-left">Laporan Aset</h4>
                <ol class="breadcrumb float-right">
                    <li class="breadcrumb-item"><a href="javascript:void(0);">Laporan</a></li>
                    <li class="breadcrumb-item active">Aset</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- end row -->

    <div class="row">
        <div class="col-12">
            <div class="card m-b-20">
                <div class="card-body">
                    <!--  Modal content for the above example -->
                    <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                     <thead>
                        <tr>
                            <th scope="col" width="5%">No</th>
                            <th scope="col">Bulan/Tahun Beli</th>
                            <th scope="col">Tahun Penggunaan</th>
                            <th scope="col">Aset</th>  
                            <th scope="col">Harga Baku</th>
                            <th scope="col">Penyusutan</th>
                            <th scope="col">Akumulasi</th>
                            <th scope="col">Harga Akhir</th>
                        </tr>
                        </thead>
                        <tbody>
                            @php
                            $no=1;
                            $total=0;
                            $totalprogresif=0;
                            $totalakhir=0;
                            @endphp
                            @forelse ($tabel ?? '' as $data)
                            <tr>
                                <td align="center">{{ $no++ }} </td>
                                <td>
                                    @php
                                    $date=date_create($data->tanggal);
                                    @endphp
                                    {{date_format($date,"d, M - Y")}} 
                                </td>
                                <td>{{ $data->penyusutan }} Tahun</td>
                                <td>{{ $data->keterangan }}</td>
                                <td class="text-right">Rp.{{ number_format($data->jumlah) }}</td>
                                <td class="text-right">Rp.{{ number_format($data->jumlah/($data->penyusutan*12)) }}</td>
                                <?php
                                    $tgl_mulai=$data->tanggal;
                                    $tgl_selesai=date("Y-m-d");
                                     
                                    //convert
                                    $timeStart = strtotime($tgl_mulai);
                                    $timeEnd = strtotime($tgl_selesai);
                                    // Menambah bulan ini + semua bulan pada tahun sebelumnya
                                    $numBulan =(date("Y",$timeEnd)-date("Y",$timeStart))*12;
                                    // hitung selisih bulan
                                    $numBulan += date("m",$timeEnd)-date("m",$timeStart);

                                    $progresif = 0;

                                    if($timeEnd < $timeStart){
                                        $timeStart = $timeEnd;
                                    }else{

                                        if ($data->penyusutan*12 < $numBulan){
                                            $numBulan = $data->penyusutan*12;
                                        }


                                        foreach(range(1, $numBulan) as $month){
                                        $harga_penyusutan = $data->jumlah/($data->penyusutan*12);
                                        $progresif += $harga_penyusutan;
                                        }
                                    }
                                ?>
                                <td class="text-right">Rp.{{ number_format($progresif) }}</td>
                                <td class="text-right">Rp.{{ number_format($data->jumlah-$progresif) }}</td>
                            </tr>
                            @php
                                $total += $data->jumlah;
                                $totalprogresif += $progresif;
                                $totalakhir += $data->jumlah-$progresif;
                            @endphp
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center">Data Tidak Ada - Silahkan Pilih Bulan & Tahun</td>
                                </tr>
                            @endforelse
                            <tfoot>
                                <tr>
                                    <td class="text-center" colspan="4">Jumlah</td>
                                    <td class="text-right">Rp.{{ number_format($total) }}</td>
                                    <td></td>
                                    <td class="text-right">Rp.{{ number_format($totalprogresif) }}</td>
                                    <td class="text-right">Rp.{{ number_format($totalakhir) }}</td>
                                    <td></td>
                                </tr>
                            </tfoot>
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
        <link href="{{asset('js/select2/select2.min.css')}}" rel="stylesheet" />
        <script src="{{asset('js/select2/select2.min.js')}}"></script>     
@endsection