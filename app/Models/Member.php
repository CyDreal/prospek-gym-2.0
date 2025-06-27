<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Member extends Model
{
    protected $fillable = ['name', 'alamat', 'phone', 'paket_nama', 'status'];

    public function getRouteKeyName()
    {
        return 'id';
    }
}
