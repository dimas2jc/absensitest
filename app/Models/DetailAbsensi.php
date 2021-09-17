<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class DetailAbsensi
 * 
 * @property string $id_detail_absensi
 * @property string $id_absensi
 * @property Carbon $jam_masuk
 * @property Carbon $jam_keluar
 * @property string $lokasi
 * 
 * @property Absensi $absensi
 *
 * @package App\Models
 */
class DetailAbsensi extends Model
{
	protected $table = 'detail_absensi';
	protected $primaryKey = 'id_detail_absensi';
	public $incrementing = false;
	public $timestamps = false;

	protected $dates = [
		'jam_masuk',
		'jam_keluar'
	];

	protected $fillable = [
		'id_absensi',
		'jam_masuk',
		'jam_keluar',
		'lokasi'
	];

	public function absensi()
	{
		return $this->belongsTo(Absensi::class, 'id_absensi');
	}
}
