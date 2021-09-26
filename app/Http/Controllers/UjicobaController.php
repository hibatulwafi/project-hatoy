<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UjicobaController extends Controller
{
    public function index(){
        $aset = 'Gedung Madinah';
        $harga = 50000000;
        $penyusutan = 5*12;
        $tahun_beli = 2020;
        $tahunSekarang =  date("Y-m-d");



        echo $aset;
        echo '<br/>';
        echo number_format($harga);
        echo '<br/>';
        echo $penyusutan/12 ." Tahun";
        echo '<br/>';
        echo $tahunSekarang;

        if($tahunSekarang < $tahun_beli){
            $tahunSekarang = $tahun_beli;
        }

        echo '<br/>';
        echo "Penyusutan";
        echo '<br/>';

        $progresif = 0;

        foreach(range(1, $penyusutan) as $month){
            $harga_penyusutan = $harga / $penyusutan;
            $progresif += $harga_penyusutan;
            echo "Bulan ke ".$month++." : ".number_format($harga-$progresif)." | Menyusut :".number_format($progresif);
            echo '<br/>';
        }
    }

    public function labarugi(){
        $tgl_mulai="2015-02-03";
        $tahun = 5;
        $tgl_selesai=date("Y-m-d");
        
        echo date('Y-m-d', strtotime('+'.$tahun.' year', strtotime( $tgl_mulai )));

        }

}
