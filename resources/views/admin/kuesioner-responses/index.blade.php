<x-app-layout>
    <x-slot name="title">Daftar Respon Kuesioner</x-slot>

    @if (session()->has('success'))
        <x-alert type="success" message="{{ session()->get('success') }}" />
    @endif

    <x-card>
        <x-slot name="title">Respon Kuesioner</x-slot>

        <form action="{{ route('admin.kuesioner-responses.index') }}" method="GET" class="d-flex gap-2 mb-2">
            <input class="form-control" type="text" name="search" placeholder="Cari pengguna..."
                value="{{ request('search') }}">
            <button class="btn btn-primary" type="submit">Cari</button>
        </form>

        <!-- Accordion Responses -->
        <div class="accordion" id="accordionResponses">
            @foreach ($responses->groupBy('user_id') as $userResponses)
                @php
                    $firstResponse = $userResponses->first();
                    $userId = $firstResponse->user->id;
                    $userDetail = $data->firstWhere('id', $userId);
                @endphp
                <div class="accordion-item">
                    @if ($userDetail)
                        <h2 class="accordion-header" id="heading{{ $userId }}">
                            <button class="accordion-button folder-header" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapse{{ $userId }}" aria-expanded="true"
                                aria-controls="collapse{{ $userId }}">
                                &#128193; {{ $userDetail ? $userDetail->name : 'Nama Tidak Tersedia' }}
                            </button>
                        </h2>
                        <div id="collapse{{ $userId }}" class="accordion-collapse collapse"
                            aria-labelledby="heading{{ $userId }}" data-bs-parent="#accordionResponses">
                            <div class="accordion-body">
                                <!-- Detail Pengguna -->
                                @if ($userDetail)
                                    <x-card>
                                        <x-slot name="title">Detail Pengguna</x-slot>
                                        <div class="mb-3">
                                            <!-- Nama Perusahaan -->
                                            <h4>Nama Perusahaan</h4>
                                            <table class="table">
                                                <tr>
                                                    <td><strong>Nama Perusahaan</strong></td>
                                                    <td>:</td>
                                                    <td>{{ $userDetail->name }}</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Alamat Pos</strong></td>
                                                    <td>:</td>
                                                    <td>{{ $userDetail->alamat_pos }}</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Nomor Telephone/Fax</strong></td>
                                                    <td>:</td>
                                                    <td>{{ $userDetail->nomor }}</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Email</strong></td>
                                                    <td>:</td>
                                                    <td>{{ $userDetail->email }}</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Pekerjaan</strong></td>
                                                    <td>:</td>
                                                    <td>{{ $userDetail->pekerjaan }}</td>
                                                </tr>
                                            </table>

                                            <!-- Data Direksi -->
                                            <h4>Data Direksi</h4>
                                            @foreach ($users as $user)
                                                @if (!empty($user->direksi))
                                                    <table class="table table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <th>No.</th>
                                                                <th>Jabatan</th>
                                                                <th>Nama</th>
                                                                <th>Pendidikan Terakhir</th>
                                                                <th>Masa Kerja (Tahun)</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($user->direksi as $key => $direksiItem)
                                                                <tr>
                                                                    <td>{{ $key + 1 }}</td>
                                                                    <td>{{ $direksiItem['jabatan'] }}</td>
                                                                    <td>{{ $direksiItem['nama'] }}</td>
                                                                    <td>{{ $direksiItem['pendidikan'] }}</td>
                                                                    <td>{{ $direksiItem['masa_kerja'] }}</td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                @endif
                                            @endforeach

                                            <!-- Riwayat Perusahaan -->
                                            <h4>Riwayat Perusahaan</h4>
                                            <table class="table">
                                                <tr>
                                                    <td><strong>Berdiri Tahun</strong></td>
                                                    <td>:</td>
                                                    <td>{{ $userDetail->berdiri_tahun }}</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Manajemen Sejak Tahun</strong></td>
                                                    <td>:</td>
                                                    <td>{{ $userDetail->manajemen_sejak_tahun }}</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Bentuk Usaha</strong></td>
                                                    <td>:</td>
                                                    <td>{{ $userDetail->bentuk_usaha }}</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Induk Perusahaan Nama</strong></td>
                                                    <td>:</td>
                                                    <td>{{ $userDetail->induk_perusahaan_nama }}</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Induk Perusahaan Alamat</strong></td>
                                                    <td>:</td>
                                                    <td>{{ $userDetail->induk_perusahaan_alamat }}</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Induk Perusahaan Kota</strong></td>
                                                    <td>:</td>
                                                    <td>{{ $userDetail->induk_perusahaan_kota }}</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Induk Perusahaan Negara</strong></td>
                                                    <td>:</td>
                                                    <td>{{ $userDetail->induk_perusahaan_negara }}</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Induk Perusahaan Email/Telephone</strong></td>
                                                    <td>:</td>
                                                    <td>{{ $userDetail->induk_perusahaan_email_telephone }}</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Anak Perusahaan Nama</strong></td>
                                                    <td>:</td>
                                                    <td>{{ $userDetail->anak_perusahaan_nama }}</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Anak Perusahaan Alamat</strong></td>
                                                    <td>:</td>
                                                    <td>{{ $userDetail->anak_perusahaan_alamat }}</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Anak Perusahaan Kota</strong></td>
                                                    <td>:</td>
                                                    <td>{{ $userDetail->anak_perusahaan_kota }}</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Anak Perusahaan Negara</strong></td>
                                                    <td>:</td>
                                                    <td>{{ $userDetail->anak_perusahaan_negara }}</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Anak Perusahaan Email/Telephone</strong></td>
                                                    <td>:</td>
                                                    <td>{{ $userDetail->anak_perusahaan_email_telephone }}</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Prinsipal Perusahaan Nama</strong></td>
                                                    <td>:</td>
                                                    <td>{{ $userDetail->prinsipal_perusahaan_nama }}</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Prinsipal Perusahaan Alamat</strong></td>
                                                    <td>:</td>
                                                    <td>{{ $userDetail->prinsipal_perusahaan_alamat }}</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Prinsipal Perusahaan Kota</strong></td>
                                                    <td>:</td>
                                                    <td>{{ $userDetail->prinsipal_perusahaan_kota }}</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Prinsipal Perusahaan Negara</strong></td>
                                                    <td>:</td>
                                                    <td>{{ $userDetail->prinsipal_perusahaan_negara }}</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Prinsipal Perusahaan Email/Telephone</strong></td>
                                                    <td>:</td>
                                                    <td>{{ $userDetail->prinsipal_perusahaan_email_telephone }}</td>
                                                </tr>
                                            </table>

                                            <!-- Asuransi -->
                                            <h4>Asuransi</h4>
                                            <table class="table">
                                                <tr>
                                                    <td><strong>Asuransi Penanggung</strong></td>
                                                    <td>:</td>
                                                    <td>{{ $userDetail->asuransi_penanggung }}</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Asuransi Alamat</strong></td>
                                                    <td>:</td>
                                                    <td>{{ $userDetail->asuransi_alamat }}</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Asuransi Telephone/Email</strong></td>
                                                    <td>:</td>
                                                    <td>{{ $userDetail->asuransi_telephone_email }}</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Asuransi Jenis Jaminan</strong></td>
                                                    <td>:</td>
                                                    <td>{{ $userDetail->asuransi_jenis_jaminan }}</td>
                                                </tr>
                                            </table>

                                            <!-- Asuransi Karyawan -->
                                            <h4>Asuransi Karyawan</h4>
                                            <table class="table">
                                                <tr>
                                                    <td><strong>Asuransi Karyawan</strong></td>
                                                    <td>:</td>
                                                    <td>{{ $userDetail->asuransi_karyawan }}</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Alasan Asuransi</strong></td>
                                                    <td>:</td>
                                                    <td>{{ $userDetail->alasan_asuransi }}</td>
                                                </tr>
                                            </table>
                                            <h4>Riwayat Perusahaan</h4>
                                            @foreach ($users as $user)
                                                @if (!empty($user->riwayat))
                                                    <table class="table table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <th>No</th>
                                                                <th>Nama Perusahaan</th>
                                                                <th>Jenis Pekerjaan</th>
                                                                <th>Nilai Kontrak</th>
                                                                <th>Telepon/Email</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($user->riwayat as $key => $riwayatItem)
                                                                <tr>
                                                                    <td>{{ $key + 1 }}</td>
                                                                    <td>{{ $riwayatItem['nama_perusahaan_pemberi_pekerjaan'] }}</td>
                                                                    <td>{{ $riwayatItem['jenis_pekerjaan'] }}</td>
                                                                    <td>{{ $riwayatItem['nilai_kontrak'] }}</td>
                                                                    <td>{{ $riwayatItem['telepon_fax_rw'] }}</td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                @endif
                                            @endforeach
                                            <!-- Pengadilan -->
                                            <h4>Pengadilan</h4>
                                            <table class="table">
                                                <tr>
                                                    <td><strong>Pengadilan Karyawan</strong></td>
                                                    <td>:</td>
                                                    <td>{{ $userDetail->pengadilan_karyawan }}</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Alasan Pengadilan</strong></td>
                                                    <td>:</td>
                                                    <td>{{ $userDetail->alasan_pengadilan }}</td>
                                                </tr>
                                            </table>
                                        </div>
                                        @foreach ($userResponses as $response)
                                            <div class="mb-3">
                                                <strong>Pertanyaan:</strong> {{ $response->kuesioner->pertanyaan }}<br>
                                                <strong>Jawaban:</strong> {{ $response->jawaban }}<br>
                                                <strong>Dibuat:</strong>
                                                {{ $response->created_at->format('d-m-Y H:i:s') }}<br>
                                                <strong>Terakhir Diperbarui:</strong>
                                                {{ $response->updated_at->format('d-m-Y H:i:s') }}<br>
                                                @if ($response->lampiran)
                                                    <a href="{{ route('admin.lampiran.download', $response->lampiran) }}"
                                                        target="_blank">Download File</a>
                                                @else
                                                    <p>File tidak tersedia</p>
                                                @endif
                                            </div>
                                        @endforeach


                                        <h4>Kategori</h4>
                                        <form
                                            action="{{ route('admin.kuesioner-responses.rate', ['id' => $userDetail->id]) }}"
                                            method="POST">
                                            @csrf
                                            <label class="form-label d-block" for="nilai_respon">Nilai Respon (1 -
                                                100):</label>
                                            <input class="form-control w-25 d-inline" type="number" name="nilai_respon"
                                                id="nilai_respon" min="1" max="100" required>
                                            <button class="btn btn-primary d-inline" type="submit">Submit</button>
                                        </form>
                                        @if ($userDetail->kategori)
                                            <p> <strong>Kategori Respon: {{ ucfirst($userDetail->kategori) }}</strong>
                                            </p>
                                        @else
                                            <p> <strong>Kategori Respon: Belum diisi</strong></p>
                                        @endif

                                        <h4>Upload Sertifikat</h4>
                                        <form
                                            action="{{ route('admin.upload-sertifikat.store', ['id' => $userDetail->id]) }}"
                                            method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <label class="form-label d-block" for="certificate">Pilih Sertifikat</label>
                                            <input type="file" name="certificate" id="certificate"
                                                class="form-control w-25 d-inline">
                                            @error('certificate')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                            <button type="submit" class="btn btn-primary d-inline">Unggah
                                                Sertifikat</button>
                                        </form>

                                        @if ($userDetail->certificate)
                                            <div class="mt-3">
                                                <h5>Sertifikat yang diunggah:</h5>
                                                <a href="{{ asset('storage/' . $userDetail->certificate ) }}"
                                                    target="_blank">Lihat Sertifikat</a>

                                                <form
                                                    action="{{ route('admin.upload-sertifikat.delete', ['id' => $userDetail->id]) }}"
                                                    method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Hapus
                                                        Sertifikat</button>
                                                </form>
                                            </div>
                                        @endif
                                    </x-card>
                                @else
                                    <p>Detail pengguna tidak tersedia.</p>
                                @endif

                            </div>
                        </div>
                    @endif
                </div>
            @endforeach
        </div>
    </x-card>
</x-app-layout>

@push('script')
    <script>
        function searchUser() {
            // Ambil form dan input pencarian
            var form = document.getElementById('search-form');
            var searchInput = document.getElementById('search-input').value;

            // Buat URL baru untuk request GET dengan query pencarian
            var url = new URL(form.action);
            url.searchParams.set('search', searchInput);

            // Redirect ke URL dengan parameter pencarian
            window.location.href = url;
        }
    </script>
@endpush
