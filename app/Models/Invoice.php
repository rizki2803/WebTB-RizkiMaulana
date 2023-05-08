<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Invoice
 * 
 * @property string $inv_oid
 * @property string $inv_no
 * @property Carbon $inv_tanggal
 * @property int $inv_jumlah
 * @property string $ref_user_oid
 * @property string $ref_vendor_oid
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property User $user
 * @property Vendor $vendor
 * @property Collection|InvoiceDet[] $invoice_dets
 *
 * @package App\Models
 */
class Invoice extends Model
{
	protected $table = 'invoice';
	protected $primaryKey = 'inv_oid';
	public $incrementing = false;

	protected $casts = [
		'inv_tanggal' => 'datetime',
		'inv_jumlah' => 'int'
	];

	protected $fillable = [
		'inv_oid',
		'inv_no',
		'inv_tanggal',
		'inv_jumlah',
		'ref_user_oid',
		'ref_vendor_oid'
	];

	public function user()
	{
		return $this->belongsTo(User::class, 'ref_user_oid');
	}

	public function vendor()
	{
		return $this->belongsTo(Vendor::class, 'ref_vendor_oid');
	}

	public function invoice_dets()
	{
		return $this->hasMany(InvoiceDet::class, 'ref_inv_no', 'inv_no');
	}
}
