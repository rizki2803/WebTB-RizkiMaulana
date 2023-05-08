<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class User
 * 
 * @property string $user_oid
 * @property string $user_code
 * @property string $user_nama
 * @property string $user_alamat
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|Invoice[] $invoices
 *
 * @package App\Models
 */
class User extends Model
{
	protected $table = 'user';
	protected $primaryKey = 'user_oid';
	public $incrementing = false;

	protected $fillable = [
		'user_oid',
		'user_code',
		'user_nama',
		'user_alamat'
	];

	public function invoices()
	{
		return $this->hasMany(Invoice::class, 'ref_user_oid');
	}
}
