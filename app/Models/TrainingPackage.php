<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TrainingPackage extends Model
{
    protected $fillable = [
        'trainer_id',
        'sessions',
        'duration',
        'price',
        'sessions_count',
        'price_numeric'
    ];

    protected $casts = [
        'price_numeric' => 'decimal:2'
    ];

    public function trainer()
    {
        return $this->belongsTo(Trainer::class);
    }
}
