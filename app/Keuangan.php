<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Keuangan extends Model
{
    protected $table = 'keuangan';
    protected $primaryKey = 'id'; 
    protected $fillable = ['id', 'bahan_baku', 'biaya_tambahan', 'biaya_produksi', 'jumlah_tempe', 'hasil_penjualan', 'hasil_pendapatan'];

    
    
    public function total_biaya_produksi()
    {
        return $this->sum('biaya_produksi');
    }

    public function total_hasil_penjualan()
    {
        return $this->sum('hasil_penjualan');
    }

    public function total_hasil_pendapatan()
    {
        return $this->sum('hasil_pendapatan');
    }

    public function filter_biaya_produksi($tanggal_awal, $tanggal_akhir)
    {
        return $this->whereBetween('created_at', [$tanggal_awal, $tanggal_akhir])->sum('biaya_produksi');
    }

    public function filter_hasil_penjualan($tanggal_awal, $tanggal_akhir)
    {
        return $this->whereBetween('created_at', [$tanggal_awal, $tanggal_akhir])->sum('hasil_penjualan');
    }

    public function filter_hasil_pendapatan($tanggal_awal, $tanggal_akhir)
    {
        return $this->whereBetween('created_at', [$tanggal_awal, $tanggal_akhir])->sum('hasil_pendapatan');
    }
}
