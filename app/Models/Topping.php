<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topping extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_topping',
        'harga',
        'status',
        'stok',
    ];

    public function detailTransaksiTopping()
    {
        return $this->hasMany(DetailTransaksiTopping::class);
    }
}
