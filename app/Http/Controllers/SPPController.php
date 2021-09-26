<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Carbon\Carbon;
use App\Imports\SPPImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Str;
use Auth;

class SPPController extends Controller
{
    public function index($id ='')
    { 
/*setlocale(LC_ALL, 'id_ID.UTF8', 'id_ID.UTF-8', 'id_ID.8859-1', 'id_ID', 'IND.UTF8', 'IND.UTF-8', 'IND.8859-1', 'IND', 'Indonesian.UTF8', 'Indonesian.UTF-8', 'Indonesian.8859-1', 'Indonesian', 'Indonesia', 'id', 'ID', 'en_US.UTF8', 'en_US.UTF-8', 'en_US.8859-1', 'en_US', 'American', 'ENG', 'English');
$date = strftime( "%A, %d %B %Y %H:%M", time());
echo "Saat ini: ".$date;*/
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

   
    // uji coba
    /*foreach($siswa as $data){

    $biayaspp = DB::table('tb_detail_pembayaran')->where('tahun_ajaran',$data->tahun_masuk)->first();
    $id=$data->nis;
    $bulansekarang = DB::table('tb_bulan_ajaran')->where('bulan',$date)->first();
    $tunggakan = 0;
    $tahunmasuk = $data->tahun_masuk;
    echo $data->nama_siswa."</br>";
    echo $data->nis."</br>";

        foreach(range($data->tahun_masuk, $tahunSekarang) as $year){

        if($tahunmasuk == $year){
        echo 'tahun '.$year;
        echo "</br>";
        foreach (range(1, $bulan->posisi) as $month) {
            echo 'bulan '.$month.' : ';
            $qrytunggakan = DB::table('tb_pembayaran')
               ->where('nis', $id)
               ->where('id_jenis_pem',1)
               ->where('pembayaran_bulan',$month)
               ->where('pembayaran_tahun',$year)
               ->select(DB::raw('SUM(jumlah) as jumlah'))
               ->get();
                  foreach( $qrytunggakan as $data){   
                        $tunggakan1 = $biayaspp->jumlah - $data->jumlah; 
                        $tunggakan = $tunggakan+$tunggakan1;
                  }
            echo $tunggakan."<br/>";
        }
        }else{
        echo 'tahun '.$year;
        echo "</br>";
        foreach (range(1, 12) as $month) {
            echo 'bulan '.$month.' : ';
            $qrytunggakan = DB::table('tb_pembayaran')
               ->where('nis', $id)
               ->where('id_jenis_pem',1)
               ->where('pembayaran_bulan',$month)
               ->where('pembayaran_tahun',$year)
               ->select(DB::raw('SUM(jumlah) as jumlah'))
               ->get();
                  foreach( $qrytunggakan as $data){   
                        $tunggakan1 = $biayaspp->jumlah - $data->jumlah; 
                        $tunggakan = $tunggakan+$tunggakan1;
                  }
            echo $tunggakan."<br/>";
        }
        }

    }
       
    } */
        $data=array(
            'siswa' =>$siswa,
            'bulanini' => $bulan->bulan,
            'date' => $date,
            'tahunSekarang' => $tahunSekarang,
            'bulan' => $bulan,
            'filter' => $filter,
        );
        return view('spp.index',$data);
    }

    public function alumni(){ 
    setlocale(LC_ALL, 'id_ID.UTF8', 'id_ID.UTF-8', 'id_ID.8859-1', 'id_ID', 'IND.UTF8', 'IND.UTF-8', 'IND.8859-1', 'IND', 'Indonesian.UTF8',
    'Indonesian.UTF-8', 'Indonesian.8859-1', 'Indonesian', 'Indonesia', 'id', 'ID', 'en_US.UTF8', 'en_US.UTF-8', 'en_US.8859-1', 'en_US',
    'American', 'ENG', 'English');

    $date = strftime("%B", time());
    $bulan = DB::table('tb_bulan_ajaran')->where('bulan',$date)->first();
    $siswa = DB::table('tb_siswa')->where('kelas','LIKE','%Alumni%')->get();
    $filter = 'false' ;
    $tahunSekarang =  date("Y");
        $data=array(
            'siswa' =>$siswa,
            'bulanini' => $bulan->bulan,
            'date' => $date,
            'tahunSekarang' => $tahunSekarang,
            'bulan' => $bulan,
            'filter' => $filter,
        );
        return view('spp.alumni',$data);
    }

    public function pembayaran($id)
    {
       setlocale(LC_ALL, 'id_ID.UTF8', 'id_ID.UTF-8', 'id_ID.8859-1', 'id_ID', 'IND.UTF8', 'IND.UTF-8', 'IND.8859-1', 'IND', 'Indonesian.UTF8',
       'Indonesian.UTF-8', 'Indonesian.8859-1', 'Indonesian', 'Indonesia', 'id', 'ID', 'en_US.UTF8', 'en_US.UTF-8', 'en_US.8859-1', 'en_US',
       'American', 'ENG', 'English');
       $date = strftime("%B", time());

       $siswa = DB::table('tb_siswa')->where('nis',$id)->first();
       $bulan = DB::table('tb_bulan_ajaran')->get();
       $tahun = DB::table('tb_tahun_ajaran')->orderBy('tahun_ajaran','DESC')->get();

       $riwayat = DB::table('tb_pembayaran')
       ->join('tb_siswa','tb_siswa.nis','tb_pembayaran.nis')
       ->join('tb_jenis_pembayaran','tb_jenis_pembayaran.id_jenis_pem','tb_pembayaran.id_jenis_pem')
       ->leftJoin('tb_bulan_ajaran','tb_bulan_ajaran.id_ajaran','tb_pembayaran.pembayaran_bulan')
       ->where('tb_pembayaran.nis',$id)
       ->where('tb_pembayaran.id_jenis_pem',1)
       ->select('tb_pembayaran.*','tb_bulan_ajaran.bulan')
       ->get();

       $biayaspp = DB::table('tb_detail_pembayaran')->where('tahun_ajaran',$siswa->tahun_masuk)->first();
       $tahunSPP = $siswa->tahun_masuk;       
    

        $bulansekarang = DB::table('tb_bulan_ajaran')->where('bulan',$date)->first();
        $namaBulan = array("Juli","Agustus","September","Oktober","November","Desember","Januari","Februari","Maret","April","Mei","Juni");
        $noBulan = 1;
        $tunggakan = 0;
      /*  for($cmd=0; $index < $bulansekarang->id_ajaran-1; $index++){
           $qrytunggakan = DB::table('tb_pembayaran')
           ->leftJoin('tb_siswa','tb_siswa.nis','tb_pembayaran.nis')
           ->leftJoin('tb_jenis_pembayaran','tb_jenis_pembayaran.id_jenis_pem','tb_pembayaran.id_jenis_pem')
           ->leftJoin('tb_bulan_ajaran','tb_bulan_ajaran.id_ajaran','tb_pembayaran.pembayaran_bulan')
           ->where('tb_pembayaran.nis',$id)
           ->where('tb_pembayaran.id_jenis_pem',1)
           ->where('tb_pembayaran.pembayaran_bulan',$noBulan)
           ->where('tb_pembayaran.pembayaran_tahun',$tahunSPP)
           ->select('tb_bulan_ajaran.bulan',DB::raw('SUM(tb_pembayaran.jumlah) as jumlah'))
           ->get();
              foreach( $qrytunggakan as $data){   
                    $tunggakan1 = $biayaspp->jumlah - $data->jumlah; 
                    $tunggakan = $tunggakan+$tunggakan1;
              }
            $noBulan++;
        }*/


       $data=array(
            'siswa' =>$siswa,
            'bulan' =>$bulan,
            'tahun' =>$tahun,
            'riwayat' => $riwayat,
            'biayaspp' => $biayaspp->jumlah,
            'tahunSPP' => $tahunSPP,
            'id' => $id,
            'tunggakan' => $tunggakan,
       );
       
        return view('spp.pembayaran',$data);
    }

     public function pembayaran_create(Request $request){
      $jumlah = $request->jumlah;
      $tahun = $request->tahun;
      $bulan = $request->bulan;
      $keterangan = $request->keterangan;
      $nis = $request->nis;
      $diskon = $request->diskon;
      $method = $request->method;
      $tanggal_bayar = $request->tanggal_bayar;
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
          'diskon' => $diskon,
          'method' => $method,
          'tanggal_bayar' => $tanggal_bayar, 
          'dibuat_pada' => now()
      ]);

      return redirect()->back();
    }

    public function import(Request $request) 
    {
        $this->validate($request, [
            'import_spp' => 'required|nullable|mimes:xls,xlsx|max:1000'
        ]);

        $file = request()->file('import_spp');
                
        Excel::import(new SPPImport, request()->file('import_spp'));
        
        $pesan="Data Berhasil Disimpan";
        echo $pesan;
        //return redirect(route('spp'));
    }

    public function hapus($id='')
    {
        $hapus = DB::table('tb_pembayaran')->where('id_pembayaran',$id)->delete();

        if($hapus){
            return redirect()->back();
        }else{
            echo 'Gagal Hapus';
        }

    }

    
}
