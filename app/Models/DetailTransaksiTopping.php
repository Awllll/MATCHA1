<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailTransaksiTopping extends Model
{
    protected $table = 'detail_transaksi_topping';

    protected $fillable = [
        'detail_transaksi_id',
        'topping_id',
        'harga_topping_saat_transaksi',
    ];

    public function detailTransaksi()
    {
        return $this->belongsTo(DetailTransaksi::class);
    }

    public function topping()
    {
        return $this->belongsTo(Topping::class);
    }
}
