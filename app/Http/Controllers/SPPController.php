<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class SPPController extends Controller
{
    public function index()
    {
       $siswa = DB::table('tb_siswa')->get();
        $data=array(
            'siswa' =>$siswa,
        );
        return view('spp.index',$data);
    }

    public function pembayaran($id)
    {
       $siswa = DB::table('tb_siswa')->where('nis',$id)->first();
       $bulan = DB::table('tb_bulan_ajaran')->get();
       $tahun = DB::table('tb_tahun_ajaran')->get();

       $riwayat = DB::table('tb_pembayaran')
       ->join('tb_siswa','tb_siswa.nis','tb_pembayaran.nis')
       ->join('tb_jenis_pembayaran','tb_jenis_pembayaran.id_jenis_pem','tb_pembayaran.id_jenis_pem')
       ->leftJoin('tb_bulan_ajaran','tb_bulan_ajaran.id_ajaran','tb_pembayaran.pembayaran_bulan')
       ->where('tb_pembayaran.nis',$id)
       ->where('tb_pembayaran.id_jenis_pem',1)
       ->select('tb_pembayaran.*','tb_bulan_ajaran.bulan')
       ->get();

       $data=array(
            'siswa' =>$siswa,
            'bulan' =>$bulan,
            'tahun' =>$tahun,
            'riwayat' => $riwayat
       );
       
        return view('spp.pembayaran',$data);
    }

     public function pembayaran_create(Request $request){
      $jumlah = $request->jumlah;
      $tahun = $request->tahun;
      $bulan = $request->bulan;
      $keterangan = $request->keterangan;
      $nis = $request->nis;

      $siswa = DB::table('tb_siswa')->where('nis',$nis)
                     ->select('tahun_masuk')->first();
      
      $insert= DB::table('tb_pembayaran')->insert([
          'id_jenis_pem' => 1,
          'nis' => $nis,
          'pembayaran_bulan' => $bulan,
          'pembayaran_tahun' => $tahun,
          'jumlah' =>$jumlah,
          'keterangan' => $keterangan,
          'status_pembayaran' => 1,
          'dibuat_pada' => now()
      ]);
    }
}
