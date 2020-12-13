<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Metode extends Model
{
    protected $table = "metode";
    protected $primarykey = "id";
    protected $fillable = ['bni', 'bri', 'mandiri', 'bca', 'btpn', 'ovo', 'gopay', 'dana'];

    public function transaksi()
    {
        return $this->hasOne('App\Transaksi', 'metode_id');
    }
}
