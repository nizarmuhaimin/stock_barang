<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Menampilkan daftar pengguna dengan peran "staff".
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Mengambil semua pengguna dengan peran (role) "staff"
        $staffUsers = User::staff()->get();

        // Mengirimkan data pengguna (users) ke view
        return view('frontend.admin.manajemen-staff', compact('staffUsers'));
    }

    public function tampil()
    {
        // Mengambil semua pengguna dengan peran (role) "staff"
        $staffUsers = User::staff()->get();

        // Mengirimkan data pengguna (users) ke view
        return view('frontend.admin.tampil_staff', compact('staffUsers'));
    }
    public function edit($id)
    {
        // Temukan data staff berdasarkan ID
        $staffUser = User::find($id);

        // Tampilkan view untuk mengedit staff

        return view('frontend.admin.edit_staff', compact('staffUser'));
    }


    /**
     * Memperbarui informasi staff di database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        // Validasi input dari form
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'password' => 'nullable|string|min:8',
            'role' => 'required|string|in:admin,staff', // Sesuaikan dengan peran yang diperbolehkan
        ]);

        // Cari staff berdasarkan ID
        $staff = User::findOrFail($id);

        // Perbarui informasi staff
        $staff->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password ? bcrypt($request->password) : $staff->password,
            'role' => $request->role,
        ]);

        // Redirect ke halaman daftar staff dengan pesan sukses
        return redirect()->route('admin.manajemen.staff')->with('success', 'Staff updated successfully.');
    }

    public function destroy($id)
    {
        // Cari user berdasarkan ID
        $user = User::findOrFail($id);

        // Hapus user
        $user->delete();

        // Redirect kembali dengan pesan sukses
        return redirect()->route('admin.manajemen.staff')->with('success', ' Staff deleted successfully.');
    }

}
