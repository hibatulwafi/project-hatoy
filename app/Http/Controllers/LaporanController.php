<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class LaporanController extends Controller
{
    public function harian()
    {
        return view('laporan.harian');
    }

    public function bulanan()
    {
        return view('laporan.bulanan');
    }

    public function semester()
    {
        return view('laporan.semester');
    }
}
