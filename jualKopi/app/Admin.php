<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use Notifiable;

    protected $guard = 'admin';

    protected $fillable = [
        'username',
        'password',
        'nama',
        'alamat',
        'tanggal_lahir',
        'no_telp',
        'jenis_kelamin',
    ];

    protected $hidden = [
        'password'
    ];


}
