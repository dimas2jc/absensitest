<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Absensi
 * 
 * @property string $id_absensi
 * @property string $id_user
 * @property Carbon $tanggal
 * 
 * @property User $user
 * @property Collection|DetailAbsensi[] $detail_absensis
 *
 * @package App\Models
 */
class Absensi extends Model
{
	protected $table = 'absensi';
	protected $primaryKey = 'id_absensi';
	public $incrementing = false;
	public $timestamps = false;

	protected $dates = [
		'tanggal'
	];

	protected $fillable = [
		'id_user',
		'tanggal'
	];

	public function user()
	{
		return $this->belongsTo(User::class, 'id_user');
	}

	public function detail_absensis()
	{
		return $this->hasMany(DetailAbsensi::class, 'id_absensi');
	}
}
