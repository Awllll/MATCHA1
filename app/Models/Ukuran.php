<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ukuran extends Model
{
    use HasFactory;

    protected $table = 'ukurans';
    protected $fillable = [
        'nama_ukuran',
        'harga_tambahan',
        'stok',
    ];

    public function detailTransaksi()
    {
        return $this->hasMany(DetailTransaksi::class);
    }
}
