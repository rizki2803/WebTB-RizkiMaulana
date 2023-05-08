<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Barang
 * 
 * @property string $brg_oid
 * @property string $brg_code
 * @property string $brg_nama
 * @property string $brg_type
 * @property int $brg_harga
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|InvoiceDet[] $invoice_dets
 *
 * @package App\Models
 */
class Barang extends Model
{
	protected $table = 'barang';
	protected $primaryKey = 'brg_oid';
	public $incrementing = false;

	protected $casts = [
		'brg_harga' => 'int'
	];

	protected $fillable = [
		'brg_oid',
		'brg_code',
		'brg_nama',
		'brg_type',
		'brg_harga'
	];

	public function invoice_dets()
	{
		return $this->hasMany(InvoiceDet::class, 'ref_brg_code', 'brg_code');
	}
}
