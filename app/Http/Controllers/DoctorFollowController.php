<?php
// app/Http/Controllers/DoctorFollowController.php
namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;

class DoctorFollowController extends Controller
{
    public function toggle(Doctor $doctor)
    {
        $patient = auth()->user()->patient;

        if (!$patient) {
            return redirect()->route('login');
        }

        if ($patient->followedDoctors()->where('doctor_id', $doctor->id)->exists()) {
            $patient->followedDoctors()->detach($doctor->id);
            $message = 'Unfollowed doctor';
        } else {
            $patient->followedDoctors()->attach($doctor->id);
            $message = 'Followed doctor';
        }

        return back()->with('success', $message);
    }
}
