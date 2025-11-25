<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Topping extends Model
{
     protected $table = 'topping';

    protected $fillable = [
        'nama',
        'harga',
        'stok',
    ];

    public function detailTransaksiTopping()
    {
        return $this->hasMany(DetailTransaksiTopping::class);
    }
}
