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

    public function scopeSearch($query, $term)
    {
        return $query->where('name', 'like', "%{$term}%")
            ->orWhere('alamat', 'like', "%{$term}%")
            ->orWhere('phone', 'like', "%{$term}%");
    }
}
