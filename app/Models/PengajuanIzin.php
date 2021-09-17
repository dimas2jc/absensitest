<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PengajuanIzin
 * 
 * @property string $id_pengajuan
 * @property string $id_jenis_izin
 * @property string $id_user
 * @property Carbon $tgl_mulai
 * @property Carbon $tgl_selesai
 * @property string $durasi
 * @property int $status
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property JenisIzin $jenis_izin
 * @property User $user
 *
 * @package App\Models
 */
class PengajuanIzin extends Model
{
	protected $table = 'pengajuan_izin';
	protected $primaryKey = 'id_pengajuan';
	public $incrementing = false;

	protected $casts = [
		'status' => 'int'
	];

	protected $dates = [
		'tgl_mulai',
		'tgl_selesai'
	];

	protected $fillable = [
		'id_jenis_izin',
		'id_user',
		'tgl_mulai',
		'tgl_selesai',
		'durasi',
		'status'
	];

	public function jenis_izin()
	{
		return $this->belongsTo(JenisIzin::class, 'id_jenis_izin');
	}

	public function user()
	{
		return $this->belongsTo(User::class, 'id_user');
	}
}
