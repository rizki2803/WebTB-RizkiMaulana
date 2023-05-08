<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class InvoiceDet
 * 
 * @property string $invd_oid
 * @property string $ref_inv_no
 * @property string $ref_brg_code
 * @property int $invd_qty
 * @property int $invd_jml
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Barang $barang
 * @property Invoice $invoice
 *
 * @package App\Models
 */
class InvoiceDet extends Model
{
	protected $table = 'invoice_det';
	protected $primaryKey = 'invd_oid';
	public $incrementing = false;

	protected $casts = [
		'invd_qty' => 'int',
		'invd_jml' => 'int'
	];

	protected $fillable = [
		'invd_oid',
		'ref_inv_no',
		'ref_brg_code',
		'invd_qty',
		'invd_jml'
	];

	public function barang()
	{
		return $this->belongsTo(Barang::class, 'ref_brg_code', 'brg_code');
	}

	public function invoice()
	{
		return $this->belongsTo(Invoice::class, 'ref_inv_no', 'inv_no');
	}
}
