<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $fillable = ['specialization', 'phone', 'address', 'image', 'service_id', 'experience', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }

    public function blogs()
    {
        return $this->hasMany(Blog::class);
    }

    // app/Models/Doctor.php
    public function followers()
    {
        return $this->belongsToMany(
            Patient::class,
            'doctor_patient'
        )->withTimestamps();
    }
}
