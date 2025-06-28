<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Specialization extends Model
{
    protected $fillable = ['name', 'description'];

    public function trainers()
    {
        return $this->belongsToMany(Trainer::class, 'trainer_specialization');
    }
}
