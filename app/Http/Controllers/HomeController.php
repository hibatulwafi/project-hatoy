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

        $harian = DB::table('tb_pembayaran')->where(DB::raw('DATE(tb_pembayaran.dibuat_pada)'),date("Y-m-d"))->sum('jumlah');
        $bulanan = DB::table('tb_pembayaran')->where(DB::raw('MONTH(tb_pembayaran.dibuat_pada)'),date("m"))->sum('jumlah');
        $tahunan = DB::table('tb_pembayaran')->where(DB::raw('YEAR(tb_pembayaran.dibuat_pada)'),date("Y"))->sum('jumlah');

        
        $data = array(
            'totalsiswa' => DB::table('tb_siswa')->count(),
            'totalperkelas' => DB::table('tb_siswa')->groupBy('kelas')->select('kelas')->get(),
            'hariini' => $harian,
            'bulanini' => $bulanan,
            'tahunan' => $tahunan,
        );

        
        return view('index',$data);
    }
}
