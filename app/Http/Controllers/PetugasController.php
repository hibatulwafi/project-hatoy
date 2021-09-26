<?php

namespace App\Http\Controllers;

use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class PetugasController extends Controller
{
    public function index()
    {

        $petugas= DB::table('tb_login')->get ();
        $datapetugas = array(

            'judul' =>'Data Petugas',
            'petugas' =>$petugas
        );
        return view('Petugas.petugas',$datapetugas);
    }

    public function tambah()
    {
        $petugas= DB::table('tb_login')->get ();
        $datapetugas = array(

            'judul' =>'Data Petugas',
            'petugas' =>$petugas
        );
        return view('Petugas.tambah',$datapetugas);
    }

    function save(Request $rq){
        $qry= DB::table('tb_login')->insert([
            'name' => $rq->namalengkap,
            'email' => $rq->email,
            'password' => $rq->password,
            'level' => $rq->role

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
        $mm = DB::table('tb_login')
            ->where('id',$id)
            ->get();

        $result['master'] = $mm;
        $data=array(
        'judul' => 'Data Petugas'
        );

        return view('Petugas.edit',$data)->with('result',$result);
    }

    function update (Request $rq) {
        $qry= DB::table ('tb_login')-> where('id',$rq->id)
            ->update ([
            'email' => $rq->email,
            'name' => $rq->name
        ]);
        if ($qry) {
            session()->flash('success','Berhasil Update Petugas');
            return redirect()->route('petugas');
        }else{
            session()->flash('error','Terjadi Kesalahan');
            return redirect()->route('petugas');
        }
    }
    function delete($id){
        $qry=DB::table ('tb_login') -> where('id',$id) ->delete();
        $pesan="Data Berhasil dihapus";
        if ($qry) {
            return redirect()->route('petugas');
        }else{
            session()->flash('error','Terjadi Kesalahan');
            return redirect()->route('petugas');
        }
    }
}


