<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    protected $table = "pesanan";
    protected $primarykey = "id";
    protected $fillable = ['transaksi_id', 'total_pembelian', 'status', 'user_id', 'bukti_pembayaran', 'kedelai_beli', 'ragi_beli'];

    public function transaksi()
	{
	    return $this->belongsTo('App\Transaksi', 'transaksi_id', 'id');
	}

	public function user()
    {
        return $this->belongsTo('App\User');
    } 
}
