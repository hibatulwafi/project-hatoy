<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KelasController extends Controller
{
    public function tabelkelas(){
        $kelas = DB::table('tb_siswa')->groupBy('kelas')->select('kelas')->get();

        $data=array(
            'kelas' =>$kelas,
        );

        return view('kelas.index',$data);
    }

    public function pindahkelas(){
     $siswa = DB::table('tb_siswa')->where('status_siswa','Aktif')->get();
        $data=array(
            'siswa' =>$siswa,
        );
        return view('kelas.pindah',$data);
    }

    public function kenaikankelas(){
        return view('kelas.kenaikan');
    }

     public function updatekelas(){

        $loop = DB::table('tb_siswa')->get();

        foreach($loop as $row){
            if (substr($row->kelas,0,-2) == 'VII') {

            $update= DB::table('tb_siswa')->where('nis',$row->nis)->update([
                'kelas' => 'VIII '.substr($row->kelas,-1),
            ]);
            echo $row->nama_siswa.' Naik Ke Kelas VIII '.substr($row->kelas,-1) .' dari kelas '.$row->kelas.'</br>';

            }elseif (substr($row->kelas,0,-2) == 'VIII') {
            
            $update= DB::table('tb_siswa')->where('nis',$row->nis)->update([
                'kelas' => 'IX '.substr($row->kelas,-1),
            ]);
            echo $row->nama_siswa.' Naik Ke Kelas IX '.substr($row->kelas,-1) .' dari kelas '.$row->kelas.'</br>';
            
            }elseif(substr($row->kelas,0,-2) == 'IX'){
            
            $update= DB::table('tb_siswa')->where('nis',$row->nis)->update([
                'kelas' => 'Alumni '.substr($row->kelas,-1),
            ]);
            echo $row->nama_siswa.' Anda Alumni '.'dari kelas '.$row->kelas.'</br>';
            
            }else{
               echo 'Error';
            }
        }
    }

    public function rollback(){

        $loop = DB::table('tb_siswa')->get();

        foreach($loop as $row){
            if (substr($row->kelas,0,-2) == 'VIII') {
                echo $row->nama_siswa.' Rollback VII '.substr($row->kelas,-1) .' dari kelas '.$row->kelas.'</br>';
                $update= DB::table('tb_siswa')->where('nis',$row->nis)->update([
                'kelas' => 'VII '.substr($row->kelas,-1),
                ]);

            }elseif (substr($row->kelas,0,-2) == 'IX') {
                echo $row->nama_siswa.' Rollback VIII '.substr($row->kelas,-1) .' dari kelas '.$row->kelas.'</br>';
                $update= DB::table('tb_siswa')->where('nis',$row->nis)->update([
                'kelas' => 'VIII '.substr($row->kelas,-1),
                ]);
            }elseif(substr($row->kelas,0,-2) == 'Alumni'){
                echo $row->nama_siswa.' Rollback '.$row->kelas.'</br>';
                $update= DB::table('tb_siswa')->where('nis',$row->nis)->update([
                'kelas' => 'IX '.substr($row->kelas,-1),
                ]);
            }else{
               echo 'Error';
            }
        }
    }
}
