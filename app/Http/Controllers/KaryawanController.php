<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PengajuanIzin;
use App\Models\JenisIzin;
use Auth;
use Carbon\Carbon;
use Ramsey\Uuid\Uuid;

class KaryawanController extends Controller
{
    /**
     * Untuk menampilkan view absensi
     */

    public function index()
    {
        return view('karyawan.absensi');
    }

    /**
     * Untuk menampilkan view pengajuan izin
     */

    public function pengajuan()
    {
        $data = PengajuanIzin::select('pengajuan_izin.*', 'ji.nama as jenis_izin')
                ->join('jenis_izin as ji', 'ji.id_jenis_izin', '=', 'pengajuan_izin.id_jenis_izin')
                ->where('id_user', Auth::user()->id_user)
                ->get();
        $jenis_izin = JenisIzin::all();

        return view('karyawan.pengajuan', compact('data', 'jenis_izin'));
    }

    /**
     * Untuk insert data pengajuan izin
     * @param $request
     */

    public function storePengajuan(Request $request)
    {
        $request->validate([
            'jenis_izin' => 'required',
            'tgl_mulai' => 'required|date',
            'tgl_selesai' => 'required|date'
        ]);

        $durasi = date_diff(date_create($request->tgl_mulai), date_create($request->tgl_selesai));
        $durasi = $durasi->d + 1;

        PengajuanIzin::insert([
            'id_pengajuan' => Uuid::uuid4()->getHex(),
            'id_user' => Auth::user()->id_user,
            'id_jenis_izin' => $request->jenis_izin,
            'tgl_mulai' => $request->tgl_mulai,
            'tgl_selesai' => $request->tgl_selesai,
            'durasi' => $durasi,
            'status' => 0,
            'created_at' => Carbon::now()
        ]);

        return back();
    }
}
