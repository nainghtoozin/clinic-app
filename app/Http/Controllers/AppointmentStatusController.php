<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\Doctor;

class AppointmentStatusController extends Controller
{
    public function update(Request $request, Appointment $appointment)
    {
        $request->validate([
            'status' => 'required|in:confirmed,completed,cancelled',
        ]);

        // 🔐 Authorization (Doctor can update ONLY his appointments)
        if (auth()->user()->role === 'doctor') {

            $doctor = Doctor::where('user_id', auth()->id())->first();

            if ($appointment->doctor_id !== $doctor->id) {
                abort(403, 'Unauthorized action');
            }
        }

        // Admin can update all
        $appointment->update([
            'status' => $request->status,
        ]);

        return back()->with('success', 'Appointment status updated.');
    }
}
