<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index(User $user)
    {
        // Ambil semua data pengguna tanpa menyertakan kolom 'username' dan 'password'
        $data = $user->select('name', 'alamat_pos', 'nomor', 'email', 'pekerjaan', 'certificate')
                     ->latest()
                     ->get();

        // Kirim data ke view 'admin.laporan.index'
        return view('admin.laporan.index', compact('data'));
    }
}

