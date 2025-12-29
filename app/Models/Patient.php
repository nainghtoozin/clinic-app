<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $fillable = [
        'user_id',
        'dob',
        'gender',
        'phone',
        'address',
        'medical_history'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
