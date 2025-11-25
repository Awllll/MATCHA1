<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TingkatKemanisan extends Model
{
    protected $table = 'tingkat_kemanisan'; 
    protected $fillable = ['nama'];

    public function detailTransaksi()
    {
        return $this->hasMany(DetailTransaksi::class);
    }
}
