<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ukuran extends Model
{
    protected $table = 'ukuran';

    protected $fillable = [
        'nama',
        'harga_tambahan',
    ];

    public function detailTransaksi()
    {
        return $this->hasMany(DetailTransaksi::class);
    }
}
