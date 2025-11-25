<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
     protected $table = 'transaksi';

    protected $fillable = [
        'pengguna_id',
        'metode_pembayaran_id',
        'nama_pembeli',
        'total_harga',
    ];

    public function pengguna()
    {
        return $this->belongsTo(Pengguna::class);
    }

    public function metodePembayaran()
    {
        return $this->belongsTo(MetodePembayaran::class);
    }

    public function detail()
    {
        return $this->hasMany(DetailTransaksi::class);
    }
}
