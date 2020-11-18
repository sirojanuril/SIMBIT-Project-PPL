<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produksi extends Model
{
    protected $table = 'produksi';
    protected $fillable = ['kedelai', 'ragi', 'hasil_produksi', 'kadaluarsa'];
}
