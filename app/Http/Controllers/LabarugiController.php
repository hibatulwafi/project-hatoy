<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LabarugiController extends Controller
{
   public function index(Request $request){

        $filter_bulan = $request->bulan;
        $filter_tahun = $request->tahun;

        if($request->bulan == null){
             $filter_bulan = date("m");
        }

        if ($request->tahun == null) {
             $filter_tahun = date("Y");
        }

        $bulan = DB::table('tb_bulan_ajaran')
                ->get();

        $pengeluaran = DB::table('tb_biaya')
            ->join('tb_master_biaya','tb_biaya.id_master_biaya','tb_master_biaya.id_master_biaya')
            ->groupBy('tb_master_biaya.nama_biaya')
            ->whereMonth('tb_biaya.tanggal', '=', $filter_bulan)
            ->whereYear('tb_biaya.tanggal', '=', $filter_tahun)
            ->select('tb_biaya.*','tb_master_biaya.kategori_operasional','tb_master_biaya.nama_biaya',\DB::raw('SUM(tb_biaya.jumlah) as kredit'))
            ->get();

        $penerimaan = DB::table('tb_pembayaran')
            ->join('tb_jenis_pembayaran','tb_jenis_pembayaran.id_jenis_pem','tb_pembayaran.id_jenis_pem')
            ->groupBy('tb_jenis_pembayaran.jenis_pembayaran')
            ->whereMonth('tb_pembayaran.tanggal_bayar', '=', $filter_bulan)
            ->whereYear('tb_pembayaran.tanggal_bayar', '=', $filter_tahun)
            ->select('tb_pembayaran.*','tb_jenis_pembayaran.jenis_pembayaran',\DB::raw('SUM(tb_pembayaran.jumlah) as jml'))
            ->get();

        $kas = DB::table('tb_master_kas')->first();
        $call_asset = DB::table('tb_aset')->get();

        $data=array(
            'pengeluaran' => $pengeluaran,
            'penerimaan' => $penerimaan,
            'bulan' => $bulan,
            'filter_bulan' => $filter_bulan,
            'filter_tahun' => $filter_tahun,
            'kas' => $kas,
            'asset' => $call_asset
        );
        return view('labarugi.index',$data);
    }
}
