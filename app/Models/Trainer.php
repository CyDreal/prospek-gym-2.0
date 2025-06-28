<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Trainer extends Model
{
    protected $fillable = [
        'name',
        'role',
        'image',
        'description',
        'type',
        'instagram_link',
        'whatsapp_link',
        'specializations_title'
    ];

    // Relationship dengan Specializations (Many-to-Many)
    public function specializations()
    {
        return $this->belongsToMany(Specialization::class, 'trainer_specialization');
    }

    // Relationship dengan Training Packages (One-to-Many)
    public function trainingPackages()
    {
        return $this->hasMany(TrainingPackage::class);
    }

    // Relationship dengan Achievements (One-to-Many)
    public function achievements()
    {
        return $this->hasMany(Achievement::class);
    }

    // Accessor untuk format sesuai frontend
    public function getFormattedDataAttribute()
    {
        return [
            'name' => $this->name,
            'role' => $this->role,
            'image' => $this->image,
            'specializations_title' => $this->specializations_title,
            'specializations' => $this->specializations->pluck('name')->toArray(),
            'packages' => $this->trainingPackages->map(function($package) {
                return [
                    'sessions' => $package->sessions,
                    'duration' => $package->duration,
                    'price' => $package->price
                ];
            })->toArray(),
            'achievements' => $this->achievements->pluck('title')->toArray(),
            'instagram' => $this->instagram_link,
            'whatsapp' => $this->whatsapp_link,
        ];
    }
}
