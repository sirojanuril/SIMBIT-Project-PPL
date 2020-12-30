<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = "transaksi";
    protected $primarykey = "id";
    protected $fillable = ['stok_kedelai', 'stok_ragi', 'harga_kedelai', 'harga_ragi', 'metode', 'rekening', 'foto_product', 'status', 'pengguna_id'];


    public function pengguna()
    {
        return $this->belongsTo('App\Pengguna');
    }

    public function pesanan()
    {
        return $this->hasMany('App\Pesanan');
    }

}
