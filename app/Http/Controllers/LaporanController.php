<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class LaporanController extends Controller
{
    public function harian()
    {
      $harian = DB::table('tb_pembayaran')
      ->select(DB::raw('DATE(dibuat_pada) as date'), DB::raw('sum(jumlah) as total'))
      ->groupBy('date')
      ->orderBy('date','DESC')
      ->get();

      $data = array(
        'harian' => $harian
      );

        return view('laporan.harian',$data);
    }

    public function harian_detail($id)
    {
      $harian = DB::table('tb_pembayaran')
      ->join('tb_siswa','tb_siswa.nis','tb_pembayaran.nis')
      ->join('tb_jenis_pembayaran','tb_jenis_pembayaran.id_jenis_pem','tb_pembayaran.id_jenis_pem')
      ->where(DB::raw('DATE(tb_pembayaran.dibuat_pada)'),$id)
      ->select('tb_siswa.nama_siswa','tb_pembayaran.jumlah','tb_pembayaran.dibuat_pada as date','tb_jenis_pembayaran.jenis_pembayaran')
      ->get();

      $data = array(
        'harian' => $harian
      );

        return view('laporan.harian_detail',$data);
    }


    public function bulanan()
    {
      $bulanan = DB::table('tb_pembayaran')
      ->select(DB::raw('MONTH(dibuat_pada) as date'), DB::raw('sum(jumlah) as total'), 'dibuat_pada')
      ->groupBy('date')
      ->orderBy('date','DESC')
      ->get();

      $data = array(
        'bulanan' => $bulanan
      );

        return view('laporan.bulanan',$data);
    }

    public function bulanan_detail($id)
    {
      $harian = DB::table('tb_pembayaran')
      ->join('tb_siswa','tb_siswa.nis','tb_pembayaran.nis')
      ->join('tb_jenis_pembayaran','tb_jenis_pembayaran.id_jenis_pem','tb_pembayaran.id_jenis_pem')
      ->where(DB::raw('MONTH(tb_pembayaran.dibuat_pada)'),$id)
      ->select('tb_siswa.nama_siswa','tb_pembayaran.jumlah','tb_pembayaran.dibuat_pada as date','tb_jenis_pembayaran.jenis_pembayaran')
      ->get();

      $data = array(
        'harian' => $harian
      );

        return view('laporan.bulanan_detail',$data);
    }

    public function semester()
    {
      $tahunan = DB::table('tb_pembayaran')
      ->select(DB::raw('YEAR(dibuat_pada) as date'), DB::raw('sum(jumlah) as total'), 'dibuat_pada')
      ->groupBy('date')
      ->orderBy('date','DESC')
      ->get();

      $data = array(
        'tahunan' => $tahunan
      );

        return view('laporan.semester',$data);
    }


    public function semester_detail($id)
    {
      $semester =  DB::table('tb_pembayaran')
      ->select(DB::raw('MONTH(dibuat_pada) as date'), DB::raw('sum(jumlah) as total'), 'dibuat_pada')
      ->groupBy('date')
      ->where(DB::raw('YEAR(tb_pembayaran.dibuat_pada)'),$id)
      ->orderBy('date','DESC')
      ->get();

      $data = array(
        'semester' => $semester
      );

        return view('laporan.semester_detail',$data);
    }
}
