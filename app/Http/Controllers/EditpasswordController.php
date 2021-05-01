<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use Hash;
class EditpasswordController extends Controller
{
    public function edit()
    {   
        $id_petugas = Auth::guard('login')->user()->id_petugas;
        $data=array(
            'id_petugas' =>  $id_petugas
        );
         return view('Petugas.edit_password',$data);
    }
public function editpost(Request $request)
{
    $password_old = $request->password_old;
    $password_new = $request->password_new;
    $repassword_new = $request->repassword_new;

    //cek email
    $data = DB::table('tbpetugas')
        ->where('email', '=', Auth::guard('login')->user()->username)
        ->first();

    if ($data){
    //cek passsworf lama
    if ((Hash::check($password_old, $data->password))) {

        if ($password_new != $repassword_new){
            session()->flash('success','Re Password Tidak Sama');
            return redirect('/edit');
        }else{
           
            $editqry= DB::table('tbpetugas')->where('email', Auth::guard('login')->user()->username)
            ->update ([
                    'password' =>  Hash::make($password_new), 
                    'Log' => now()
                 ]);
    
            if ($editqry) {
                 session()->flash('success','Berhasil Update Password, Silahkan login kembali');
                 return redirect('/petugas');
            }else{
                 session()->flash('success','Yaahh gagal update Password');
                 return redirect('/edit');
            }

        }
        
      
    }else{
       session()->flash('success','Password Lama Tidak Sama');
       return redirect('/editpassword');
    }
}else{
       session()->flash('success','Email Tidak Sama');
       return redirect('/editpassword');
}

}

function update (Request $rq) {
    $id_petugas = Auth::guard('login')->user()->id_petugas;

    $qry= DB::table ('tbpetugas')-> where('id_petugas',$id_petugas)
        ->update ([
        'password' =>  Hash::make($rq->password_new)
    ]);
        $pesan="Data Berhasil Diedit";
    if ($qry) {
        return redirect()->route('index');
    }else{
        echo "ERROR";
    }
}
}