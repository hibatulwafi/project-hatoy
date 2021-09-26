<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BukubesarController extends Controller
{
    public function index(Request $request)
    {
        $filter_bulan = $request->bulan;
        $filter_tahun = $request->tahun;

        if($request->bulan == null){
             $filter_bulan = date("m");
        }

        if ($request->tahun == null) {
             $filter_tahun = date("Y");
        }

/*SELECT tb_biaya.tanggal,  SUM(tb_biaya.jumlah) AS jumlah, tb_biaya.tipe  FROM tb_biaya
GROUP BY tb_biaya.tanggal
UNION
SELECT tb_pembayaran.tanggal_bayar as tanggal,  SUM(tb_pembayaran.jumlah) AS jumlah, tb_pembayaran.tipe  FROM tb_pembayaran
GROUP BY tb_pembayaran.tanggal_bayar
*/
/*
        $kredit = DB::table('tb_biaya')
        ->groupBy('tb_biaya.tanggal')
        ->select('tb_biaya.tanggal as tanggal', \DB::raw('SUM(tb_biaya.jumlah) as jumlah'),'tb_biaya.tipe');
        $debet = DB::table('tb_pembayaran')
        ->groupBy('tb_pembayaran.tanggal_bayar')
        ->select('tb_pembayaran.tanggal_bayar as tanggal',\DB::raw('SUM(tb_pembayaran.jumlah) as jumlah'),'tb_pembayaran.tipe')->union($kredit)
        ->orderBy('tanggal')
        ->get();*/

        $tabel = DB::table('tb_biaya')
                ->join('tb_master_biaya','tb_biaya.id_master_biaya','tb_master_biaya.id_master_biaya')
                ->leftJoin('tb_pembayaran','tb_pembayaran.tanggal_bayar','tb_biaya.tanggal')
                ->leftJoin('tb_aset','tb_biaya.tanggal','tb_aset.tanggal')
                ->groupBy('tb_biaya.tanggal')
                ->whereMonth('tb_biaya.tanggal', '=', $filter_bulan)
                ->whereYear('tb_biaya.tanggal', '=', $filter_tahun)
                ->select('tb_biaya.*','tb_master_biaya.kategori_operasional','tb_master_biaya.nama_biaya','tb_pembayaran.jumlah as jumlah_debet',
                    \DB::raw('SUM(tb_biaya.jumlah) as kredit'),\DB::raw('SUM(tb_pembayaran.jumlah) as debet'))
                ->get();


        $kredit = DB::table('tb_biaya')
        ->groupBy('tb_biaya.tanggal')
        ->select('tb_biaya.tanggal as tanggal', \DB::raw('SUM(tb_biaya.jumlah) as jumlah'),'tb_biaya.tipe');
        
        $debet = DB::table('tb_pembayaran')
        ->groupBy('tb_pembayaran.tanggal_bayar')
        ->select('tb_pembayaran.tanggal_bayar as tanggal',\DB::raw('SUM(tb_pembayaran.jumlah) as jumlah'),'tb_pembayaran.tipe')->union($kredit)
        ->orderBy('tanggal')
        ->get();


        $tanggal1 = DB::table('tb_biaya')
        ->groupBy('tb_biaya.tanggal')
        ->whereMonth('tb_biaya.tanggal', '=', $filter_bulan)
        ->whereYear('tb_biaya.tanggal', '=', $filter_tahun)
        ->select('tb_biaya.tanggal as tanggal');
        $tanggal2 = DB::table('tb_aset')
        ->groupBy('tb_aset.tanggal')
        ->whereMonth('tb_aset.tanggal', '=', $filter_bulan)
        ->whereYear('tb_aset.tanggal', '=', $filter_tahun)
        ->select('tb_aset.tanggal as tanggal');
        $tanggal = DB::table('tb_pembayaran')
        ->groupBy('tb_pembayaran.tanggal_bayar')
        ->whereMonth('tb_pembayaran.tanggal_bayar', '=', $filter_bulan)
        ->whereYear('tb_pembayaran.tanggal_bayar', '=', $filter_tahun)
        ->select('tb_pembayaran.tanggal_bayar as tanggal')->union($tanggal1)->union($tanggal2)
        ->distinct('tanggal') 
        ->orderBy('tanggal')
        ->get();
     
      /*  $items = array();
        foreach ($tanggal as $loop){
            foreach ($debet as $data){
                if($loop->tanggal == $data->tanggal){

                }
            }
        }*/


        $bulan = DB::table('tb_bulan_ajaran')
                ->get();

        $data=array(
            'select' =>DB::table('tb_master_biaya')->get(),
            'tabel' => $debet,
            'tanggal' => $tanggal,
            'bulan' => $bulan,
            'filter_bulan' => $request->bulan,
            'filter_tahun' => $request->tahun
        );

        return view('bukubesar.index',$data);
    }
}
