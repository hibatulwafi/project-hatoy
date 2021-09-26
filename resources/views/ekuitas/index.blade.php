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
                <h4 class="page-title float-left">Laba Rugi</h4>
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
                        LAPORAN PERUBAHAN EKUITAS<br/>
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

                    <table id="tabel" class="table table-bordered dt-responsive " >
                        <tr>
                            <td style="padding: 6px 6px 6px 10px"><strong>Keterangan</strong></td>
                            <td style="padding: 6px 6px 6px 10px"><strong>Modal Saham</strong></td>
                            <td style="padding: 6px 6px 6px 10px"><strong>Laba Ditahan</strong></td>
                            <td style="padding: 6px 6px 6px 10px"><strong>Ekuitas</strong></td>
                        </tr>
                    
                        <tr>
                            <td style="padding: 6px 6px 6px 10px"><strong>Saldo Awal</strong></td>
                            <td style="padding: 6px 6px 6px 10px"></td>
                            <td style="padding: 6px 6px 6px 10px"></td>
                            <td style="padding: 6px 6px 6px 10px"></td>
                        </tr>
                    
                        <tr>
                            <td colspan="4" style="padding: 6px 6px 6px 10px">Perubahan:</td>
                        </tr>
                    
                        <tr>
                            <td style="padding: 6px 6px 6px 10px">Tambahan Setoran Modal</td>
                            <td style="padding: 6px 6px 6px 10px"></td>
                            <td style="padding: 6px 6px 6px 10px"></td>
                            <td style="padding: 6px 6px 6px 10px"></td>
                        </tr>
                    
                        <tr>
                            <td style="padding: 6px 6px 6px 10px">Laba Usaha</td>
                            <td style="padding: 6px 6px 6px 10px"></td>
                            <td style="padding: 6px 6px 6px 10px"></td>
                            <td style="padding: 6px 6px 6px 10px"></td>
                        </tr>
                    
                        <tr>
                            <td style="padding: 6px 6px 6px 10px">Saldo Akhir</td>
                            <td style="padding: 6px 6px 6px 10px"></td>
                            <td style="padding: 6px 6px 6px 10px"></td>
                            <td style="padding: 6px 6px 6px 10px"></td>
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
