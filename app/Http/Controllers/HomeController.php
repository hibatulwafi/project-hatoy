<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{


    public function tabelsiswa()
    {
       
    }

    public function inputsiswa()
    {
        return view('siswa.tambah');
    }

    public function tabelkelas()
    {
        return view('kelas.index');
    }

    public function pindahkelas()
    {
        return view('kelas.pindah');
    }

    public function index()
    {
        $ops = DB::table ('tb_wilayah')
        ->join('tb_kecamatan','tb_wilayah.id_kecamatan','tb_kecamatan.id_kecamatan')
        ->join('tb_komoditas','tb_wilayah.id_komoditas','tb_komoditas.id_komoditas')
        ->get(); 

        $komoditas  = DB::table ('tb_komoditas')->get(); 

           $data=array(
            'ops' =>$ops,
            'komoditas' => $komoditas,
        );
        return view('maps.map',$data);
    }

    
    public function mapssort(Request $rq)
    {

        $ops = DB::table ('tb_wilayah')
        ->join('tb_kecamatan','tb_wilayah.id_kecamatan','tb_kecamatan.id_kecamatan')
        ->join('tb_komoditas','tb_wilayah.id_komoditas','tb_komoditas.id_komoditas')
        ->where('tb_wilayah.id_komoditas',$rq->id)
        ->get(); 

        $komoditas  = DB::table ('tb_komoditas')->get(); 

           $data=array(
            'ops' =>$ops,
            'komoditas' => $komoditas,
        );
        return view('maps.map',$data);
    }

    public function dashboard()
    {
       
        return view('index');
    }
    
}
