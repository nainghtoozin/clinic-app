<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\User;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class DoctorController extends Controller
{
    /**
     * 📌 List all doctors
     */
    public function index()
    {
        $doctors = Doctor::with(['user', 'service'])
            ->latest()
            ->paginate(10);

        return view('doctors.index', compact('doctors'));
    }

    /**
     * 📌 Show create form
     */
    public function create()
    {
        $services = Service::where('is_active', true)->get();

        return view('doctors.create', compact('services'));
    }

    /**
     * 📌 Store doctor + user (Transaction)
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            // USER
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',

            // DOCTOR
            'specialization' => 'required|string|max:255',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpg,webp,jpeg,png|max:2048',
            'service_id' => 'required|exists:services,id',
            'experience' => 'nullable|numeric|min:0',
        ]);

        DB::transaction(function () use ($validated, $request) {

            // 1️⃣ Create user
            $user = User::create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'password' => Hash::make($validated['password']),
                'username' => strtolower(str_replace(' ', '_', $validated['name'])),
            ]);

            // 2️⃣ Upload image
            $imagePath = null;
            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('doctors', 'public');
            }

            // 3️⃣ Create doctor
            Doctor::create([
                'specialization' => $validated['specialization'],
                'phone' => $validated['phone'] ?? null,
                'address' => $validated['address'] ?? null,
                'image' => $imagePath,
                'service_id' => $validated['service_id'],
                'experience' => $validated['experience'] ?? null,
                'user_id' => $user->id,
            ]);
        });

        return redirect()->route('doctors.index')
            ->with('success', 'Doctor created successfully');
    }

    /**
     * 📌 Show edit form
     */
    public function edit(Doctor $doctor)
    {
        $services = Service::where('is_active', true)->get();
        $doctor->load('user');

        return view('doctors.edit', compact('doctor', 'services'));
    }

    /**
     * 📌 Update doctor + user
     */
    public function update(Request $request, Doctor $doctor)
    {
        $validated = $request->validate([
            // USER
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $doctor->user_id,
            'password' => 'nullable|string|min:6',

            // DOCTOR
            'specialization' => 'required|string|max:255',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpg,webp,jpeg,png|max:2048',
            'service_id' => 'required|exists:services,id',
            'experience' => 'nullable|numeric|min:0',
        ]);

        DB::transaction(function () use ($validated, $request, $doctor) {

            // 1️⃣ Update user
            $userData = [
                'name' => $validated['name'],
                'email' => $validated['email'],
                'username' => strtolower(str_replace(' ', '_', $validated['name'])),
            ];

            if (!empty($validated['password'])) {
                $userData['password'] = Hash::make($validated['password']);
            }

            $doctor->user->update($userData);

            // 2️⃣ Update image
            $doctorData = [
                'specialization' => $validated['specialization'],
                'phone' => $validated['phone'] ?? null,
                'address' => $validated['address'] ?? null,
                'service_id' => $validated['service_id'],
                'experience' => $validated['experience'] ?? null,
            ];

            if ($request->hasFile('image')) {
                if ($doctor->image) {
                    Storage::disk('public')->delete($doctor->image);
                }
                $doctorData['image'] = $request->file('image')->store('doctors', 'public');
            }

            $doctor->update($doctorData);
        });

        return redirect()->route('doctors.index')
            ->with('success', 'Doctor updated successfully');
    }

    /**
     * 📌 Delete doctor + user
     */
    public function destroy(Doctor $doctor)
    {
        DB::transaction(function () use ($doctor) {

            // delete image
            if ($doctor->image) {
                Storage::disk('public')->delete($doctor->image);
            }

            // delete user (doctor will cascade)
            $doctor->user()->delete();
        });

        return back()->with('success', 'Doctor deleted successfully');
    }
}
