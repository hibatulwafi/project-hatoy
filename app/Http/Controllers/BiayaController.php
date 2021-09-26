<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BiayaController extends Controller
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

        $tabel = DB::table('tb_biaya')
                ->join('tb_master_biaya','tb_biaya.id_master_biaya','tb_master_biaya.id_master_biaya')
                ->groupBy('tb_biaya.id_master_biaya')
                ->whereMonth('tanggal', '=', $filter_bulan)
                ->whereYear('tanggal', '=', $filter_tahun)
                ->select('tb_biaya.*','tb_master_biaya.kategori_operasional','tb_master_biaya.nama_biaya',\DB::raw('SUM(jumlah) as total'))
                ->get();

        $bulan = DB::table('tb_bulan_ajaran')
                ->get();

        $data=array(
            'select' =>DB::table('tb_master_biaya')->get(),
            'tabel' => $tabel,
            'bulan' => $bulan,
            'filter_bulan' => $request->bulan,
            'filter_tahun' => $request->tahun
        );

        return view('biaya.index',$data);
    }
    public function create(Request $request){
    
    $insert= DB::table('tb_biaya')->insert([
          'id_master_biaya' => $request->biaya,
          'tanggal' => $request->tanggal,
          'jumlah' => $request->jumlah,
          'keterangan' => $request->keterangan,
          'dibuat_pada' =>now(),
      ]);

    if($insert){

        session()->flash('success','Sukses tambah data!');
        return redirect()->route('biaya');
    }

    }

    function delete($id){

        $delete= DB::table('tb_biaya')->where('id_biaya',$id)->delete();
        if ($delete) {
            session()->flash('error','Sukses Hapus data!');
            return redirect()->route('biaya');
        }
    }

}
