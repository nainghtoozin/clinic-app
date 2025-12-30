<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'content',
        'image',
        'doctor_id',
        'is_published'
    ];

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }
}
