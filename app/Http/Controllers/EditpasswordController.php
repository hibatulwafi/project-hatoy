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
        $id = Auth::user()->id;
        $data=array(
            'id' =>  $id
        );
         return view('Petugas.edit_password',$data);
    }
public function editpost(Request $request)
{
    $password_old = $request->password_old;
    $password_new = $request->password_new;
    $repassword_new = $request->repassword_new;

    //cek email
    $data = DB::table('tb_login')
        ->where('email', '=', Auth::user()->username)
        ->first();

    if ($data){
    //cek passsworf lama
    if ((Hash::check($password_old, $data->password))) {

        if ($password_new != $repassword_new){
            session()->flash('success','Re Password Tidak Sama');
            return redirect('/petugas/edit_password');
        }else{
           
            $editqry= DB::table('tb_login')->where('email', Auth::user()->username)
            ->update ([
                    'password' =>  Hash::make($password_new), 
                 ]);
    
            if ($editqry) {
                 session()->flash('success','Berhasil Update Password, Silahkan login kembali');
                 return redirect('/petugas');
            }else{
                 session()->flash('error','Yaahh gagal update Password');
                 return redirect('/petugas/edit_password');
            }

        }
        
      
    }else{
       session()->flash('error','Password Lama Tidak Sama');
       return redirect('/petugas/edit_password');
    }
}else{
       session()->flash('error','Email Tidak Sama');
       return redirect('/petugas/edit_password');
}

}

function update (Request $rq) {
    $id = Auth::user()->id;

    $qry= DB::table ('tb_login')-> where('id',$id)
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