<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Keuangan extends Model
{
    protected $table = 'keuangan';
    protected $primaryKey = 'id'; 
    protected $fillable = ['id', 'bahan_baku', 'biaya_tambahan', 'biaya_produksi', 'jumlah_tempe', 'hasil_penjualan', 'hasil_pendapatan'];
}
