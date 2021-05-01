<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {
        $kec = DB::table ('tb_kecamatan')->count();
        $pet = DB::table ('tbpetugas')->count();
        $komo = DB::table ('tb_komoditas')->count();
        $pk = DB::table ('tb_komoditas')->sum('pekebun');
        $per = DB::table ('tb_produksipr')->avg('jml_produksi');
        $komoditas  = DB::table ('tb_komoditas')->get(); 

        
        $ops = DB::table ('tb_wilayah')
        ->join('tb_kecamatan','tb_wilayah.id_kecamatan','tb_kecamatan.id_kecamatan')
        ->join('tb_komoditas','tb_wilayah.id_komoditas','tb_komoditas.id_komoditas')
        ->get(); 

           $data=array(
            'ops' =>$ops,
            'kec' => $kec,
            'pet' => $pet,
            'komo' => $komo,
            'pk' => $pk,
            'per' => $per,
            'komoditas' => $komoditas,

        );
        return view('user.index',$data);
    }

    public function mapssort(Request $rq)
    {
        $kec = DB::table ('tb_kecamatan')->count();
        $pet = DB::table ('tbpetugas')->count();
        $komo = DB::table ('tb_komoditas')->count();
        $per = DB::table ('tb_perusahaan')->count();
        $komoditas  = DB::table ('tb_komoditas')->get(); 
        $pk = DB::table ('tb_komoditas')->sum('pekebun');

        $ops = DB::table ('tb_wilayah')
        ->join('tb_kecamatan','tb_wilayah.id_kecamatan','tb_kecamatan.id_kecamatan')
        ->join('tb_komoditas','tb_wilayah.id_komoditas','tb_komoditas.id_komoditas')
        ->where('tb_wilayah.id_komoditas',$rq->id)
        ->get(); 

        $komoditas  = DB::table ('tb_komoditas')->get(); 

           $data=array(
            'ops' =>$ops,
            'kec' => $kec,
            'pet' => $pet,
            'per' => $per,
            'pk' => $pk,

            'komo' => $komo,
            'komoditas' => $komoditas,
        );
        return view('user.index',$data);

    }

    public function sejarah()
    {
        return view('user.sejarah');
    }

    public function vm()
    {
        return view('user.visimisi');
    }
    public function tf()
    {
        return view('user.tujuan');
    }
    public function so()
    {
        return view('user.struktur_organisasi');
    }
    public function foto()
    {
        return view('user.foto');
    }
    public function fotodetailapp()
    {
        return view('user.fotodetailapp');
    }
    public function fotodetailweb()
    {
        return view('user.fotodetailweb');
    }
    public function vid()
    {
        return view('user.video');
    }
    public function sta()
    {

            $komoditas= DB::table('tb_wilayah')
            ->join('tb_jenis','tb_wilayah.id_jenis','tb_jenis.id_jenis')
            ->join('tb_kecamatan','tb_wilayah.id_kecamatan','tb_kecamatan.id_kecamatan')
            ->join('tb_perusahaan','tb_wilayah.id_perusahaan','tb_perusahaan.id_perusahaan')
            ->join('tb_produksipr','tb_wilayah.id_produksi','tb_produksipr.id_produksi')
            ->join('tb_komoditas','tb_wilayah.id_komoditas','tb_komoditas.id_komoditas')
            ->select(DB::raw('SUM(tb_wilayah.luas) AS luas , tb_wilayah.id_komoditas') ,'tb_komoditas.nama_komoditas'
                     ,'tb_produksipr.jml_produksi' ,'tb_wilayah.wujud_produksi' , 'tb_wilayah.tahun' , 'tb_komoditas.harga_rata','tb_komoditas.pekebun')
            ->groupBy('tb_komoditas.id_komoditas')
            ->get ();
    
            $datakomoditas = array(
    
                'judul' =>'Data Komoditas',
                'komoditas' =>$komoditas
            );
            return view('user.statistik',$datakomoditas);
    }
    public function har()
    {
    
            $laporanharga= DB::table('tb_wilayah')
            ->join('tb_komoditas','tb_wilayah.id_komoditas','tb_komoditas.id_komoditas')
            ->groupBy('tb_komoditas.id_komoditas')
            ->get ();
    
            $dataharga = array(
    
                'judul' =>'Data Harga',
                'laporanharga' =>$laporanharga
            );
            return view('user.harga',$dataharga);
        }
    public function blog()
    {

        $berita= DB::table('tb_berita')
        ->join('tb_kategori','tb_berita.id_kategori','tb_kategori.id_kategori')
        ->get ();
        $databerita = array(

            'judul' =>'Data Berita',
            'berita' =>$berita
        );

        return view('user.berita',$databerita);
    }
    function db($id) {

        $berita= DB::table('tb_berita')
        ->join('tb_kategori','tb_berita.id_kategori','tb_kategori.id_kategori')
        ->limit(5)
        ->whereNotIn('tb_berita.id_berita',[$id])
        ->get ();

        $kategori= DB::table('tb_kategori')->get ();

        $result = array();
        $mm = DB::table('tb_berita')
            ->where('id_berita',$id)
            ->get();

        $result['master'] = $mm;
        $data=array(
        'judul' => 'Data Berita',
        'kategori' =>$kategori,
        'berita' =>$berita

        );
        return view('user.detail_berita',$data)->with('result',$result);
    }
    public function kontak()
    {
        return view('user.kontak');
    }
}
