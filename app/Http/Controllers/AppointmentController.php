<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Service;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    // AppointmentController.php
    public function index()
    {
        $user = auth()->user();

        // Admin → All appointments
        if ($user->isAdmin()) {
            $appointments = Appointment::with('doctor.user')->latest()->paginate();
        }

        // Doctor → Only own appointments
        elseif ($user->isDoctor()) {
            $doctorId = $user->doctor->id;

            $appointments = Appointment::where('doctor_id', $doctorId)
                ->with('doctor.user')
                ->latest()
                ->paginate();
        } else {
            abort(403);
        }

        return view('appointments.index', compact('appointments'));
    }

    // Appointment Form
    public function create(Doctor $doctor)
    {
        $doctor->load('service', 'user');

        return view('appointments.create', compact('doctor'));
    }

    // Store Appointment (SECURE WAY)
    public function store(Request $request, Doctor $doctor)
    {
        $request->validate([
            'patient_name' => 'required|string|max:255',
            'patient_phone' => 'nullable|string',
            'appointment_date' => 'required|date',
            'appointment_time' => 'required',
        ]);

        // 🔐 IMPORTANT PART
        Appointment::create([
            'patient_name'     => $request->patient_name,
            'patient_phone'    => $request->patient_phone,
            'doctor_id'        => $doctor->id,                 // backend
            'service_id'       => $doctor->service_id,         // backend
            'price'            => $doctor->service->price,     // backend
            'appointment_date' => $request->appointment_date,
            'appointment_time' => $request->appointment_time,
            'status'           => 'pending',
        ]);

        return redirect()->route('public.doctors')->with('success', 'Appointment booked successfully!');
    }

    public function show(Appointment $appointment)
    {
        $appointment->load('doctor.user', 'service');

        return view('appointments', compact('appointment'));
    }
}
