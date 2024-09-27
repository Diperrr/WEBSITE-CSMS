<?php

namespace App\Http\Controllers;

use App\Models\KuesionerResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\User;



class KuesionerResponseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        // Ambil data pengguna dengan semua kolom yang diperlukan kecuali 'username' dan 'password'
        $data = User::select([
            'id',
            'name',
            'alamat_pos',
            'nomor',
            'email',
            'pekerjaan',
            'berdiri_tahun',
            'manajemen_sejak_tahun',
            'bentuk_usaha',
            'induk_perusahaan_nama',
            'induk_perusahaan_alamat',
            'induk_perusahaan_kota',
            'induk_perusahaan_negara',
            'induk_perusahaan_email_telephone',
            'anak_perusahaan_nama',
            'anak_perusahaan_alamat',
            'anak_perusahaan_kota',
            'anak_perusahaan_negara',
            'anak_perusahaan_email_telephone',
            'prinsipal_perusahaan_nama',
            'prinsipal_perusahaan_alamat',
            'prinsipal_perusahaan_kota',
            'prinsipal_perusahaan_negara',
            'prinsipal_perusahaan_email_telephone',
            'asuransi_penanggung',
            'asuransi_alamat',
            'asuransi_telephone_email',
            'asuransi_jenis_jaminan',
            'asuransi_karyawan',
            'alasan_asuransi',
            'pengadilan_karyawan',
            'alasan_pengadilan',
            'direksi',
            'anak_perusahaan',
            'riwayat',
            'nilai_respon',
            'kategori',
            'certificate'

        ])->when($search, function ($query, $search) {
            return $query->where('name', 'like', "%{$search}%")
                ->orWhere('email', 'like', "%{$search}%")
                ->orWhere('pekerjaan', 'like', "%{$search}%");
        })->get();



        // Ambil semua data user
        $users = User::all();

        // Decode JSON 'direksi', 'anak_perusahaan', dan 'riwayat' untuk setiap user
        foreach ($users as $user) {
            if ($user->direksi) {
                $user->direksi = json_decode($user->direksi, true);
            }

            if ($user->riwayat) {
                $user->riwayat = json_decode($user->riwayat, true);
            }
        }

        // Ambil semua data kuesioner dengan relasi ke user dan kuesioner
        $responses = KuesionerResponse::with(['user', 'kuesioner'])->get();

        // Kirim data ke view
        return view('admin.kuesioner-responses.index', compact('responses', 'users', 'data', 'search'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        foreach ($request->kuesioner_id as $key => $kuesionerId) {
            // Cek apakah response sudah ada
            $response = KuesionerResponse::where('user_id', auth()->id())
                ->where('kuesioner_id', $kuesionerId)
                ->first();
    
            // Jika jawaban sudah ada
            if ($response) {
                // Jika jawaban berubah dari "Ya" ke "Tidak"
                if ($response->jawaban == 'Ya' && $request->jawaban[$kuesionerId] == 'Tidak') {
                    // Hapus file jika jawaban berubah dari "Ya" ke "Tidak"
                    if ($response->lampiran) {
                        Storage::disk('public')->delete($response->lampiran);
                    }
                    // Update jawaban menjadi "Tidak"
                    $response->jawaban = 'Tidak';
                    $response->lampiran = null;
                } else {
                    // Update jawaban dan file jika ada file baru
                    $response->jawaban = $request->jawaban[$kuesionerId];
                    if ($request->hasFile("lampiran.$kuesionerId")) {
                        // Update file jika ada file baru
                        if ($response->lampiran) {
                            // Hapus file lama jika ada
                            Storage::disk('public')->delete($response->lampiran);
                        }
                        $response->lampiran = $request->file("lampiran.$kuesionerId")->store('lampiran', 'public');
                    }
                }
                $response->save();
            } else {
                // Jika belum ada, buat baru
                KuesionerResponse::create([
                    'user_id' => auth()->id(),
                    'kuesioner_id' => $kuesionerId,
                    'jawaban' => $request->jawaban[$kuesionerId],
                    'lampiran' => $request->hasFile("lampiran.$kuesionerId") ? $request->file("lampiran.$kuesionerId")->store('lampiran', 'public') : null,
                ]);
            }
        }
    
        return redirect()->back()->with('success', 'Jawaban berhasil disimpan.');
    }
    

    public function download($file)
    {
        $path = storage_path('app/lampiran/' . $file);

        if (file_exists($path)) {
            return response()->download($path);
        }

        return abort(404, 'File tidak ditemukan');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\KuesionerResponse  $kuesionerResponse
     * @return \Illuminate\Http\Response
     */
    public function show(KuesionerResponse $kuesionerResponse)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\KuesionerResponse  $kuesionerResponse
     * @return \Illuminate\Http\Response
     */
    public function edit(KuesionerResponse $kuesionerResponse)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\KuesionerResponse  $kuesionerResponse
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $response = KuesionerResponse::findOrFail($id);

        // Perbarui jawaban
        $response->jawaban = $request->input('jawaban');

        // Periksa apakah ada file yang diunggah
        if ($request->hasFile('lampiran')) {
            $lampiran = $request->file('lampiran');
            $filePath = $lampiran->store('lampiran', 'public');
            $response->file = $filePath; // Perbarui path file jika diunggah file baru
        }

        $response->save();

        return redirect()->route('admin.kuesioner.index')->with('success', 'Jawaban kuesioner berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\KuesionerResponse  $kuesionerResponse
     * @return \Illuminate\Http\Response
     */
    public function destroy(KuesionerResponse $kuesionerResponse)
    {
        //
    }

    public function rateResponse(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'nilai_respon' => 'required|integer|min:1|max:100',
        ]);

        // Ambil nilai dari input
        $nilai = $request->input('nilai_respon');

        // Tentukan kategori berdasarkan nilai
        if ($nilai > 70 && $nilai <=  100) {
            $kategori = 'High Risk';
        } elseif ($nilai >= 50) {
            $kategori = 'Medium Risk';
        } else if ($nilai <= 35) {
            $kategori = 'low Risk';
        } else {
            $kategori = 'low Risk';
        }

        // Update database dengan nilai dan kategori
        $userResponse = User::find($id);
        $userResponse->nilai_respon = $nilai;
        $userResponse->kategori = $kategori;
        $userResponse->save();

        // Redirect atau tampilkan pesan sukses
        return redirect()->route('admin.kuesioner-responses.index')
            ->with('success', 'Respon berhasil dinilai dengan kategori ' . ucfirst($kategori));
    }

    public function uploadSertifikatIndex($id)
    {
        return view('admin.upload-sertifikat.index');
    }

    public function uploadSertifikatProcess(Request $request, $id)
    {
        $request->validate([
            'certificate' => 'required|file|mimes:pdf,doc,docx|max:5048',
        ]);
    
        $user = User::findOrFail($id);
    
        if ($request->hasFile('certificate')) {
            $file = $request->file('certificate');
            $path = $file->store('certificates', 'public');
    
            // Hapus file lama jika ada
            if ($user->certificate_path) {
                Storage::delete('public/' . $user->certificate);
            }
    
            // Simpan path sertifikat ke database
            $user->certificate = $path;
            $user->save();
        }
    
        return redirect()->back()->with('success', 'Sertifikat berhasil diunggah.');
    }

    public function deleteSertifikat($id)
    {
        $user = User::findOrFail($id);

        // Hapus file sertifikat
        if ($user->certificate) {
            Storage::delete('public/' . $user->certificate);
            $user->certificate = null;
            $user->save();
        }

        return redirect()->back()->with('success', 'Sertifikat berhasil dihapus.');
    }
}
