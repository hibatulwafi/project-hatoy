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
                <h4 class="page-title float-left">Buku Besar</h4>
                <ol class="breadcrumb float-right">
                    <li class="breadcrumb-item"><a href="javascript:void(0);">Laporan</a></li>
                    <li class="breadcrumb-item active">Buku Besar</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- end row -->

    <div class="row">
        <div class="col-12">
            <div class="card m-b-20">
                <div class="card-body">
                
                <form method="get" action="{{url('/laporan/bukubesar/')}}">

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
                

                    <table class="table table-striped table-bordered dt-responsive nowrap" >
                     <thead>
                        <tr>
                            <th scope="col" width="5%">No</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Keterangan</th>
                            <th scope="col">Debet</th>   
                            <th scope="col">Kredit</th>     
                            <th scope="col" width="10%">Aksi</th> 
                        </tr>
                        </thead>
                        <tbody>
                            @php
                            $no=1;
                            $jumlahkredit=0;
                            $jumlahdebet=0;
                            @endphp
                            @forelse ($tanggal as $tanggal_loop)
                            <?php
                                $kredit = DB::table('tb_biaya')
                                ->where('tb_biaya.tanggal','=',$tanggal_loop->tanggal)
                                ->select('tb_biaya.tanggal as tanggal', \DB::raw('SUM(tb_biaya.jumlah) as kredit'),'tb_biaya.tipe')
                                ->first();

                                $kredit1 = DB::table('tb_aset')
                                ->where('tanggal','=',$tanggal_loop->tanggal)
                                ->select('tanggal as tanggal', \DB::raw('SUM(jumlah) as kredit1'))
                                ->first();

                                 $debet = DB::table('tb_pembayaran')
                                ->where('tb_pembayaran.tanggal_bayar','=',$tanggal_loop->tanggal)
                                ->select('tb_pembayaran.tanggal_bayar as tanggal',\DB::raw('SUM(tb_pembayaran.jumlah) as debet'),'tb_pembayaran.tipe')
                                ->first();
                            ?>
                            <tr>
                                <td rowspan="2" align="center">{{ $no++ }} </td>
                                <td rowspan="2">  
                                    @php
                                    $date=date_create($tanggal_loop->tanggal);
                                    @endphp
                                    {{date_format($date,"D, d M Y")}} 
                                </td>
                                <td>Penerimaan</td>
                                <td class="text-right">@if($debet->tipe == 'debet') Rp.{{ number_format($debet->debet) }}@else Rp.0 @endif</td>
                                <td></td>
                                <td align="center" rowspan="2">
                                     <a class="btn btn-info btn-sm" data-toggle="modal" data-target="#edit-{{$tanggal_loop->tanggal}}" title="Import File" href="" ><i class="fa fa-eye"></i></a>


                                <div class="modal fade bd-example-modal-lg" id="edit-{{$tanggal_loop->tanggal}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="deleteModalLabel">Detail -   @php
                                                    $date=date_create($tanggal_loop->tanggal);
                                                    @endphp
                                                    {{date_format($date,"D, d M Y")}} 
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>

                                            <div class="modal-body">
                                                  
                                                 <?php

                                                    if($filter_bulan == null){
                                                         $filter_bulan = date("m");
                                                    }

                                                    if ($filter_tahun == null) {
                                                         $filter_tahun = date("Y");
                                                    }

                                                  $data =  DB::table('tb_biaya')
                                                    ->join('tb_master_biaya','tb_biaya.id_master_biaya','tb_master_biaya.id_master_biaya')
                                                    ->where('tb_biaya.tanggal' ,$tanggal_loop->tanggal)
                                                    ->whereMonth('tanggal', '=', $filter_bulan)
                                                    ->whereYear('tanggal', '=', $filter_tahun)
                                                    ->get();

                                                  $data1 =  DB::table('tb_aset')
                                                    ->where('tanggal' ,$tanggal_loop->tanggal)
                                                    ->whereMonth('tanggal', '=', $filter_bulan)
                                                    ->whereYear('tanggal', '=', $filter_tahun)
                                                    ->get();

                                                  $data2 =  DB::table('tb_pembayaran')
                                                    ->join('tb_siswa','tb_siswa.nis','tb_pembayaran.nis')
                                                    ->join('tb_jenis_pembayaran','tb_jenis_pembayaran.id_jenis_pem','tb_pembayaran.id_jenis_pem')
                                                    ->where('tb_pembayaran.tanggal_bayar' ,$tanggal_loop->tanggal)
                                                    ->whereMonth('tanggal_bayar', '=', $filter_bulan)
                                                    ->whereYear('tanggal_bayar', '=', $filter_tahun)
                                                    ->get();

                                                  ?>

                                                 <h5><p class="text-left"> Kredit </p></h5>
                                                 <table id="tabel" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                        <tr>
                                                            <td width="70%" col>Keterangan</td>
                                                            <td>Jumlah</td>
                                                        </tr>
                                                       @php
                                                       $jumlah = 0;
                                                       @endphp
                                                       @foreach ($data ?? '' as $row)
                                                        <tr>
                                                            <td width="70%">{{ $row->keterangan }} </td>
                                                            <td class="text-right">Rp.{{ number_format($row->jumlah) }} </td>
                                                        </tr>
                                                       @php
                                                       $jumlah += $row->jumlah;
                                                       @endphp
                                                       @endforeach
                                                       @foreach ($data1 ?? '' as $row)
                                                        <tr>
                                                            <td width="70%">{{ $row->keterangan }} </td>
                                                            <td class="text-right">Rp.{{ number_format($row->jumlah) }} </td>
                                                        </tr>
                                                       @php
                                                       $jumlah += $row->jumlah;
                                                       @endphp
                                                       @endforeach
                                                        <tr>
                                                            <td class="text-right">Jumlah</td>
                                                            <td class="text-right">Rp.{{ number_format($jumlah) }}</td>
                                                        </tr>
                                                  </table>


                                                  <h5><p class="text-left"> Debet </p></h5>
                                                 <table id="tabel" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                        <tr>
                                                            <td width="70%">Keterangan</td>
                                                            <td>Jumlah</td>
                                                        </tr>
                                                       @php
                                                       $jumlah = 0;
                                                       @endphp
                                                       @foreach ($data2 ?? '' as $row)
                                                        <tr>
                                                            <td width="70%">Pembayaran {{ $row->jenis_pembayaran }} A/N {{ $row->nama_siswa }}</td>
                                                            <!-- <td>{{ $row->tanggal_bayar }} </td> -->
                                                            <td class="text-right">Rp.{{ number_format($row->jumlah) }} </td>
                                                        </tr>
                                                       @php
                                                       $jumlah += $row->jumlah;
                                                       @endphp
                                                       @endforeach
                                                        <tr>
                                                            <td  class="text-right">Jumlah</td>
                                                            <td class="text-right">Rp.{{ number_format($jumlah) }}</td>
                                                        </tr>
                                                  </table>
                                                
                                            </div>
                                            <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                </td>
                            </tr>
                            <tr>
                               <td>Pengeluaran</td>
                               <td></td>
                               <td class="text-right">
                                @if($kredit->tipe == 'kredit' ||  $kredit1->kredit1 != null) 
                                Rp.{{ number_format($kredit->kredit + $kredit1->kredit1) }}
                                @else Rp.0 @endif
                                </td>
                            </tr>
                            @php
                                $jumlahkredit = $jumlahkredit + $kredit->kredit  + $kredit1->kredit1;
                                $jumlahdebet = $jumlahdebet + $debet->debet;;

                            @endphp
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center">Data Tidak Ada - Silahkan Pilih Bulan & Tahun</td>
                                </tr>
                            @endforelse

                            <tr>
                               <td colspan="3" class="text-right">Total</td>
                               <td class="text-right">Rp.{{ number_format($jumlahdebet)}}</td>
                               <td class="text-right">Rp.{{ number_format($jumlahkredit)}}</td>
                               <td></td>
                            </tr>
                            
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

        <script type="text/javascript">
        $(document).ready(function() {
            $('#biaya').select2();
        });
        </script>

        <link href="{{asset('js/select2/select2.min.css')}}" rel="stylesheet" />
        <script src="{{asset('js/select2/select2.min.js')}}"></script>
       
@endsection
