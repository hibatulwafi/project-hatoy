@extends('layouts.master')

@section('css')
        <link href="{{ URL::asset('assets/plugins/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ URL::asset('assets/plugins/datatables/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ URL::asset('assets/plugins/datatables/responsive.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />

        <link href="{{ URL::asset('assets/plugins/ion-rangeslider/ion.rangeSlider.skinModern.css')}}" rel="stylesheet" type="text/css"/>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <h4 class="page-title float-left">Pembayaran SPP Alumni</h4>
                <ol class="breadcrumb float-right">
                    <li class="breadcrumb-item"><a href="javascript:void(0);">Pembayaran</a></li>
                    <li class="breadcrumb-item active">SPP</li>
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
                    <a href="{{route('spp.filter',['Alumni'])}}" class="btn btn-info text-white">Data Alumni</a>
                    @elseif($filter == 'false')
                    <a href="{{route('spp')}}" class="btn btn-info text-white">Data Siswa</a>
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
                <th scope="col">Gender</th>  
                <th scope="col">No Telp</th>
                <th scope="col">Sisa /Status</th>
                <th scope="col" width="10%">Aksi</th>   
            </tr>
         </thead>
        
        <tbody>
            <?php
            $no=1;
            $totaltunggakan=0;
            foreach($siswa as $data){
            ?>
            <tr>

            <?php
            echo "<td>".$no++."</td>";
            echo "<td>".$data->nis."</td>";
            echo "<td>".$data->nama_siswa."</td>";
            echo "<td>".$data->jk."</td>";
            echo "<td>".$data->no_telepon."</td>";

            
            $biayaspp = DB::table('tb_detail_pembayaran')->where('tahun_ajaran',$data->tahun_masuk)->first();
            $id=$data->nis;
            $totalbayar = DB::table('tb_pembayaran')->where('nis','=',$id)->sum('jumlah');
            $diskon = DB::table('tb_pembayaran')->where('nis','=',$id)->sum('diskon');

            $totalSPP = $biayaspp->jumlah*36;
            $sisa = $totalSPP - $totalbayar -$diskon;


            echo "<td class='text-right'> Rp.".number_format($sisa)."</td>";

            $totaltunggakan+=$sisa;
            ?>
             <td align="center">
                <a class="btn btn-info btn-sm" href="{{url('/spp/pembayaran/'.$id)}}" ><i class="fa fa-plus"></i></a>
            </td>
            </tr> 
            <?php } ?>
        </tbody>
        <tfoot> 
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>Jumlah</td>
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

<!-- Modal Import File-->
<div class="modal fade" id="importModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Import Data SPP</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
         <form action="{{ route('spp.import')}}" method="POST" enctype="multipart/form-data">
            <div class="modal-body">
                    @csrf
                    <div class="form-group">
                      <label for="import_produk">Import File</label>
                      <input type="file" class="form-control-file" name="import_spp" id="import_spp" placeholder="" aria-describedby="fileHelpId" required>
                      <small id="fileHelpId" class="form-text text-muted">Tipe file : xls, xlsx</small>
                      <small id="fileHelpId" class="form-text text-muted">Pastikan file upload sesuai format. <br> <a href="{{ url('template/pembayaranspp_template.xlsx') }}">Download contoh format file xlsx <i class="fas fa-download ml-1   "></i></a></small>
                    </div>
                
            </div>
            <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
        </div>
    </div>
</div>
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