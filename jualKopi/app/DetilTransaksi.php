<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetilTransaksi extends Model
{
    protected $table = 'detil_transaksis';

    protected $fillable = [
    	'id_produk',
    	'id_transaksi',
    	'jumlah'
    ];
}
