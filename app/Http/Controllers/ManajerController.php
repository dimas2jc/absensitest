<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PengajuanIzin;
use App\Models\Jenis_izin;
use App\Models\User;
use App\Models\Absensi;
use App\Models\DetailAbsensi;
use Carbon\Carbon;
use DB;

class ManajerController extends Controller
{
    /**
     * Untuk menampilkan view dashboard
     * @data report pegawai yang izin
     */

    public function index()
    {
        $sakit = [];
        for($i=1;$i<=12;$i++)
        {
            
            $date = Carbon::create(date("Y"), $i, 1, 12, 0, 0)->startOfMonth();
            $date_end = Carbon::create(date("Y"), $i, 1, 12, 0, 0)->endOfMonth();

            $sakit[$i] = PengajuanIzin::select(DB::raw('COUNT(id_pengajuan) AS jumlah_pengajuan'))->where(['id_jenis_izin' => "22d842e7494948d087fae0eae6bd11c8", 'status' => 1])->whereBetween(DB::raw('DATE(tgl_mulai)'),[$date,$date_end])->get();

        }

        $cuti = [];
        for($j=1;$j<=12;$j++)
        {
            
            $date = Carbon::create(date("Y"), $j, 1, 12, 0, 0)->startOfMonth();
            $date_end = Carbon::create(date("Y"), $j, 1, 12, 0, 0)->endOfMonth();

            $cuti[$j] = PengajuanIzin::select(DB::raw('COUNT(id_pengajuan) AS jumlah_pengajuan'))->where(['id_jenis_izin' => "41d70a2bc0994802af3eb5f246a3ab0e", 'status' => 1])->whereBetween(DB::raw('DATE(tgl_mulai)'),[$date,$date_end])->get();

        }

        // dd($cuti);
        return view('manajer.dashboard', compact('sakit', 'cuti'));
    }

    /**
     * Untuk menampilkan view pengajuan izin pegawai
     * @data pengajuan izin dari pegawai
     */

    public function pengajuan()
    {
        $data = PengajuanIzin::all();

        return view('manajer.pengajuan', compact('data'));
    }

    /**
     * Untuk approve pengajuan izin pegawai
     * @param $request
     */

    public function pengajuanApprove(Request $request)
    {
        PengajuanIzin::where('id_pengajuan', $request->id)->update([
            'status' => 1,
            'updated_at' => Carbon::now()
        ]);

        return back();
    }

    /**
     * Untuk reject pengajuan izin pegawai
     * @param $request
     */

    public function pengajuanReject(Request $request)
    {
        PengajuanIzin::where('id_pengajuan', $request->id)->update([
            'status' => 2,
            'updated_at' => Carbon::now()
        ]);

        return back();
    }

    /**
     * Untuk menampilkan view laporan
     * @data pegawai
     */

    public function laporan()
    {
        //tanggal pertama bulan ini
    	$date = Carbon::now()->startOfMonth();

	    //tanggal terakhir bulan ini
	    $date_end = Carbon::now()->endOfMonth();

        $data = [];
        $karyawan = User::where('role', 3)->get()->toArray();
        $absensi = Absensi::whereBetween(DB::raw('DATE(absensi.tanggal)'),[$date,$date_end])->get()->toArray();
        $pengajuan_izin = PengajuanIzin::whereBetween(DB::raw('DATE(tgl_mulai)'),[$date,$date_end])->where('status', 1)->get()->toArray();

        for($i = 0; $i < count($karyawan); $i++){
            $data[$i]['nama'] = $karyawan[$i]['nama'];
            $data[$i]['email'] = $karyawan[$i]['email'];
            $data[$i]['sakit'] = 0;
            $data[$i]['cuti'] = 0;
            $data[$i]['invalid'] = 0;
            $data[$i]['valid'] = 0;
            $count = 0;

            // Absensi
            for($j = 0; $j < count($absensi); $j++){
                $id_absensi = $absensi[$j]['id_absensi'];
                $detail_absensi = DetailAbsensi::where('id_absensi', $id_absensi)->get()->toArray();

                if(count($detail_absensi) == 2){
                    $count = 2;
                }

                if($karyawan[$i]['id_user'] == $absensi[$j]['id_user']){
                    if($count == 2){
                        if($absensi[$j]['status'] == 1){
                            $data[$i]['valid'] += 1;
                        }
                        else if($absensi[$j]['status'] == 0){
                            $data[$i]['invalid'] += 1;
                        }
                    }
                }
            }

            // Izin
            for($l = 0; $l < count($pengajuan_izin); $l++){
                if($karyawan[$i]['id_user'] == $pengajuan_izin[$l]['id_user']){
                    if($pengajuan_izin[$l]['jenis_izin'] == "41d70a2bc0994802af3eb5f246a3ab0e"){
                        $data[$i]['cuti'] += $pengajuan_izin[$l]['durasi'];
                    }
                    else if($pengajuan_izin[$l]['jenis_izin'] == "22d842e7494948d087fae0eae6bd11c8"){
                        $data[$i]['sakit'] += $pengajuan_izin[$l]['durasi'];
                    }
                }
            }
        }

        // dd($absensi);
        
        return view('manajer.laporan', compact('data'));
    }
}
