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
            <div class="page-title-box" style="margin-bottom:18px;">
                <h4 class="page-title float-left">Neraca Saldo</h4>
                <ol class="breadcrumb float-right">
                    <li class="breadcrumb-item"><a href="javascript:void(0);">Laporan</a></li>
                    <li class="breadcrumb-item active">Laba Rugi</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- end row -->

    <div class="row">
        <div class="col-12">
            <div class="card m-b-20">
                <div class="card-body">
                
                <form method="get" action="{{url('/laporan/cashflow/')}}">

                <div class="row">

                    <div class="col-4">
                       
                    </div>

                    @csrf
                    <div class="col-3">
                       <select name="bulan" class="form-control">
                           <option value="" selected="" disabled="">- Filter Bulan -</option>
                           @foreach($bulan as $row)
                           <option value="{{$row->no_bulan}}">{{$row->bulan}}</option>
                           @endforeach
                       </select>
                    </div>

                    <div class="col-3">
                        <select  name="tahun" class="form-control">
                           <option value="" selected="" disabled="">- Filter Tahun -</option>
                           @php
                           $currentYear = date('Y');
                           @endphp
                           @foreach(range(2010, $currentYear) as $value)
                           <option value="{{$value}}" @if($value == $currentYear) selected="" @endif>{{$value}}</option>
                           @endforeach
                       </select>
                    </div>

                    <div class="col-2">
                        <button type="submit" class="btn btn-success waves-effect waves-light col-12" style="margin-bottom: 18px;">
                            <i class="fas fa-search"> </i>&nbsp; Filter
                        </button>
                    </div>
                </div>
                <hr>

                <div id="printableArea">

                <div class="row">
                <div class="col-1"> 
                </div>
                <div class="col-10"> 
                <div class="card">
                <div class="card-body">
                    <h4 class="text-center">    
                        NERACA SALDO<br/>
                        PERIODE 
                        @if($filter_bulan == '01')
                        JANUARI
                        @elseif($filter_bulan == '02')
                        FEBRUARI
                        @elseif($filter_bulan == '03')
                        MARET
                        @elseif($filter_bulan == '04')
                        APRIL
                        @elseif($filter_bulan == '05')
                        MEI
                        @elseif($filter_bulan == '06')
                        JUNI
                        @elseif($filter_bulan == '07')
                        JULI
                        @elseif($filter_bulan == '08')
                        AGUSTUS
                        @elseif($filter_bulan == '09')
                        SEPTEMBER
                        @elseif($filter_bulan == '10')
                        OKTOBER
                        @elseif($filter_bulan == '11')
                        NOVEMBER
                        @elseif($filter_bulan == '12')
                        DESEMBER
                        @endif
                       {{$filter_tahun}}  
                    </h4>  

                    <table id="tabel" class="table table-bordered dt-responsive" style="margin-top:50px;" >
                        <tr>
                            <td style="padding: 8px 8px 8px 10px"><strong>Kas ditangan</strong></td>
                            <td class="text-right" style="padding: 8px 8px 8px 10px">Rp. {{number_format(12000000)}}</td>
                            <td style="padding: 8px 8px 8px 10px"></td>
                        </tr>
                    
                        <tr>
                            <td style="padding: 8px 8px 8px 10px"><strong>Piutang Uang SPP</strong></td>
                            <td class="text-right" style="padding: 8px 8px 8px 10px">Rp.{{number_format($tunggakansiswa)}}</td>
                            <td style="padding: 8px 8px 8px 10px"></td>
                        </tr>
                        <tr>
                            <td style="padding: 8px 8px 8px 10px"><strong>Piutang Uang Kegiatan</strong></td>
                            <td class="text-right" style="padding: 8px 8px 8px 10px">Rp.{{number_format($tunggakansiswa)}}</td>
                            <td style="padding: 8px 8px 8px 10px"></td>
                        </tr>
                    
                        <tr>
                            <td style="padding: 8px 8px 8px 10px"><strong>Piutang Uang Pangkal</strong></td>
                            <td class="text-right" style="padding: 8px 8px 8px 10px">Rp.{{number_format($tunggakansiswa)}}</td>
                            <td style="padding: 8px 8px 8px 10px"></td>
                        </tr>
                    
                        <tr>
                            <td style="padding: 8px 8px 8px 10px"><strong>Piutang Alumni</strong></td>
                            <td class="text-right" style="padding: 8px 8px 8px 10px">Rp.{{number_format($tunggakanalumni)}}</td>
                            <td style="padding: 8px 8px 8px 10px"></td>
                        </tr>
                    
                        <tr>
                            <td style="padding: 8px 8px 8px 10px"><strong>RKB</strong></td>
                            <td style="padding: 8px 8px 8px 10px"><!-- Harga Akhir Aset --></td>
                            <td style="padding: 8px 8px 8px 10px"></td>
                        </tr>
                        @php
                            $totalakhir  = 0;
                        @endphp
                        @foreach ($asset ?? '' as $r_asset)
                        <?php
                            $tgl_mulai=$r_asset->tanggal;
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
                                if ($r_asset->penyusutan*12 < $numBulan){
                                    $numBulan = $r_asset->penyusutan*12;
                                }
                                foreach(range(1, $numBulan) as $month){
                                $harga_penyusutan = $r_asset->jumlah/($r_asset->penyusutan*12);
                                $progresif += $harga_penyusutan;
                                }
                            }

                        ?>


                        <tr>                              
                            <td style="padding: 8px 8px 8px 10px">&nbsp;&nbsp;{{ $r_asset->keterangan }}</td>
                            <td class="text-right" style="padding: 8px 8px 8px 10px">Rp.{{ number_format($r_asset->jumlah-$progresif) }}</td>
                            <td style="padding: 8px 8px 8px 10px"></td>
                        </tr>
                        <?php
                        $totalakhir += $r_asset->jumlah-$progresif;
                        ?>
                        @endforeach
                     
                     
                        <tr>
                            <td style="padding: 8px 8px 8px 10px"><strong>Laba Ditahan</strong></td>
                            <td style="padding: 8px 8px 8px 10px"></td>
                            <td style="padding: 8px 8px 8px 10px"><!-- Saldo Bulan Berikutnya --> ??? </td>
                        </tr>
                        <!-- 2015 Juli = Pembukaan Sekolah -->

                        <!-- Perhitungan Laba -->
                        <!-- Pemasukan -->
                           @php
                           $jumlahpemasukan = 0;
                           @endphp

                           @foreach ($penerimaan ?? '' as $row)
                           @php
                           $jumlahpemasukan = $jumlahpemasukan + $row->jml;
                           @endphp

                           @endforeach

                        <!-- Pengeluaran -->
                            @php
                           $totalpenyusutan = 0;
                           @endphp

                            @foreach($asset as $aset)
                                @php
                                $tgl_selesai = date('Y-m-d', strtotime('+'.$aset->penyusutan.' year', strtotime( $aset->tanggal )));
                                $tgl_sekarang=date("Y-m-d");
                                @endphp
                                @if ($tgl_sekarang < $tgl_selesai)
                               
                                        @php
                                        $penyusutan = $aset->jumlah/($aset->penyusutan*12);
                                        $totalpenyusutan += $penyusutan;
                                        @endphp
                                @endif
                            @endforeach

                        <tr>
                            <td style="padding: 8px 8px 8px 10px"><strong>Laba Tahun Berjalan</strong></td>
                            <td style="padding: 8px 8px 8px 10px"></td>
                            <td class="text-right" style="padding: 8px 8px 8px 10px"><!-- Laba Rugi -->Rp. {{ number_format($jumlahpemasukan - $totalpenyusutan)}}</td>
                        </tr>  
                        <tr>                              
                            <td class="text-success" style="padding: 8px 8px 8px 10px"><strong>Jumlah</strong></td>
                            <td class="text-right text-success" style="padding: 8px 8px 8px 10px"> <strong>Rp.{{ number_format($totalakhir+$tunggakansiswa+$tunggakanalumni) }}</strong></td>
                            <td class="text-right text-success" style="padding: 8px 8px 8px 10px">Rp. {{ number_format($jumlahpemasukan - $totalpenyusutan)}}</td>
                        </tr>

                    
                    </table>
                </div>
                </div>
                </div>
                <div class="col-1"> 
                </div>                        
                </div>
                <!-- Pengeluaran -->
                </div> <!-- Close print area -->
                <center>    
                    <button class="btn btn-success" onclick="printDiv('printableArea')"> <i class="fa fa-print"></i> Cetak </button>
                </center>
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

        <script type="text/javascript">
        $(document).ready(function() {
            $('#biaya').select2();
        });
        </script>

        <link href="{{asset('js/select2/select2.min.css')}}" rel="stylesheet" />
        <script src="{{asset('js/select2/select2.min.js')}}"></script>

        <script type="text/javascript">
function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
        </script>       
@endsection
