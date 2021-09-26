<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;


class KegiatanController extends Controller
{
    public function index($id ='')
    {
    setlocale(LC_ALL, 'id_ID.UTF8', 'id_ID.UTF-8', 'id_ID.8859-1', 'id_ID', 'IND.UTF8', 'IND.UTF-8', 'IND.8859-1', 'IND', 'Indonesian.UTF8',
    'Indonesian.UTF-8', 'Indonesian.8859-1', 'Indonesian', 'Indonesia', 'id', 'ID', 'en_US.UTF8', 'en_US.UTF-8', 'en_US.8859-1', 'en_US',
    'American', 'ENG', 'English');

    $date = strftime("%B", time());
    $bulan = DB::table('tb_bulan_ajaran')->where('bulan',$date)->first();

    if ($id == ''){
    $siswa = DB::table('tb_siswa')->where('kelas','NOT LIKE','%Alumni%')->get();
    $filter = 'true' ;
    }else{
    $siswa = DB::table('tb_siswa')->where('kelas','LIKE','%Alumni%')->get();
    $filter = 'false' ;
    }
    $tahunSekarang =  date("Y");

    $data=array(
        'siswa' =>$siswa,
        'bulanini' => $bulan->bulan,
        'date' => $date,
        'tahunSekarang' => $tahunSekarang,
        'bulan' => $bulan,
        'filter' => $filter,
    );

        return view('kegiatan.index',$data);
    }

    public function alumni(){ 
    setlocale(LC_ALL, 'id_ID.UTF8', 'id_ID.UTF-8', 'id_ID.8859-1', 'id_ID', 'IND.UTF8', 'IND.UTF-8', 'IND.8859-1', 'IND', 'Indonesian.UTF8',
    'Indonesian.UTF-8', 'Indonesian.8859-1', 'Indonesian', 'Indonesia', 'id', 'ID', 'en_US.UTF8', 'en_US.UTF-8', 'en_US.8859-1', 'en_US',
    'American', 'ENG', 'English');

    $date = strftime("%B", time());
    $bulan = DB::table('tb_bulan_ajaran')->where('bulan',$date)->first();
    $siswa = DB::table('tb_siswa')->where('kelas','LIKE','%Alumni%')->get();
    $filter = 'false';
    $tahunSekarang =  date("Y");
        $data=array(
            'siswa' =>$siswa,
            'bulanini' => $bulan->bulan,
            'date' => $date,
            'tahunSekarang' => $tahunSekarang,
            'bulan' => $bulan,
            'filter' => $filter,
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
