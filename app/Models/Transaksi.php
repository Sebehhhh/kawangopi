<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    protected $table = 'transaksi';

    protected $fillable = [
        'produk_id',
        'quantity',
    ];

    /**
     * Get the category that owns the product.
     */
    public function produk()
    {
        return $this->belongsTo(Produk::class);
    }
}
