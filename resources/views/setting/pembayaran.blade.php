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
                <h4 class="page-title float-left">Setting Bayaran</h4>
                <ol class="breadcrumb float-right">
                    <li class="breadcrumb-item"><a href="javascript:void(0);">Setting</a></li>
                    <li class="breadcrumb-item active">Bayaran</li>
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
                        <a href="" style="margin-left:10px;" class="btn btn-default btn-success " data-toggle="modal" data-target="#importModal" title="Import File">
                            <i class="fa fa-plus-square"></i>  Tambah Data
                        </a>      
                        </div>
                    </div>


                    <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                     <thead>
                        <tr>
                            <th scope="col" width="5%">No</th>
                            <th scope="col">Tahun Ajaran</th>
                            <th scope="col" width="40%">Jenis Pembayaran</th>
                            <th scope="col" width="10%">Aksi</th> 
                        </tr>
                        </thead>
                        <tbody>
                            @php
                            $no=1;
                            @endphp
                            @foreach ($qry ?? '' as $data)
                            <tr>
                                <td align="center">{{ $no++ }} </td>
                                <td>{{ $data->tahun_ajaran }} </td>
                                <td>
                                    @php
                                      $jenis = DB::table('tb_detail_pembayaran')
                                      ->join('tb_jenis_pembayaran','tb_jenis_pembayaran.id_jenis_pem','tb_detail_pembayaran.id_jenis_pem')
                                      ->where('tahun_ajaran',$data->tahun_ajaran)
                                      ->get();
                                    @endphp
                                    
                                    <table>
                                    @foreach ($jenis ?? '' as $dt)
                                        <tr>
                                            <td width="30%">{{ $dt->jenis_pembayaran }}</td>
                                            <td width="70%" class="text-right">Rp.{{ number_format($dt->jumlah) }} </td>
                                        </tr>
                                    @endforeach
                                    </table>

                                </td>
                                <td align="center">
                                    <a class="btn btn-info btn-sm" data-toggle="modal" data-target="#edit-{{$data->tahun_ajaran}}" title="Import File" href="" ><i class="fa fa-edit"></i></a>
                                

                                 <!-- Modal Add-->
                                <div class="modal fade" id="edit-{{$data->tahun_ajaran}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="deleteModalLabel">Edit Data - {{$data->tahun_ajaran}}</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            @php
                                              $spp = DB::table('tb_detail_pembayaran')
                                              ->where('tahun_ajaran',$data->tahun_ajaran)
                                              ->where('id_jenis_pem',1)
                                              ->first();
                                            @endphp
                                            @php
                                              $kegiatan = DB::table('tb_detail_pembayaran')
                                              ->where('tahun_ajaran',$data->tahun_ajaran)
                                              ->where('id_jenis_pem',2)
                                              ->first();
                                            @endphp
                                            @php
                                              $pangkal = DB::table('tb_detail_pembayaran')
                                              ->where('tahun_ajaran',$data->tahun_ajaran)
                                              ->where('id_jenis_pem',3)
                                              ->first();
                                            @endphp
                                            <form action="{{ route('edit.pembayaran')}}" method="POST" enctype="multipart/form-data">

                                            <div class="modal-body">
                                                    @csrf
                                                    <div class="form-group">
                                                        <div class="form-group row col-12">
                                                            <label class="col-3 col-lg-2 col-form-label text-left">Tahun</label>
                                                            <div class="col-9 col-lg-10">
                                                                <input name="tahun_ajaran" value="{{$data->tahun_ajaran}}" type="text" readonly required="" class="form-control" placeholder="Nominal SPP">
                                                            </div>  
                                                        </div>
                                                        <div class="form-group row col-12">
                                                            <label class="col-3 col-lg-2 col-form-label text-left">SPP</label>
                                                            <div class="col-9 col-lg-10">
                                                                <input name="spp" value="{{$spp->jumlah}}" type="number" required="" class="form-control" placeholder="Nominal SPP">
                                                            </div>  
                                                        </div>
                                                        <div class="form-group row col-12">
                                                            <label class="col-3 col-lg-2 col-form-label text-left">Kegiatan</label>
                                                            <div class="col-9 col-lg-10">
                                                                <input name="kegiatan" value="{{$kegiatan->jumlah}}" type="number" required="" class="form-control" placeholder="Nominal Uang Kegiatan">
                                                            </div>  
                                                        </div>
                                                        <div class="form-group row col-12">
                                                            <label class="col-3 col-lg-2 col-form-label text-left">Pangkal</label>
                                                            <div class="col-9 col-lg-10">
                                                                <input name="pangkal" value="{{$pangkal->jumlah}}" type="number" required="" class="form-control" placeholder="Nominal Uang Pangkal">
                                                            </div>  
                                                        </div>
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


                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
 </div> <!-- container-fluid -->

 <!-- Modal Add-->
<div class="modal fade" id="importModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="{{ route('add.pembayaran')}}" method="POST" enctype="multipart/form-data">

            <div class="modal-body">
                    @csrf
                    <div class="form-group">
                        <div class="form-group row col-12">
                            <label class="col-3 col-lg-2 col-form-label text-left">Tahun</label>
                            <div class="col-9 col-lg-10">
                                <select name="tahun_ajaran" required="" class="form-control">
                                    @foreach ($tahun ?? '' as $dt)
                                       <option value="{{ $dt->tahun_ajaran }}">{{ $dt->tahun_ajaran }}</option>
                                    @endforeach
                                </select>
                            </div>  
                        </div>
                        <div class="form-group row col-12">
                            <label class="col-3 col-lg-2 col-form-label text-left">SPP</label>
                            <div class="col-9 col-lg-10">
                                <input name="spp" type="number" required="" class="form-control" placeholder="Nominal SPP">
                            </div>  
                        </div>
                        <div class="form-group row col-12">
                            <label class="col-3 col-lg-2 col-form-label text-left">Kegiatan</label>
                            <div class="col-9 col-lg-10">
                                <input name="kegiatan" type="number" required="" class="form-control" placeholder="Nominal Uang Kegiatan">
                            </div>  
                        </div>
                        <div class="form-group row col-12">
                            <label class="col-3 col-lg-2 col-form-label text-left">Pangkal</label>
                            <div class="col-9 col-lg-10">
                                <input name="pangkal" type="number" required="" class="form-control" placeholder="Nominal Uang Pangkal">
                            </div>  
                        </div>
                        <div class="form-group row col-12">
                            <div class="col-12">
                                <center>
                                    <small id="fileHelpId" class="form-text text-muted ">*Note : Jika Tahun Ajaran Tidak ada, maka silahkan tambah dahulu <br/> di menu <strong>Setting -> Tahun Ajar</strong></small>
                                </center>
                            </div>
                        </div>
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