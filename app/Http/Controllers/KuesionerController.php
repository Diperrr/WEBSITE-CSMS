<?php

namespace App\Http\Controllers;

use App\Models\Kuesioner;
use App\Http\Controllers\Controller;
use App\Models\KuesionerResponse;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KuesionerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Ambil semua kuesioner
        $kuesioners = Kuesioner::all();

        // Ambil respons user yang sudah dijawab
        $userId = auth()->user()->id;
        $responsesFromDB = KuesionerResponse::where('user_id', $userId)->get();

        // Buat array untuk menyimpan respons user
        $responses = [];

        foreach ($responsesFromDB as $response) {
            $responses[$response->kuesioner_id] = [
                'jawaban' => $response->jawaban,
                'lampiran' => $response->lampiran, // Pastikan kolom lampiran ada di tabel
            ];
        }

        // Kirimkan data ke view
        return view('admin.kuesioner.index', compact('kuesioners', 'responses'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kuesioner  $kuesioner
     * @return \Illuminate\Http\Response
     */
    public function show(Kuesioner $kuesioner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kuesioner  $kuesioner
     * @return \Illuminate\Http\Response
     */
    public function edit(Kuesioner $kuesioner)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kuesioner  $kuesioner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kuesioner $kuesioner)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kuesioner  $kuesioner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kuesioner $kuesioner)
    {
        //
    }

    public function downloadSertifikat($id)
{
    // Cari user berdasarkan ID
    $user = User::findOrFail($id);

    // Pastikan user memiliki path sertifikat
    if ($user->certificate && Storage::exists('public/' . $user->certificate_path)) {
        // Kembalikan halaman view untuk download
        return view('admin.download-sertifikat.index', compact('user'));
    } else {
        return redirect()->back()->with('error', 'Sertifikat tidak ditemukan.');
    }
}

    
}
