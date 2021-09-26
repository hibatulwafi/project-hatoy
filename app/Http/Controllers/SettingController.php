<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class SettingController extends Controller
{

	public function tahun(){
       $qry = DB::table('tb_tahun_ajaran')
       ->orderBy('tahun_ajaran','DESC')
       ->get();

        $data=array(
            'qry' =>$qry,
        );
        return view('setting.tahun_ajaran',$data);
    }

    public function tahun_add(Request $request){
    	$tahun_ajaran = $request->tahun_ajaran;
    	$keterangan = $request->keterangan;
    	$panjang = strlen($tahun_ajaran);

    	$cek  =  $qry = DB::table('tb_tahun_ajaran')
    	->where('tahun_ajaran',$tahun_ajaran)
        ->get();

        if (count($cek) > 0) {
        	echo "Data Sudah Ada";
        } else {
        	if (  $panjang > 4) {
        		echo "Inputan Tahun Salah";
        	} else {
        		$insert= DB::table('tb_tahun_ajaran')->insert([
	            'tahun_ajaran' => $tahun_ajaran,
	            'keterangan' => $keterangan,
	            'dibuat_pada' => now()
	        	]);

	        	if ($insert) {
		        	$pesan="Data Berhasil Disimpan";
		            return redirect()->route('setting.tahun');
		        }else{
		            echo "Gagal";
		        }
        	}
        }

        
    }

      public function tahun_edit(Request $request){
    	$tahun_ajaran = $request->tahun_ajaran;
    	$id_tahun = $request->id_tahun;
    	$keterangan = $request->keterangan;

 		$update= DB::table('tb_tahun_ajaran')
		->where('id_tahun',$id_tahun)
		->where('tahun_ajaran',$tahun_ajaran)
 		->update([
            'keterangan' => $keterangan,
        ]);

        if ($update) {
        	$pesan="Data Berhasil Disimpan";
            return redirect()->route('setting.tahun');
        }else{
            echo "Gagal";
        }


    }

 	public function pembayaran(){
       $qry = DB::table('tb_detail_pembayaran')
       ->groupBy('tahun_ajaran')
       ->get();

       $tahun_ajaran = array();

       foreach ($qry as $key) {
       		$tahun_ajaran[] = array_push($tahun_ajaran,$key->tahun_ajaran);
       }

	   $tahun = DB::table('tb_tahun_ajaran')
	   ->whereNotIn('tahun_ajaran', $tahun_ajaran) 
       ->get();

        $data=array(
            'qry' =>$qry,
            'tahun' =>$tahun,
        );
        return view('setting.pembayaran',$data);
    }

    public function pembayaran_add(Request $request){
    	$tahun_ajaran = $request->tahun_ajaran;
    	$spp = $request->spp;
    	$kegiatan = $request->kegiatan;
    	$pangkal = $request->pangkal;

 		$insertspp= DB::table('tb_detail_pembayaran')->insert([
            'id_jenis_pem' => 1,
            'jumlah' => $spp,
            'tahun_ajaran' => $tahun_ajaran,
            'dibuat_pada' => now()
        ]);

		$insertkegiatan= DB::table('tb_detail_pembayaran')->insert([
            'id_jenis_pem' => 2,
            'jumlah' => $kegiatan,
            'tahun_ajaran' => $tahun_ajaran,
            'dibuat_pada' => now()
        ]);

		$insertpangkal= DB::table('tb_detail_pembayaran')->insert([
            'id_jenis_pem' => 3,
            'jumlah' => $pangkal,
            'tahun_ajaran' => $tahun_ajaran,
            'dibuat_pada' => now()
        ]);


        if ($insertspp && $insertkegiatan && $insertpangkal) {
        	$pesan="Data Berhasil Disimpan";
            return redirect()->route('setting.pembayaran');
        }else{
            echo "Gagal";
        }
    }

    public function pembayaran_edit(Request $request){
    	$tahun_ajaran = $request->tahun_ajaran;
    	$spp = $request->spp;
    	$kegiatan = $request->kegiatan;
    	$pangkal = $request->pangkal;

 		$updatespp= DB::table('tb_detail_pembayaran')
		->where('id_jenis_pem',1)
		->where('tahun_ajaran',$tahun_ajaran)
 		->update([
            'jumlah' => $spp,
            'diupdate_pada' => now()
        ]);

		$updatekegiatan= DB::table('tb_detail_pembayaran')
		->where('id_jenis_pem',2)
		->where('tahun_ajaran',$tahun_ajaran)
		->update([
            'jumlah' => $kegiatan,
            'diupdate_pada' => now()
        ]);

		$updatepangkal= DB::table('tb_detail_pembayaran')
		->where('id_jenis_pem',3)
		->where('tahun_ajaran',$tahun_ajaran)
		->update([
            'jumlah' => $pangkal,
            'diupdate_pada' => now()
        ]);


        if ($updatespp && $updatekegiatan && $updatepangkal) {
        	$pesan="Data Berhasil Disimpan";
            return redirect()->route('setting.pembayaran');
        }else{
            echo "Gagal";
        }


    }

    public function biaya(){
       $qry = DB::table('tb_master_biaya')
       ->orderBy('id_master_biaya','DESC')
       ->get();

        $data=array(
            'qry' =>$qry,
        );
        return view('setting.biaya',$data);
    }

    public function biaya_add(Request $request){
        $kategori_operasional = $request->kategori_operasional;
        $biaya = $request->biaya;

        $cek  =  $qry = DB::table('tb_master_biaya')
        ->where('nama_biaya',$biaya)
        ->get();

        if (count($cek) > 0) {
            echo "Data Sudah Ada";
        } else {
            $insert= DB::table('tb_master_biaya')->insert([
            'nama_biaya' => $biaya,
            'kategori_operasional' => $kategori_operasional,
            'dibuat_pada' => now()
            ]);

            if ($insert) {
                $pesan="Data Berhasil Disimpan";
                return redirect()->route('setting.biaya');
            }else{
                echo "Gagal";
            }    
        }

        
    }

      public function biaya_edit(Request $request){
        $id_master_biaya = $request->id_master_biaya;
        $kategori_operasional = $request->kategori_operasional;
        $biaya = $request->biaya;

        $update= DB::table('tb_master_biaya')
        ->where('id_master_biaya',$id_master_biaya)
        ->update([
            'nama_biaya' => $biaya,
            'kategori_operasional' => $kategori_operasional,
            'diupdate_pada' => now()
        ]);

        if ($update) {
            $pesan="Data Berhasil Disimpan";
            return redirect()->route('setting.biaya');
        }else{
            echo "Gagal";
        }


    }


      function delete($id){

        $delete= DB::table('tb_master_biaya')->where('id_master_biaya',$id)->delete();
        if ($delete) {
            session()->flash('error','Sukses Hapus data!');
            return redirect()->route('setting.biaya');
        }
    }
}
