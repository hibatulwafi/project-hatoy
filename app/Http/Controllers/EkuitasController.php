<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EkuitasController extends Controller
{
   public function index(Request $request){
        $filter_bulan = $request->bulan;
        $filter_tahun = $request->tahun;

        if($request->bulan == null){
             $filter_bulan = date("m");
        }

        if ($request->tahun == null) {
             $filter_tahun = date("Y");
        }


        $data=array(
            'filter_bulan' => $filter_bulan,
            'filter_tahun' => $filter_tahun,
            'bulan' =>  DB::table('tb_bulan_ajaran')->get(),
        );

        return view('ekuitas.index',$data);
    }
}
