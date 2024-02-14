<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class karyawanController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users|max:255',
                'password' => 'required|string|min:8',
                'role' => 'required|string|in:user,admin',
            ]);

            User::create($request->all());

            return redirect()->route('karyawan.index')->with('success', 'User created successfully');
        } catch (\Exception $e) {
            return redirect()->route('karyawan.create')->with('error', 'Error creating user: ' . $e->getMessage());
        }
    }

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        try {
            $rules = [
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255|unique:users,email,' . $user->id,
                'role' => 'required|string|in:user,admin',
            ];

            // Tambahkan aturan validasi untuk password hanya jika diisi
            if ($request->filled('password')) {
                $rules['password'] = 'nullable|string|min:8';
            }

            $request->validate($rules);

            $data = [
                'name' => $request->name,
                'email' => $request->email,
                'role' => $request->role,
            ];

            // Perbarui password hanya jika diisi
            if ($request->filled('password')) {
                $data['password'] = bcrypt($request->password);
            }

            $user->update($data);

            return redirect()->route('karyawan.index')->with('success', 'User updated successfully');
        } catch (\Exception $e) {
            return redirect()->route('karyawan.edit', $user->id)->with('error', 'Error updating user: ' . $e->getMessage());
        }
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('karyawan.index')->with('success', 'User deleted successfully');
    }
}
