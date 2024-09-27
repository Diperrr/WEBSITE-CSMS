<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        // Validasi data yang masuk
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'password' => 'required|string|confirmed|min:8',
            'alamat_pos' => 'nullable|string|max:255',
            'nomor' => 'nullable|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'pekerjaan' => 'nullable|string|max:255',
            'berdiri_tahun' => 'nullable|string|max:255',
            'manajemen_sejak_tahun' => 'nullable|string|max:255',
            'bentuk_usaha' => 'nullable|string|max:255',
            'direksi' => 'required|array',
            'direksi.*.jabatan' => 'required|string|max:255',
            'direksi.*.nama' => 'required|string|max:255',
            'direksi.*.pendidikan' => 'required|string|max:255',
            'direksi.*.masa_kerja' => 'required|integer|min:0',
            'anak_perusahaan_nama' => 'nullable|string|max:255',
            'anak_perusahaan_alamat' => 'nullable|string|max:255',
            'anak_perusahaan_kota' => 'nullable|string|max:255',
            'anak_perusahaan_negara' => 'nullable|string|max:255',
            'anak_perusahaan_email_telephone' => 'nullable|string|max:255',
            'induk_perusahaan_nama' => 'nullable|string|max:255',
            'induk_perusahaan_alamat' => 'nullable|string|max:255',
            'induk_perusahaan_kota' => 'nullable|string|max:255',
            'induk_perusahaan_negara' => 'nullable|string|max:255',
            'induk_perusahaan_email_telephone' => 'nullable|string|max:255',
            'prinsipal_perusahaan_nama' => 'nullable|string|max:255',
            'prinsipal_perusahaan_alamat' => 'nullable|string|max:255',
            'prinsipal_perusahaan_kota' => 'nullable|string|max:255',
            'prinsipal_perusahaan_negara' => 'nullable|string|max:255',
            'prinsipal_perusahaan_email_telephone' => 'nullable|string|max:255',
            'asuransi_penanggung' => 'nullable|string|max:255',
            'asuransi_alamat' => 'nullable|string|max:255',
            'asuransi_telephone_email' => 'nullable|string|max:255',
            'asuransi_jenis_jaminan' => 'nullable|string|max:255',
            'asuransi_karyawan' => 'required|string|in:ya,tidak',
            'alasan_asuransi' => 'nullable|string|max:255',
            'pengadilan_karyawan' => 'required|string|in:ya,tidak',
            'alasan_pengadilan' => 'nullable|string|max:255',
            'riwayat' => 'required|array',
            'riwayat.*.nama_perusahaan_pemberi_pekerjaan' => 'required|string|max:255',
            'riwayat.*.jenis_pekerjaan' => 'required|string|max:255',
            'riwayat.*.nilai_kontrak' => 'required|numeric|min:0',
            'riwayat.*.telepon_fax_rw' => 'nullable|string|max:255',
            'sertifikat' => 'required|string|in:ya,tidak',
            'certificate' => 'nullable|file|mimes:pdf,jpg,png|max:5048|required_if:sertifikat,ya', // Validasi hanya jika 'sertifikat' = 'ya'
        ]);

        // Cek jika sertifikat dijawab 'ya', file diupload, kalau tidak, null
        if ($request->sertifikat === 'ya') {
            // Simpan file sertifikat
            $certificatePath = $request->file('certificate')->store('certificates', 'public');
        } else {
            // Set null jika 'tidak'
            $certificatePath = null;
        }

        // Buat user baru dengan data yang sudah divalidasi
        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'alamat_pos' => $request->alamat_pos,
            'nomor' => $request->nomor,
            'email' => $request->email,
            'pekerjaan' => $request->pekerjaan,
            'berdiri_tahun' => $request->berdiri_tahun,
            'manajemen_sejak_tahun' => $request->manajemen_sejak_tahun,
            'bentuk_usaha' => $request->bentuk_usaha,
            'induk_perusahaan_nama' => $request->induk_perusahaan_nama,
            'induk_perusahaan_alamat' => $request->induk_perusahaan_alamat,
            'induk_perusahaan_kota' => $request->induk_perusahaan_kota,
            'induk_perusahaan_negara' => $request->induk_perusahaan_negara,
            'induk_perusahaan_email_telephone' => $request->induk_perusahaan_email_telephone,
            'direksi' => json_encode($request->direksi),
            'anak_perusahaan_nama' => $request->anak_perusahaan_nama,
            'anak_perusahaan_alamat' => $request->anak_perusahaan_alamat,
            'anak_perusahaan_kota' => $request->anak_perusahaan_kota,
            'anak_perusahaan_negara' => $request->anak_perusahaan_negara,
            'anak_perusahaan_email_telephone' => $request->anak_perusahaan_email_telephone,
            'prinsipal_perusahaan_nama' => $request->prinsipal_perusahaan_nama,
            'prinsipal_perusahaan_alamat' => $request->prinsipal_perusahaan_alamat,
            'prinsipal_perusahaan_kota' => $request->prinsipal_perusahaan_kota,
            'prinsipal_perusahaan_negara' => $request->prinsipal_perusahaan_negara,
            'prinsipal_perusahaan_email_telephone' => $request->prinsipal_perusahaan_email_telephone,
            'asuransi_penanggung' => $request->asuransi_penanggung,
            'asuransi_alamat' => $request->asuransi_alamat,
            'asuransi_telephone_email' => $request->asuransi_telephone_email,
            'asuransi_jenis_jaminan' => $request->asuransi_jenis_jaminan,
            'asuransi_karyawan' => $request->asuransi_karyawan,
            'alasan_asuransi' => $request->alasan_asuransi,
            'pengadilan_karyawan' => $request->pengadilan_karyawan,
            'alasan_pengadilan' => $request->alasan_pengadilan,
            'riwayat' => json_encode($request->riwayat),
            'certificate' => $certificatePath, // Simpan path sertifikat atau null
        ]);

        $user->assignRole('User');

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
