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
                <h4 class="page-title float-left">Cashflow</h4>
                <ol class="breadcrumb float-right">
                    <li class="breadcrumb-item"><a href="javascript:void(0);">Laporan</a></li>
                    <li class="breadcrumb-item active">Cashflow</li>
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
                        <button type="submit" class="btn btn-success waves-effect waves-light col-12" style="margin-bottom: 16px;">
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
                        SMP IT HAYATAN THAYYIBAH  <br/>      
                        LAPORAN CASH FLOW <br/>
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
                    <br>   
                    <br>   
                    <br>   

                    <table id="tabel" class="table table-borderless dt-responsive nowrap" style="margin: 0px 0px 0px 0px ;border-collapse: collapse; border-spacing: 0px; width: 100%;">
                        <tr>
                            <td style="padding: 2px 2px 2px 10px"><strong>Total Kas</strong></td>
                            <td style="padding: 2px 2px 2px 10px" class="text-right">Rp.{{ number_format($kas->jumlah) }} </td>
                        </tr>
                        <tr>
                            <td style="padding: 2px 2px 2px 10px" colspan="2"><strong><hr></strong></td>
                        </tr>
                        <tr>
                            <td style="padding: 2px 2px 2px 10px"><strong>PENERIMAAN</strong></td>
                            <td style="padding: 2px 2px 2px 10px" class="text-right"><strong>Jumlah</strong></td>
                        </tr>
                       @php
                       $jumlahpemasukan = 0;
                       @endphp

                       @foreach ($penerimaan ?? '' as $row)
                        <tr>
                            <td style="padding: 2px 2px 2px 10px">{{ $row->jenis_pembayaran }}</td>
                            <td style="padding: 2px 2px 2px 10px" class="text-right">Rp.{{ number_format($row->jml) }} </td>
                        </tr>

                       @php
                       $jumlahpemasukan = $jumlahpemasukan + $row->jml;
                       @endphp

                       @endforeach

                       <tr>
                            <td style="padding: 2px 2px 2px 10px"><strong>Jumlah</strong></td>
                            <td style="padding: 2px 2px 2px 10px" class="text-right"><strong>Rp.{{ number_format($jumlahpemasukan) }}</strong></td>
                       </tr>
                    </table>
                </div>
                </div>
                </div>
                <div class="col-1"> 
                </div>                        
                </div>
                <!-- Pengeluaran -->
                <div class="row">
                <div class="col-1"> 
                </div>
                <div class="col-10"> 
                <div class="card">
                <div class="card-body">
                    <table id="tabel" class="table table-borderless dt-responsive nowrap" style="margin: 0px 0px 0px 0px ;border-collapse: collapse; border-spacing: 0px; width: 100%;">
                        <tr>
                            <td style="padding: 2px 2px 2px 10px"><strong>PENGELUARAN</strong></td>
                            <td style="padding: 2px 2px 2px 10px" class="text-right"><strong>Jumlah</strong></td>
                        </tr>
                      <!--  OP 1 -->
                        <tr>
                            <td style="padding: 2px 2px 2px 10px" colspan="2"><strong>Operasional I</strong></td>
                        </tr>
                       @php
                       $jumlahop1 = 0;
                       @endphp

                       @foreach ($pengeluaran ?? '' as $row)
                       @if($row->kategori_operasional == 'Operasional I')
                        <tr>
                            <td style="padding: 2px 2px 2px 10px">{{ $row->nama_biaya }}</td>
                            <td style="padding: 2px 2px 2px 10px" class="text-right">Rp.{{ number_format($row->kredit) }} </td>
                        </tr>
                       @php
                       $jumlahop1 = $jumlahop1 + $row->kredit;
                       @endphp

                       @endif
                       @endforeach
                       <tr>
                            <td style="padding: 2px 2px 2px 10px"><strong>Jumlah</strong></td>
                            <td style="padding: 2px 2px 2px 10px" class="text-right"><strong>Rp.{{ number_format($jumlahop1) }}</strong></td>
                       </tr>
                       <tr>
                            <td style="padding: 0px 0px 0px 8px" colspan="2"><hr></td>
                       </tr>

                       <!--  OP 2 -->
                        <tr>
                            <td style="padding: 2px 2px 2px 10px" colspan="2"><strong>Operasional II</strong></td>
                        </tr>
                       @php
                       $jumlahop2 = 0;
                       @endphp

                       @foreach ($pengeluaran ?? '' as $row)
                       @if($row->kategori_operasional == 'Operasional II')
                        <tr>
                            <td style="padding: 2px 2px 2px 10px">{{ $row->nama_biaya }}</td>
                            <td style="padding: 2px 2px 2px 10px" class="text-right">Rp.{{ number_format($row->kredit) }} </td>
                        </tr>
                       @php
                       $jumlahop2 = $jumlahop2 + $row->kredit;
                       @endphp

                       @endif
                       @endforeach
                       <tr>
                            <td style="padding: 2px 2px 2px 10px"><strong>Jumlah</strong></td>
                            <td style="padding: 2px 2px 2px 10px" class="text-right"><strong>Rp.{{ number_format($jumlahop2) }}</strong></td>
                       </tr>
                       <tr>
                            <td style="padding: 0px 0px 0px 8px" colspan="2"><hr></td>
                       </tr>

                       <!--  OP 3 -->
                        <tr>
                            <td style="padding: 2px 2px 2px 10px" colspan="2"><strong>Operasional III</strong></td>
                        </tr>
                       @php
                       $jumlahop3 = 0;
                       @endphp

                       @foreach ($pengeluaran ?? '' as $row)
                       @if($row->kategori_operasional == 'Operasional III')
                        <tr>
                            <td style="padding: 2px 2px 2px 10px">{{ $row->nama_biaya }}</td>
                            <td style="padding: 2px 2px 2px 10px" class="text-right">Rp.{{ number_format($row->kredit) }} </td>
                        </tr>
                       @php
                       $jumlahop3 = $jumlahop3 + $row->kredit;
                       @endphp

                       @endif
                       @endforeach
                       <!-- Aset -->
                       @foreach ($aset ?? '' as $row)
                        <tr>
                            <td style="padding: 2px 2px 2px 10px">{{ $row->keterangan }}</td>
                            <td style="padding: 2px 2px 2px 10px" class="text-right">Rp.{{ number_format($row->jumlah) }} </td>
                        </tr>
                        @php
                       $jumlahop3 = $jumlahop3 + $row->jumlah;
                       @endphp
                       @endforeach
                       <tr>
                            <td style="padding: 2px 2px 2px 10px"><strong>Jumlah</strong></td>
                            <td style="padding: 2px 2px 2px 10px" class="text-right"><strong>Rp.{{ number_format($jumlahop3) }}</strong></td>
                       </tr>
                       <tr>
                            <td style="padding: 0px 0px 0px 8px" colspan="2"><hr></td>
                       </tr>
                        <tr>
                            <td><strong>Total</strong></td>
                            <td class="text-right">
                                @php
                                $total = $jumlahop1+$jumlahop2+$jumlahop3;
                                @endphp
                            <strong>Rp.{{ number_format($total) }}</strong>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="col-1"> 
                </div>                        
                </div>
                </div>
                </div>

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
