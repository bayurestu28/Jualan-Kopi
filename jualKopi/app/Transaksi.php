<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $fillable = [
    	'id_customer',
    	'id_kurir',
    	'biaya',
    	'waktu_transaksi',
    	'pemesan',
    	'alamat_pemesan',
    	'nohp_pemesan',
    	'jenis_pengiriman',
    	'status_transaksi',
    ];
}
