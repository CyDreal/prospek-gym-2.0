<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Achievement extends Model
{
    protected $fillable = ['trainer_id', 'title', 'description'];

    public function trainer()
    {
        return $this->belongsTo(Trainer::class);
    }
}
