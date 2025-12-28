<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Product;
use App\Models\Service;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;

class PublicDoctorController extends Controller
{
    public function index()
    {
        $services = Service::all();
        $products = Product::where('is_active', true)->get();
        $doctors = Doctor::with(['user', 'service'])
            ->latest()
            ->paginate(10);
        $appointments = Appointment::all();
        return view('public.doctors.index', compact('doctors', 'services', 'appointments', 'products'));
    }
}
