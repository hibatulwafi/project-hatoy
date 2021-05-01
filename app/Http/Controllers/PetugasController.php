<?php

namespace App\Http\Controllers;

use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class PetugasController extends Controller
{
    public function index()
    {

        $petugas= DB::table('tbpetugas')->get ();
        $datapetugas = array(

            'judul' =>'Data Petugas',
            'petugas' =>$petugas
        );
        return view('Petugas.petugas',$datapetugas);
    }

    public function tambah()
    {
        $petugas= DB::table('tbpetugas')->get ();
        $datapetugas = array(

            'judul' =>'Data Petugas',
            'petugas' =>$petugas
        );
        return view('Petugas.tambah',$datapetugas);
    }

    function save(Request $rq){
        $qry= DB::table('tbpetugas')->insert([
            'namalengkap' => $rq->namalengkap,
            'email' => $rq->email,
            'password' => $rq->password,
            'role' => $rq->role

        ]);
        $pesan="Data Berhasil Disimpan";

        if ($qry) {
            return redirect()->route('petugas');
        }else{
            echo "Gagal";
        }
    }

    function edit($id) {
        $result = array();
        $mm = DB::table('tbpetugas')
            ->where('id_petugas',$id)
            ->get();

        $result['master'] = $mm;
        $data=array(
        'judul' => 'Data Petugas'
        );
            return view('Petugas.edit',$data)->with('result',$result);
    }

    function update (Request $rq) {
        $qry= DB::table ('tbpetugas')-> where('id_petugas',$rq->id_petugas)
            ->update ([
            'email' => $rq->email,
            'password' =>  Hash::make($rq->password_new), 
            'role' => $rq->role
        ]);
            $pesan="Data Berhasil Diedit";
        if ($qry) {
            return redirect()->route('petugas');
        }else{
            echo "ERROR";
        }
    }
    function delete($id){
        $qry=DB::table ('tbpetugas') -> where('id_petugas',$id) ->delete();
        $pesan="Data Berhasil dihapus";
        if ($qry) {
            return redirect()->route('petugas');
        }else{
            // echo "GAGAL";
            return redirect()->route('petugas');
        }
    }
}


