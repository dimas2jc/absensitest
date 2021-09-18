<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PengajuanIzin;
use App\Models\JenisIzin;
use App\Models\Absensi;
use App\Models\DetailAbsensi;
use Auth;
use Carbon\Carbon;
use Ramsey\Uuid\Uuid;
use DB;

class KaryawanController extends Controller
{
    /**
     * Untuk menampilkan view absensi
     * status belum absen $check = 0
     * status absen pagi $check = 1
     * status absen sore $check = 2
     */

    public function index()
    {
        $data = Absensi::where('id_user', Auth::user()->id_user)->whereDate('tanggal', date("Y-m-d"))->first();
        if($data == null){
            $check = 0;
        }
        elseif($data != null){
            $detail = DetailAbsensi::where('id_absensi', $data->id_absensi)->get();

            if(count($detail) < 2){
                $check = 1;
            }
            elseif(count($detail) == 2){
                $check = 2;
            }
        }

        // dd($data);

        return view('karyawan.absensi', compact('check'));
    }

    /**
     * Untuk insert data absensi karyawan
     * @param $request
     */

    public function storeAbsensi(Request $request)
    {
        $jam_masuk = null;
        $jam_keluar = null;
        $status = 1;
        $timestamps = Carbon::now();
        $absensi = Absensi::where('id_user', Auth::user()->id_user)->whereDate('tanggal', date("Y-m-d"))->get();

        if(count($absensi) == 0){
            $jam_masuk = $timestamps;

            $create_masuk = date_create(date("Y-m-d", strtotime($jam_masuk))." 09:00:00");
            $check_jam_masuk = date_diff( date_create($jam_masuk), $create_masuk);

            if($check_jam_masuk->h <= 0 && $check_jam_masuk->i <= 0 && $check_jam_masuk->s < 0 && $jam_masuk != null){
                $status = 0;
            }

            Absensi::insert([
                'id_absensi' => Uuid::uuid4()->getHex(),
                'id_user' => Auth::user()->id_user,
                'tanggal' => $request->tanggal,
                'status' => $status
            ]);
        }
        else{
            $jam_keluar = $timestamps;

            $create_keluar = date_create(date("Y-m-d", strtotime($jam_keluar))." 17:00:00");
            $check_jam_keluar = date_diff( date_create($jam_masuk), $create_keluar);

            if($check_jam_keluar->h >= 0 && $check_jam_keluar->i >= 0 && $check_jam_keluar->s > 0 && $jam_keluar != null){
                $status = 0;
            }

            if($absensi[0]->status == 1){
                Absensi::where(['id_user' => Auth::user()->id_user, 'tanggal' => $request->tanggal])->update(['status' => $status]);
            }
        }

        $id = Absensi::where(['id_user' => Auth::user()->id_user, 'tanggal' => $request->tanggal])->first();

        if($jam_masuk != null){
            DetailAbsensi::insert([
                'id_detail_absensi' => Uuid::uuid4()->getHex(),
                'id_absensi' => $id->id_absensi,
                'jam_masuk' => $jam_masuk,
                'lokasi' => "https://maps.google.com/maps?q=-6.1787019, 106.8295072&z=15&output=embed"
            ]);
        }
        elseif ($jam_keluar != null) {
            DetailAbsensi::insert([
                'id_detail_absensi' => Uuid::uuid4()->getHex(),
                'id_absensi' => $id->id_absensi,
                'jam_keluar' => $jam_keluar,
                'lokasi' => "https://maps.google.com/maps?q=-6.1787019, 106.8295072&z=15&output=embed"
            ]);
        }

        // dd($absensi);

        return redirect('karyawan/absensi');
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
