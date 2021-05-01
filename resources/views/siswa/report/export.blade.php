<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Produk</title>
</head>
<body>
    <div class="header">
        <h3>Contoh Export Excel</h3>
        <h3>Data Produk</h3>
        {{-- <h4 style="line-height: 0px;">Invoice: #{{ $penjualan->invoice }}</h4>
        <p><small style="opacity: 0.5;">{{ $penjualan->created_at->format('d-m-Y H:i:s') }}</small></p> --}}
    </div>
    @if (!empty($start_date))
        <div class="customer">
            <table>
                <tr>
                    <th>Dari Tanggal</th>
                    <td></td>
                    <td>{{ $start_date }}</td>
                </tr>
                <tr>
                    <th>Sampai Tanggal</th>
                    <td></td>
                    <td>{{ $end_date }}</td>
                </tr>
            </table>
        </div>
    @else 
        <p>Dicetak Tanggal : {{ date("d-m-Y") }}</p>
        <p></p>       
        <p></p>       
    @endif
    <div class="page">
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>nis</th>
                    <th>nisn</th>
                    <th>nama_siswa</th>
                    <th>nama_ayah</th>
                    <th>nama_ibu</th>
                    <th>pekerjaan_ayah</th>
                    <th>pekerjaan_ibu</th>
                    <th>pendidikan_ayah</th>
                    <th>pendidikan_ibu</th>
                    <th>jk</th>
                    <th>nik</th>
                    <th>ttl</th>
                    <th>no_telepon</th>
                    <th>asal_sekolah</th>
                    <th>alamat_lengkap</th>
                    <th>kelas</th>
                    <th>agama</th>
                    <th>status_dlm_keluarga</th>
                    <th>anak_ke</th>
                    <th>tahun_masuk</th>
                    <th>no_seri_ijazah</th>
                    <th>no_seri_skhun</th>
                    <th>no_peserta_un</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($siswa as $row)
                <tr >
                    <td style="text-align:center; border: 1px solid black">{{ $loop->iteration }}</td>
                    <td style="text-align:left; border: 1px solid black">{{ $row->nis }}</td>    
                    <td style="text-align:left; border: 1px solid black">{{ $row->nisn }}</td>    
                    <td style="text-align:left; border: 1px solid black">{{ $row->nama_siswa }}</td>    
                    <td style="text-align:left; border: 1px solid black">{{ $row->nama_ayah }}</td>    
                    <td style="text-align:left; border: 1px solid black">{{ $row->nama_ibu }}</td>    
                    <td style="text-align:left; border: 1px solid black">{{ $row->pekerjaan_ayah }}</td>    
                    <td style="text-align:left; border: 1px solid black">{{ $row->pekerjaan_ibu }}</td>    
                    <td style="text-align:left; border: 1px solid black">{{ $row->pendidikan_ayah }}</td>    
                    <td style="text-align:left; border: 1px solid black">{{ $row->pendidikan_ibu }}</td>    
                    <td style="text-align:left; border: 1px solid black">{{ $row->jk }}</td>    
                    <td style="text-align:left; border: 1px solid black">{{ $row->nik }}</td>    
                    <td style="text-align:left; border: 1px solid black">{{ $row->ttl }}</td>    
                    <td style="text-align:left; border: 1px solid black">{{ $row->no_telepon }}</td>    
                    <td style="text-align:left; border: 1px solid black">{{ $row->asal_sekolah }}</td>    
                    <td style="text-align:left; border: 1px solid black">{{ $row->alamat_lengkap }}</td>    
                    <td style="text-align:left; border: 1px solid black">{{ $row->kelas }}</td>    
                    <td style="text-align:left; border: 1px solid black">{{ $row->agama }}</td>    
                    <td style="text-align:left; border: 1px solid black">{{ $row->status_dlm_keluarga }}</td>    
                    <td style="text-align:left; border: 1px solid black">{{ $row->anak_ke }}</td>    
                    <td style="text-align:left; border: 1px solid black">{{ $row->tahun_masuk }}</td>    
                    <td style="text-align:left; border: 1px solid black">{{ $row->no_seri_ijazah }}</td>    
                    <td style="text-align:left; border: 1px solid black">{{ $row->no_seri_skhun }}</td>    
                    <td style="text-align:left; border: 1px solid black">{{ $row->no_peserta_un }}</td> 
                </tr>

                @empty
                <tr>
                    <td colspan="24" class="text-center">Tidak ada data</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</body>
</html>