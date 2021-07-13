<?php

namespace App\Imports;

use App\Siswa;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SiswaImport implements ToModel , WithHeadingRow
{
    
    public function model(array $row)
    {
        $siswa = new Siswa([
            'nis' => $row['nis'],
            'nisn' => $row['nisn'],
            'nama_siswa' => $row['nama_siswa'],
            'nama_ayah' => $row['nama_ayah'],
            'nama_ibu' => $row['nama_ibu'],
            'pekerjaan_ayah' => $row['pekerjaan_ayah'],
            'pekerjaan_ibu' => $row['pekerjaan_ibu'],
            'pendidikan_ayah' => $row['pendidikan_ayah'],
            'pendidikan_ibu' => $row['pendidikan_ibu'],
            'jk' => $row['jk'],
            'nik' => $row['nik'],
            'ttl' => $row['ttl'],
            'no_telepon' => $row['no_telepon'],
            'asal_sekolah' => $row['asal_sekolah'],
            'alamat_lengkap' => $row['alamat_lengkap'],
            'kelas' => $row['kelas'],
            'agama' => $row['agama'],
            'status_dlm_keluarga' => $row['status_dlm_keluarga'],
            'anak_ke' => $row['anak_ke'],
            'tahun_masuk' => $row['tahun_masuk'],
            'no_seri_ijazah' => $row['no_seri_ijazah'],
            'no_seri_skhun' => $row['no_seri_skhun'],
            'no_peserta_un' => $row['no_peserta_un'],
            'foto_siswa' => 'default.jpg',
            'status_siswa' => 'Aktif',
        ]);

        return $siswa;
    }
}
