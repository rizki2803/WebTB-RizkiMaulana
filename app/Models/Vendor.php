<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Vendor
 * 
 * @property string $vendor_oid
 * @property string $vendor_code
 * @property string $vendor_nama
 * @property string $vendor_alamat
 * @property string $vendor_tlp
 * @property string $vendor_contact
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|Invoice[] $invoices
 *
 * @package App\Models
 */
class Vendor extends Model
{
	protected $table = 'vendor';
	protected $primaryKey = 'vendor_oid';
	public $incrementing = false;

	protected $fillable = [
		'vendor_oid',
		'vendor_code',
		'vendor_nama',
		'vendor_alamat',
		'vendor_tlp',
		'vendor_contact'
	];

	public function invoices()
	{
		return $this->hasMany(Invoice::class, 'ref_vendor_oid');
	}
}
