<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\Exportable;


class SiswaExport implements FromView
{
	 use Exportable;

   
     public function view(): View
    {
        $siswa = DB::table('tb_siswa')->get();
        //MENGAMBIL DATA TRANSAKSI BERDASARKAN INVOICE YANG DITERIMA DARI CONTROLLER
        // $penjualan = Penjualan::where('invoice', $this->invoice)
        //     ->with('pelanggan', 'penjualan_detail', 'penjualan_detail.buku')->first();
        //DATA TERSEBUT DIPASSING KE FILE INVOICE_EXCEL
        return view('siswa.report.export', [
            'siswa' => $siswa,
            // 'start_date' => date_format(date_create($this->start_date), "d/m/Y"),
            // 'end_date' => date_format(date_create($this->end_date), "d/m/Y"),
        ]);
    }
}
