<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class PangkalController extends Controller
{
    public function index()
    {
       $siswa = DB::table('tb_siswa')->where('kelas','NOT LIKE','%Alumni%')->get();
       $masuk = DB::table('tb_pembayaran')
                     ->where('id_jenis_pem',3)
                     ->sum('jumlah');
        $data=array(
            'siswa' =>$siswa,
            'jumlah_siswa'=>count($siswa),
            'masuk' => $masuk,
            'filter' =>'true'
        );
        return view('pangkal.index',$data);
    }

    public function alumni()
    {
       $siswa = DB::table('tb_siswa')->where('kelas','LIKE','%Alumni%')->get();
       $masuk = DB::table('tb_pembayaran')
                     ->where('id_jenis_pem',3)
                     ->sum('jumlah');
        $data=array(
            'siswa' =>$siswa,
            'jumlah_siswa'=>count($siswa),
            'masuk' => $masuk,
            'filter' =>'false',
        );
        return view('pangkal.index',$data);
    }

    public function pembayaran($id)
    {
       $siswa = DB::table('tb_siswa')->where('nis',$id)->first();
       $bulan = DB::table('tb_bulan_ajaran')->get();
       $tahun = DB::table('tb_tahun_ajaran')->get();
       
       $cek = DB::table('tb_siswa')
                  ->join('tb_detail_pembayaran','tb_detail_pembayaran.tahun_ajaran','tb_siswa.tahun_masuk')
                  ->where('tb_detail_pembayaran.id_jenis_pem',3)
                  ->where('tb_siswa.nis',$id)
                  ->select('tb_detail_pembayaran.jumlah','tb_siswa.tahun_masuk')
                  ->first();

       $pembayaran = DB::table('tb_pembayaran')
                     ->where('nis',$id)
                     ->where('id_jenis_pem',3)
                     ->where('pembayaran_tahun',$cek->tahun_masuk)
                     ->sum('jumlah');
       
       $riwayat = DB::table('tb_pembayaran')
                     ->where('nis',$id)
                     ->where('id_jenis_pem',3)
                     ->get();

       if($pembayaran == null) {
         $pembayaran = 0;
       } else {
         $pembayaran = $pembayaran;
       }
       
       $data=array(
            'siswa' =>$siswa,
            'bulan' =>$bulan,
            'tahun' =>$tahun,
            'riwayat' =>$riwayat,
            'tagihan' => $cek->jumlah - $pembayaran,
       );
       
        return view('pangkal.pembayaran',$data);
    }

    public function pembayaran_create(Request $request){
      $jumlah = $request->jumlah;
      $keterangan = $request->keterangan;
      $nis = $request->nis;

      $siswa = DB::table('tb_siswa')->where('nis',$nis)
                     ->select('tahun_masuk')->first();
      
      $insert= DB::table('tb_pembayaran')->insert([
          'id_jenis_pem' => 3,
          'nis' => $nis,
          'pembayaran_bulan' => '-',
          'pembayaran_tahun' => $siswa->tahun_masuk,
          'jumlah' =>$jumlah,
          'keterangan' => $keterangan,
          'status_pembayaran' => 1,
          'dibuat_pada' => now()
      ]);

            return redirect()->back();

    }
    
}
