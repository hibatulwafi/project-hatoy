<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class AsetController extends Controller
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

        $tabel = DB::table('tb_aset')
                /*->whereMonth('tanggal', '=', $filter_bulan)
                ->whereYear('tanggal', '=', $filter_tahun)*/
                ->get();

        $bulan = DB::table('tb_bulan_ajaran')
                ->get();
                
        $data=array(
            'tabel' => $tabel,
            'bulan' => $bulan,
            'filter_bulan' => $request->bulan,
            'filter_tahun' => $request->tahun
        );

        return view('aset.index',$data);
    }

    public function laporan(){
       
        $tabel = DB::table('tb_aset')->get();
                
        $data=array(
            'tabel' => $tabel,
        );

        return view('laporan.aset',$data);
    }

    public function create(Request $request){
    
    $insert= DB::table('tb_aset')->insert([
          'tanggal' => $request->tanggal,
          'jumlah' => $request->jumlah,
          'penyusutan' => $request->penyusutan,
          'keterangan' => $request->keterangan,
          'dibuat_pada' =>now(),
      ]);

    if($insert){

        session()->flash('success','Sukses tambah data!');
        return redirect()->route('aset');
    }

    }

    function delete($id){

        $delete= DB::table('tb_aset')->where('id_aset',$id)->delete();
        if ($delete) {
            session()->flash('error','Sukses Hapus data!');
            return redirect()->route('aset');
        }
    }

}
