<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class JenisIzin
 * 
 * @property string $id_jenis_izin
 * @property string $nama
 * 
 * @property Collection|PengajuanIzin[] $pengajuan_izins
 *
 * @package App\Models
 */
class JenisIzin extends Model
{
	protected $table = 'jenis_izin';
	protected $primaryKey = 'id_jenis_izin';
	public $incrementing = false;
	public $timestamps = false;

	protected $fillable = [
		'nama'
	];

	public function pengajuan_izins()
	{
		return $this->hasMany(PengajuanIzin::class, 'id_jenis_izin');
	}
}
