<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;


class KegiatanController extends Controller
{
    public function index()
    {
       $siswa = DB::table('tb_siswa')->get();
        $data=array(
            'siswa' =>$siswa,
        );
        return view('kegiatan.index',$data);
    }

    public function pembayaran($id)
    {
       $siswa = DB::table('tb_siswa')->where('nis',$id)->first();
       $bulan = DB::table('tb_bulan_ajaran')->get();
       $tahun = DB::table('tb_siswa')->where('nis',$id)->select('tahun_masuk')->get();
       $riwayat = DB::table('tb_pembayaran')
                     ->where('nis',$id)
                     ->where('id_jenis_pem',2)
                     ->get();
       $data=array(
            'siswa' =>$siswa,
            'bulan' =>$bulan,
            'tahun' =>$tahun,
            'riwayat' =>$riwayat,
       );
       
        return view('kegiatan.pembayaran',$data);
    }

    public function pembayaran_create(Request $request){
      $jumlah = $request->jumlah;
      $tahun = $request->tahun;
      $keterangan = $request->keterangan;
      $nis = $request->nis;

      $siswa = DB::table('tb_siswa')->where('nis',$nis)
                     ->select('tahun_masuk')->first();
      
      $insert= DB::table('tb_pembayaran')->insert([
          'id_jenis_pem' => 2,
          'nis' => $nis,
          'pembayaran_bulan' => '-',
          'pembayaran_tahun' => $tahun,
          'jumlah' =>$jumlah,
          'keterangan' => $keterangan,
          'status_pembayaran' => 1,
          'dibuat_pada' => now()
      ]);
    }
}
