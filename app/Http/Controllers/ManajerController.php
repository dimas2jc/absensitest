<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ManajerController extends Controller
{
    /**
     * Untuk menampilkan view dashboard
     * @data report pegawai yang izin
     */

    public function index()
    {
        return view('manajer.dashboard');
    }

    /**
     * Untuk menampilkan view pengajuan izin pegawai
     * @data pengajuan izin dari pegawai
     */

    public function pengajuan()
    {
        return view('manajer.pengajuan');
    }

    /**
     * Untuk menampilkan view laporan
     * @data pegawai
     */

    public function laporan()
    {
        return view('manajer.laporan');
    }
}
