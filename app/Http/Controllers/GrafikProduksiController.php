<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GrafikProduksiController extends Controller
{
    public function index()
    {
        $aren = 1;
        $gra = DB::table ('tb_produksipr')
        ->join('tb_komoditas','tb_produksipr.id_komoditas','tb_komoditas.id_komoditas')
        ->select('tb_produksipr.jml_produksi','tb_produksipr.tahun_pr','tb_komoditas.nama_komoditas')
        ->where('tb_produksipr.id_komoditas',$aren)
        ->get();

        $cengkeh = 2;
        $ce = DB::table ('tb_produksipr')
        ->join('tb_komoditas','tb_produksipr.id_komoditas','tb_komoditas.id_komoditas')
        ->select('tb_produksipr.jml_produksi','tb_produksipr.tahun_pr','tb_komoditas.nama_komoditas')
        ->where('tb_produksipr.id_komoditas',$cengkeh)
        ->get();

        $kelapadalam = 4;
        $ke = DB::table ('tb_produksipr')
        ->join('tb_komoditas','tb_produksipr.id_komoditas','tb_komoditas.id_komoditas')
        ->select('tb_produksipr.jml_produksi','tb_produksipr.tahun_pr','tb_komoditas.nama_komoditas')
        ->where('tb_produksipr.id_komoditas',$kelapadalam)
        ->get();

        $sakura = 25;
        $sa = DB::table ('tb_produksipr')
        ->join('tb_komoditas','tb_produksipr.id_komoditas','tb_komoditas.id_komoditas')
        ->select('tb_produksipr.jml_produksi','tb_produksipr.tahun_pr','tb_komoditas.nama_komoditas')
        ->where('tb_produksipr.id_komoditas',$sakura)
        ->get();

        $data=array(
            'gra' => $gra,
            'ce' => $ce,
            'ke' => $ke,
            'sa' => $sa
        );

        return view('Grafik.grafikproduksi',$data);        
    }
}
