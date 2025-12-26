<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// app/Models/Appointment.php
class Appointment extends Model
{
    protected $fillable = [
        'patient_name',
        'patient_phone',
        'patient_email',
        'service_id',
        'doctor_id',
        'appointment_date',
        'appointment_time',
        'status',
        'note',
    ];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

    public function statusBadge()
    {
        return match ($this->status) {
            'pending'   => 'warning',
            'confirmed' => 'primary',
            'completed' => 'success',
            'cancelled' => 'danger',
        };
    }
}
