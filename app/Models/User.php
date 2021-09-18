<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * Class User
 * 
 * @property string $id_user
 * @property string $nama
 * @property string $alamat
 * @property string $email
 * @property string $password
 * @property int $role
 * @property int $status
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Collection|Absensi[] $absensis
 * @property Collection|PengajuanIzin[] $pengajuan_izins
 *
 * @package App\Models
 */
class User extends Authenticatable
{
	protected $table = 'user';
	protected $primaryKey = 'id_user';
	public $incrementing = false;

	protected $casts = [
		'role' => 'int',
		'status' => 'int'
	];

	protected $hidden = [
		'password'
	];

	protected $fillable = [
		'nama',
		'alamat',
		'email',
		'password',
		'role',
		'status'
	];

	public function absensis()
	{
		return $this->hasMany(Absensi::class, 'id_user');
	}

	public function pengajuan_izins()
	{
		return $this->hasMany(PengajuanIzin::class, 'id_user');
	}
}
