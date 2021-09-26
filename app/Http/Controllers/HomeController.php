<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $bulan_ini = date("m");
        if($bulan_ini<=6){
            $date_awal = date("Y").'-01-01';
            $date_akhir = date("Y").'-06-30';
            $date= date('Y')-1;
            $semester = 'Genap / '.$date.'-'.date("Y");
        }else{
            $date_awal = date("Y").'-07-01';
            $date_akhir = date("Y").'-12-31';
            $date= date('Y')+1;
            $semester = 'Ganjil / '.date("Y").'-'.$date;
        }

        $harian = DB::table('tb_pembayaran')->where(DB::raw('DATE(tb_pembayaran.tanggal_bayar)'),date("Y-m-d"))->sum('jumlah');
        $bulanan = DB::table('tb_pembayaran')->where(DB::raw('MONTH(tb_pembayaran.tanggal_bayar)'),date("m"))->sum('jumlah');
        $tahunan = DB::table('tb_pembayaran')
                    ->whereBetween('tanggal_bayar', [$date_awal, $date_akhir])
                    ->sum('jumlah');

        $pengeluaranharian =  DB::table('tb_biaya')->where(DB::raw('DATE(tanggal)'),date("Y-m-d"))->sum('jumlah');
        $pengeluaranbulanan = DB::table('tb_biaya')->where(DB::raw('MONTH(tanggal)'),date("m"))->sum('jumlah');
        $pengeluarantahunan = DB::table('tb_biaya')->where(DB::raw('YEAR(tanggal)'),date("Y"))->sum('jumlah');
                
        $kas = DB::table('tb_riwayat_kas')->get()->last()->jumlah;

        // Menghitung Tunggakan SPP
        $tahunSekarang =  date("Y");
        $totaltunggakan = 0;

        $siswa = DB::table('tb_siswa')->where('kelas','NOT LIKE','%Alumni%')->get();

        foreach($siswa as $data){
            $biayaspp = DB::table('tb_detail_pembayaran')->where('tahun_ajaran',$data->tahun_masuk)->first();
            $id=$data->nis;
            $bulansekarang = DB::table('tb_bulan_ajaran')->where('no_bulan',date("m"))->first();
            $tunggakan = 0;
            $tahunmasuk = $data->tahun_masuk;

            $selisih = $tahunSekarang - $data->tahun_masuk;

            if($selisih >= 3){
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
                        foreach( $qrytunggakan as $row){   
                                $tunggakan1 = $biayaspp->jumlah - $row->jumlah - $row->diskon; 
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
                            foreach( $qrytunggakan as $row){   
                                $tunggakan1 = $biayaspp->jumlah - $row->jumlah - $row->diskon; 
                                $tunggakan = $tunggakan+$tunggakan1;
                            }
                        }
                    }
                }

            $totaltunggakan += $tunggakan;

            }

            // Hitung Tunggakan SPP Alumni
            $alumni = DB::table('tb_siswa')->where('kelas','LIKE','%Alumni%')->get();
            foreach($alumni as $data){
            $biayaspp = DB::table('tb_detail_pembayaran')->where('tahun_ajaran',$data->tahun_masuk)->first();
            $id=$data->nis;
            $totalbayar = DB::table('tb_pembayaran')->where('nis','=',$id)->sum('jumlah');
            $diskon = DB::table('tb_pembayaran')->where('nis','=',$id)->sum('diskon');

            $totalSPP = $biayaspp->jumlah*36;
            $sisa = $totalSPP - $totalbayar -$diskon;
            $totaltunggakan+=$sisa;
            }

            $totaltunggakanpangkal = 0;
            $datasiswa = DB::table('tb_siswa')->get();
            foreach($datasiswa as $data){
            $cek = DB::table('tb_siswa')
              ->join('tb_detail_pembayaran','tb_detail_pembayaran.tahun_ajaran','tb_siswa.tahun_masuk')
              ->where('tb_detail_pembayaran.id_jenis_pem',3)
              ->where('tb_siswa.nis',$data->nis)
              ->select('tb_detail_pembayaran.jumlah')
              ->first();

             $sisa = DB::table('tb_pembayaran')
             ->where('nis',$data->nis)
             ->where('id_jenis_pem',3)
             ->where('pembayaran_tahun',$data->tahun_masuk)
             ->sum('jumlah');

             $tunggakanpangkal = $cek->jumlah - $sisa;
             $totaltunggakanpangkal += $tunggakanpangkal;
            }

                   
        $semuasiswa = DB::table('tb_siswa')->get();

        $totaltunggakankegiatan = 0;
        foreach ($semuasiswa as $row) {
         $biaya = DB::table('tb_detail_pembayaran')
                                ->where('tahun_ajaran',$row->tahun_masuk)
                                ->where('id_jenis_pem',2)->first();
                                $id=$row->nis;
                                $tunggakan = 0;
                                $tahunmasuk = $row->tahun_masuk;

                                $selisih = $tahunSekarang - $row->tahun_masuk;

                                if($selisih >= 4){
                                   $tahunSekarang = $row->tahun_masuk+ 3;
                                }             

                                foreach(range($row->tahun_masuk, $tahunSekarang) as $year){
                                       $qrytunggakan = DB::table('tb_pembayaran')
                                       ->where('nis', $id)
                                       ->where('id_jenis_pem',2)
                                       ->where('pembayaran_tahun',$year)
                                       ->select(DB::raw('SUM(jumlah) as jumlah'),DB::raw('SUM(diskon) as diskon'))
                                       ->get();
                                            foreach( $qrytunggakan as $tunggakanloop){   
                                                    $tunggakan2 = $biaya->jumlah - $tunggakanloop->jumlah - $tunggakanloop->diskon; 
                                                    $tunggakan = $tunggakan+$tunggakan2;
                                            }
                                }
                                       

                                $totaltunggakankegiatan += $tunggakan;
        }

      
        $data = array(
            'totalsiswa' => DB::table('tb_siswa')->where('kelas','NOT LIKE','%Alumni%')->count(),
            'totalperkelas' => DB::table('tb_siswa')->groupBy('kelas')->select('kelas')->get(),
            'hariini' => $harian,
            'bulanini' => $bulanan,
            'tahunan' => $tahunan,
            'kas' => $kas,
            'semester' => $semester,
            'pengeluaranharian' => $pengeluaranharian,
            'pengeluaranbulanan' => $pengeluaranbulanan,
            'pengeluarantahunan' => $pengeluarantahunan,
            'tunggakanspp' => $totaltunggakan,
            'tunggakankegiatan' => $totaltunggakankegiatan,
            'tunggakanpangkal' => $totaltunggakanpangkal,
        );

        
        return view('index',$data);
    }
}
