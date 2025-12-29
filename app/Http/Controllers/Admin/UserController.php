<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Patient;
use Illuminate\Http\Request;
use DB;

class UserController extends Controller
{
    public function index()
    {
        $users = User::latest()->paginate(10);
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {

        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'username' => 'required|unique:users',
            'email' => 'required|unique:users',
            'password' => 'required|min:6',
            'role' => 'required'
        ]);

        DB::transaction(function () use ($request) {

            $user = User::create([
                'name' => $request->name,
                'username' => $request->username,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'role' => $request->role,
                'status' => 'active',
            ]);

            if ($request->role === 'patient') {
                Patient::create([
                    'user_id' => $user->id,
                    'dob' => $request->dob,
                    'gender' => $request->gender,
                    'phone' => $request->phone,
                    'address' => $request->address,
                ]);
            }
        });

        return redirect()->route('users.index')->with('success', 'User created');
    }

    public function edit(User $user)
    {
        $user->load('patient');
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        DB::transaction(function () use ($request, $user) {

            $oldRole = $user->role;
            $user->update($request->only('name', 'email', 'role', 'status'));

            if ($oldRole === 'patient' && $request->role !== 'patient') {
                $user->patient()?->delete();
            }

            if ($request->role === 'patient') {
                Patient::updateOrCreate(
                    ['user_id' => $user->id],
                    $request->only('dob', 'gender', 'phone', 'address')
                );
            }
        });

        return back()->with('success', 'Updated');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return back()->with('success', 'Deleted');
    }
}
