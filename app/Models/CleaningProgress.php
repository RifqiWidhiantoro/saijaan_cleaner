<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CleaningProgress extends Model
{
    use HasFactory;

    protected $fillable = [
        'report_id',
        'before_photo',
        'during_photo',
        'after_photo',
    ];

    // Relasi dengan Report
    public function report()
    {
        return $this->belongsTo(Report::class);
    }
}
