<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $fillable = [
    	'nama_produk',
    	'harga',
    	'stok',
    	'gambar',
    ];
}
