<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Exports\SiswaExport;
use App\Imports\SiswaImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Str;

class SiswaController extends Controller
{
    public function index($id ='')
    {

        if ($id == ''){
    $siswa = DB::table('tb_siswa')->where('kelas','NOT LIKE','%Alumni%')->get();
    $filter = 'true' ;
    }else{
    $siswa = DB::table('tb_siswa')->where('kelas','LIKE','%Alumni%')->get();
    $filter = 'false' ;
    }

       $siswa = DB::table('tb_siswa')->where('status_siswa','Aktif')->get();
        $data=array(
            'siswa' =>$siswa,
            'filter' => $filter,
        );
        return view('siswa.index',$data);
    }

    public function filter($id ='')
    {

        if ($id == ''){
    $siswa = DB::table('tb_siswa')->where('kelas','NOT LIKE','%Alumni%')->get();
    $filter = 'true' ;
    }else{
    $siswa = DB::table('tb_siswa')->where('kelas','LIKE','%Alumni%')->get();
    $filter = 'false' ;
    }

        $siswa = DB::table('tb_siswa')->where('status_siswa','Aktif')
        ->where('kelas','like','%'.$id.'%')
        ->where('status_siswa','Aktif')
        ->get();

        $data=array(
            'siswa' =>$siswa,
            'filter' => $filter,
        );
        return view('siswa.index',$data);
    }

    public function detail($id)
    {
       $siswa = DB::table('tb_siswa')->where('nis',$id)->first();
       $data=array(
            'siswa' =>$siswa,
       );
       return view('siswa.detail',$data);
    }

    public function inputsiswa()
    {
        return view('siswa.tambah');
    }

    public function pindahsiswa()
    {
        return view('siswa.pindahsiswa');
    }

 public function save(Request $request)
    {
        $gambar = '';
        if($request->hasFile('gambar')){
            $gambar = $this->uploadGambar($request);
        }else{
            $gambar = "default.jpg";
        }
      

         $qry= DB::table('tb_siswa')->insert([
            'nis' => $request->nis,
            'nisn' => $request->nisn,
            'nama_siswa' => $request->nama_siswa,
            'nama_ayah' => $request->nama_ayah,
            'nama_ibu' => $request->nama_ibu,
            'pekerjaan_ayah' => $request->pekerjaan_ayah,
            'pekerjaan_ibu' => $request->pekerjaan_ibu,
            'pendidikan_ayah' => $request->pendidikan_ayah,
            'pendidikan_ibu' => $request->pendidikan_ibu,
            'jk' => $request->jk,
            'nik' => $request->nik,
            'ttl' => $request->tempat." ".$request->tanggal_lahir,
            'no_telepon' => $request->no_telepon,
            'asal_sekolah' => $request->asal_sekolah,
            'alamat_lengkap' => $request->alamat_lengkap,
            'kelas' => $request->kelas_angka." ".$request->kelas_huruf,
            'agama' => $request->agama,
            'status_dlm_keluarga' => $request->status_dlm_keluarga,
            'anak_ke' => $request->anak_ke,
            'tahun_masuk' => $request->tahun_masuk,
            'status_siswa' => $request->status_siswa,
            'no_seri_ijazah' => $request->no_seri_ijazah,
            'no_seri_skhun' => $request->no_seri_skhun,
            'no_peserta_un' => $request->no_peserta_un,
            'foto_siswa' => $gambar,
            'status_siswa' => 'Aktif',
            'dibuat_pada' => now()
        ]);
        $pesan="Data Berhasil Disimpan";

        if ($qry) {
            return redirect()->route('tabelsiswa');
        }else{
            echo "Gagal";
        }

    }

    public function savepindahan(Request $request)
    {
        $gambar = '';
        if($request->hasFile('gambar')){
            $gambar = $this->uploadGambar($request);
        }else{
            $gambar = "default.jpg";
        }
      

         $qry= DB::table('tb_siswa')->insert([
            'nis' => $request->nis,
            'nisn' => $request->nisn,
            'nama_siswa' => $request->nama_siswa,
            'nama_ayah' => $request->nama_ayah,
            'nama_ibu' => $request->nama_ibu,
            'pekerjaan_ayah' => $request->pekerjaan_ayah,
            'pekerjaan_ibu' => $request->pekerjaan_ibu,
            'pendidikan_ayah' => $request->pendidikan_ayah,
            'pendidikan_ibu' => $request->pendidikan_ibu,
            'jk' => $request->jk,
            'nik' => $request->nik,
            'ttl' => $request->tempat." ".$request->tanggal_lahir,
            'no_telepon' => $request->no_telepon,
            'asal_sekolah' => $request->asal_smp,
            'alamat_lengkap' => $request->alamat_lengkap,
            'kelas' => $request->kelas_angka." ".$request->kelas_huruf,
            'agama' => $request->agama,
            'status_dlm_keluarga' => $request->status_dlm_keluarga,
            'anak_ke' => $request->anak_ke,
            'tahun_masuk' => $request->tahun_masuk,
            'status_siswa' => $request->status_siswa,
            'no_seri_ijazah' => $request->no_seri_ijazah,
            'no_seri_skhun' => $request->no_seri_skhun,
            'no_peserta_un' => $request->no_peserta_un,
            'foto_siswa' => $gambar,
            'status_siswa' => 'Aktif',
            'dibuat_pada' => now()
        ]);
        $pesan="Data Berhasil Disimpan";

        if ($qry) {
            return redirect()->route('tabelsiswa');
        }else{
            echo "Gagal";
        }

    }

  public function uploadGambar($request)
    {
        $namaFile = Str::slug($request->nama_siswa);
        $ext = explode('/', $request->gambar->getClientMimeType())[1];
        $uniq = uniqid();
        $gambar = "$namaFile-$uniq.$ext";
        $request->gambar->move(public_path('storage/fotosiswa'), $gambar);

        return $gambar;
    }

    public function edit($id){
        $return = array(
            'data' => DB::table('tb_siswa')->where('nis',$id)->first(),
        );
        return view('siswa.edit',$return);
    }

    public function update(Request $request)
    {

        $cek = DB::table ('tb_siswa')
        ->where('nis',$request->nis)
        ->first();

        $gambar = '';
        if($request->hasFile('gambar')){
            $gambar = $this->uploadGambar($request);

            if($cek->foto_siswa !== "default.jpg"){
                File::delete('storage/fotosiswa/'.$cek->foto_siswa);
            }

        $qry= DB::table('tb_siswa')->where('nis',$request->nis)->update([
            'nis' => $request->nis,
            'nisn' => $request->nisn,
            'nama_siswa' => $request->nama_siswa,
            'nama_ayah' => $request->nama_ayah,
            'nama_ibu' => $request->nama_ibu,
            'pekerjaan_ayah' => $request->pekerjaan_ayah,
            'pekerjaan_ibu' => $request->pekerjaan_ibu,
            'pendidikan_ayah' => $request->pendidikan_ayah,
            'pendidikan_ibu' => $request->pendidikan_ibu,
            'jk' => $request->jk,
            'nik' => $request->nik,
            'ttl' => $request->ttl,
            'no_telepon' => $request->no_telepon,
            'asal_sekolah' => $request->asal_sekolah,
            'alamat_lengkap' => $request->alamat_lengkap,
            'kelas' => $request->kelas_angka." ".$request->kelas_huruf,
            'agama' => $request->agama,
            'status_dlm_keluarga' => $request->status_dlm_keluarga,
            'anak_ke' => $request->anak_ke,
            'tahun_masuk' => $request->tahun_masuk,
            'status_siswa' => $request->status_siswa,
            'no_seri_ijazah' => $request->no_seri_ijazah,
            'no_seri_skhun' => $request->no_seri_skhun,
            'no_peserta_un' => $request->no_peserta_un,
            'foto_siswa' => $gambar,
            'status_siswa' => 'Aktif',
            'dibuat_pada' => now()
        ]);


        }else{
            $qry= DB::table('tb_siswa')->where('nis',$request->nis)->update([
            'nis' => $request->nis,
            'nisn' => $request->nisn,
            'nama_siswa' => $request->nama_siswa,
            'nama_ayah' => $request->nama_ayah,
            'nama_ibu' => $request->nama_ibu,
            'pekerjaan_ayah' => $request->pekerjaan_ayah,
            'pekerjaan_ibu' => $request->pekerjaan_ibu,
            'pendidikan_ayah' => $request->pendidikan_ayah,
            'pendidikan_ibu' => $request->pendidikan_ibu,
            'jk' => $request->jk,
            'nik' => $request->nik,
            'ttl' => $request->ttl,
            'no_telepon' => $request->no_telepon,
            'asal_sekolah' => $request->asal_sekolah,
            'alamat_lengkap' => $request->alamat_lengkap,
            'kelas' => $request->kelas_angka." ".$request->kelas_huruf,
            'agama' => $request->agama,
            'status_dlm_keluarga' => $request->status_dlm_keluarga,
            'anak_ke' => $request->anak_ke,
            'tahun_masuk' => $request->tahun_masuk,
            'status_siswa' => $request->status_siswa,
            'no_seri_ijazah' => $request->no_seri_ijazah,
            'no_seri_skhun' => $request->no_seri_skhun,
            'no_peserta_un' => $request->no_peserta_un,
            'status_siswa' => 'Aktif',
            'dibuat_pada' => now()
        ]);
        }
      

      
        $pesan="Data Berhasil Disimpan";

        if ($qry) {
            return redirect()->route('tabelsiswa');
        }else{
            echo "Gagal";
        }

    }

    function delete($id){
          $qry= DB::table('tb_siswa')->where('nis',$id)->update([
            'status_siswa' => 'Nonaktif',
            'diupdate_pada' => now()
        ]);
     return redirect()->route('tabelsiswa');

    }

    public function export() 
    {
        return (new SiswaExport())->download('export-siswa.xlsx');
        // return Excel::download(new ProdukExport, 'produk.xlsx');
    }

    public function import(Request $request) 
    {
        $this->validate($request, [
            'import_siswa' => 'required|nullable|mimes:xls,xlsx|max:1000'
        ]);

        $file = request()->file('import_siswa');
                
        Excel::import(new SiswaImport, request()->file('import_siswa'));
        
        $pesan="Data Berhasil Disimpan";
        echo $pesan;
        //redirect user
        //return redirect(route('tabelsiswa'));
    }

}
