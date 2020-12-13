<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = "transaksi";
    protected $primarykey = "id";
    protected $fillable = ['stok_kedelai', 'stok_ragi', 'harga_kedelai', 'harga_ragi', 'pengguna_id', 'metode_id'];


    public function pengguna()
    {
        return $this->belongsTo('App\Pengguna');
    }

    public function metode()
    {
        return $this->belongsTo('App\Metode');
    }

    public function pesanan()
    {
        return $this->hasMany('App\Pesanan');
    }

}
