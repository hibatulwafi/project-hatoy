<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NeracaController extends Controller{

    public function index(Request $request){

    setlocale(LC_ALL, 'id_ID.UTF8', 'id_ID.UTF-8', 'id_ID.8859-1', 'id_ID', 'IND.UTF8', 'IND.UTF-8', 'IND.8859-1', 'IND', 'Indonesian.UTF8',
    'Indonesian.UTF-8', 'Indonesian.8859-1', 'Indonesian', 'Indonesia', 'id', 'ID', 'en_US.UTF8', 'en_US.UTF-8', 'en_US.8859-1', 'en_US',
    'American', 'ENG', 'English');

    $date = strftime("%B", time());
    $bulan = DB::table('tb_bulan_ajaran')->where('bulan',$date)->first();
    $siswa = DB::table('tb_siswa')->where('kelas','NOT LIKE','%Alumni%')->get();
    $alumni = DB::table('tb_siswa')->where('kelas','LIKE','%Alumni%')->get();

    $filter_bulan = $request->bulan;
    $filter_tahun = $request->tahun;

    if($request->bulan == null){
         $filter_bulan = date("m");
    }

    if ($request->tahun == null) {
         $filter_tahun = date("Y");
    }

    $tahunSekarang =  $filter_tahun;


            $totaltunggakan=0;

            foreach($siswa as $data){

            $biayaspp = DB::table('tb_detail_pembayaran')->where('tahun_ajaran',$data->tahun_masuk)->first();
            $id=$data->nis;
            $bulansekarang = DB::table('tb_bulan_ajaran')->where('no_bulan',$filter_bulan)->first();

            $tunggakan = 0;
            $tahunmasuk = $data->tahun_masuk;

            $selisih = $tahunSekarang - $data->tahun_masuk;

            if($selisih >= 4){
               $tahunSekarang = $data->tahun_masuk+ 3;
            }             

                foreach(range($data->tahun_masuk, $tahunSekarang) as $year){

                if($tahunSekarang == $year){
                foreach (range(1, $bulansekarang->posisi) as $month) {

                   $qrytunggakan = DB::table('tb_pembayaran')
                   ->where('nis', $id)
                   ->where('id_jenis_pem',1)
                   ->where('pembayaran_bulan',$month)
                   ->where('pembayaran_tahun',$year)
                   ->select(DB::raw('SUM(jumlah) as jumlah'),DB::raw('SUM(diskon) as diskon'))
                   ->get();
                        foreach( $qrytunggakan as $data){   
                                $tunggakan1 = $biayaspp->jumlah - $data->jumlah - $data->diskon; 
                                $tunggakan = $tunggakan+$tunggakan1;
                        }
                    }
                }else{
                foreach (range(1, 12) as $month) {
                   $qrytunggakan = DB::table('tb_pembayaran')
                   ->where('nis', $id)
                   ->where('id_jenis_pem',1)
                   ->where('pembayaran_bulan',$month)
                   ->where('pembayaran_tahun',$year)
                   ->select(DB::raw('SUM(jumlah) as jumlah'),DB::raw('SUM(diskon) as diskon'))
                   ->get();
                            foreach( $qrytunggakan as $data){   
                                $tunggakan1 = $biayaspp->jumlah - $data->jumlah - $data->diskon; 
                                $tunggakan = $tunggakan+$tunggakan1;
                            }
                        }
                    }
                }
                   

            $totaltunggakan += $tunggakan;
            }

        $total = 0;
        
        foreach($alumni as $row){
            //Mencari Data Tahun Masuk Siswa
            $searchSPP = DB::table('tb_detail_pembayaran')->where('id_jenis_pem',1)->where('tahun_ajaran',$row->tahun_masuk)->first();
            $searchKegiatan = DB::table('tb_detail_pembayaran')->where('id_jenis_pem',2)->where('tahun_ajaran',$row->tahun_masuk)->first();
            $searchPangkal = DB::table('tb_detail_pembayaran')->where('id_jenis_pem',3)->where('tahun_ajaran',$row->tahun_masuk)->first();
            //Biaya siswa
            $biayaspp =  $searchSPP->jumlah;
            $biayakegiatan =  $searchKegiatan->jumlah;
            $biayapangkal =  $searchPangkal->jumlah;
            // Tunggakan Siswa
            $searchPembayaran = DB::table('tb_pembayaran')->where('nis',$row->nis)
            ->select(DB::raw('SUM(jumlah) as jumlah'),DB::raw('SUM(diskon) as diskon'))->first();
            $tunggakansiswa =  ($biayaspp*36) + ($biayakegiatan*3) + ($biayapangkal) - $searchPembayaran->jumlah - $searchPembayaran->diskon;

            $total += $tunggakansiswa;
        }  

        //Aset
        $asset = DB::table('tb_aset')->get();

        //Laba Rugi
        $pengeluaran = DB::table('tb_biaya')
            ->join('tb_master_biaya','tb_biaya.id_master_biaya','tb_master_biaya.id_master_biaya')
            ->groupBy('tb_master_biaya.nama_biaya')
            ->whereMonth('tb_biaya.tanggal', '=', $filter_bulan)
            ->whereYear('tb_biaya.tanggal', '=', $filter_tahun)
            ->select('tb_biaya.*','tb_master_biaya.kategori_operasional','tb_master_biaya.nama_biaya',\DB::raw('SUM(tb_biaya.jumlah) as kredit'))
            ->get();

        $penerimaan = DB::table('tb_pembayaran')
            ->join('tb_jenis_pembayaran','tb_jenis_pembayaran.id_jenis_pem','tb_pembayaran.id_jenis_pem')
            ->groupBy('tb_jenis_pembayaran.jenis_pembayaran')
            ->whereMonth('tb_pembayaran.tanggal_bayar', '=', $filter_bulan)
            ->whereYear('tb_pembayaran.tanggal_bayar', '=', $filter_tahun)
            ->select('tb_pembayaran.*','tb_jenis_pembayaran.jenis_pembayaran',\DB::raw('SUM(tb_pembayaran.jumlah) as jml'))
            ->get();

        $data=array(
            'tunggakanalumni' => $total,
            'tunggakansiswa' => $totaltunggakan,
            'filter_bulan' => $filter_bulan,
            'filter_tahun' => $filter_tahun,
            'bulan' =>  DB::table('tb_bulan_ajaran')->get(),
            'asset' => $asset,
            'pengeluaran' => $pengeluaran ,
            'penerimaan' => $penerimaan ,
        );

        return view('neraca.index',$data);
    }
}
