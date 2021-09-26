<?php

namespace App\Imports;

use App\SPP;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SPPImport implements ToModel , WithHeadingRow
{
    
    public function model(array $row)
    {
        if($row['pembayaran_bulan'] == 1){
            $bulan = 7;
        }elseif($row['pembayaran_bulan'] == 2){
            $bulan = 8;
        }elseif($row['pembayaran_bulan'] == 3){
            $bulan = 9;
        }elseif($row['pembayaran_bulan'] == 4){
            $bulan = 10;
        }elseif($row['pembayaran_bulan'] == 5){
            $bulan = 11;
        }elseif($row['pembayaran_bulan'] == 6){
            $bulan = 12;
        }elseif($row['pembayaran_bulan'] == 7){
            $bulan = 1;
        }elseif($row['pembayaran_bulan'] == 8){
            $bulan = 2;
        }elseif($row['pembayaran_bulan'] == 9){
            $bulan = 3;
        }elseif($row['pembayaran_bulan'] == 10){
            $bulan = 4;
        }elseif($row['pembayaran_bulan'] == 11){
            $bulan = 5;
        }elseif($row['pembayaran_bulan'] == 12){
            $bulan = 6;
        }

        if( $row['keterangan'] == 'SPP'){

        $spp = new SPP([
            'id_jenis_pem' => 1,
            'nis' => $row['nis'],
            'pembayaran_bulan' => $bulan,
            'pembayaran_tahun' => $row['pembayaran_tahun'],
            'jumlah' => $row['jumlah'],
            'keterangan' => $row['keterangan'],
            'method' => $row['method'],
            'diskon' => $row['diskon'],
            'id_petugas' => 0,
            'status_pembayaran' => 1,
            'dibuat_pada' => now(),
        ]);

        }elseif( $row['keterangan'] == 'kegiatan'){
            $spp = new SPP([
            'id_jenis_pem' => 2,
            'nis' => $row['nis'],
            'pembayaran_bulan' => $bulan,
            'pembayaran_tahun' => $row['pembayaran_tahun'],
            'jumlah' => $row['jumlah'],
            'keterangan' => $row['keterangan'],
            'method' => $row['method'],
            'diskon' => $row['diskon'],
            'id_petugas' => 0,
            'status_pembayaran' => 1,
            'dibuat_pada' => now(),
        ]);

        }elseif( $row['keterangan'] == 'pangkal'){
          $spp = new SPP([
            'id_jenis_pem' => 3,
            'nis' => $row['nis'],
            'pembayaran_bulan' => $bulan,
            'pembayaran_tahun' => $row['pembayaran_tahun'],
            'jumlah' => $row['jumlah'],
            'keterangan' => $row['keterangan'],
            'method' => $row['method'],
            'diskon' => $row['diskon'],
            'id_petugas' => 0,
            'status_pembayaran' => 1,
            'dibuat_pada' => now(),
        ]);
        }else{
            echo "Error";
        }


        return $spp;
    }
}
