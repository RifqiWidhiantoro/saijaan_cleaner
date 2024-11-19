<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $fillable = [
        'address',
        'description',
        'photo_path',
        'latitude',
        'longitude',
    ];

    // Relasi dengan CleaningProgress
    public function cleaningProgress()
    {
        return $this->hasOne(CleaningProgress::class);
    }
}
