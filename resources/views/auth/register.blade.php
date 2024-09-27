<x-guest-layout>
    <x-slot name="title">
        Register
    </x-slot>

    <x-auth-card>
        {{-- Show alert if there are errors --}}
        <x-alert-error />

        <x-slot name="title">
            Register
        </x-slot>

        <form action="{{ route('register') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Fields for company and user registration -->
            <x-input type="text" text="Nama Perusahaan" name="name" />
            <x-input type="text" text="Username" name="username" />
            <x-input type="password" text="Password" name="password" />
            <x-input type="password" text="Password Confirmation" name="password_confirmation" />
            <x-input type="text" text="Alamat Pos" name="alamat_pos" />
            <x-input type="text" text="Nomor Telephone/Fax" name="nomor" />
            <x-input type="email" text="Email" name="email" />
            <x-input type="text" text="Pekerjaan" name="pekerjaan" />

            <hr>

            <!-- Dynamic form for Anggota Direksi -->
            <div id="direksi-fields">
                <h4>Anggota Direksi</h4>
                <div class="direksi-item mb-3">
                    <x-input type="text" text="Jabatan" name="direksi[0][jabatan]" />
                    <x-input type="text" text="Nama" name="direksi[0][nama]" />
                    <x-input type="text" text="Pendidikan Terakhir" name="direksi[0][pendidikan]" />
                    <x-input type="number" text="Masa Kerja (tahun)" name="direksi[0][masa_kerja]" />
                </div>
            </div>

            <!-- Button to add new Anggota Direksi -->
            <button type="button" id="add-direksi-btn" class="bg-blue-500 text-white px-4 py-2 rounded mt-2">Tambah
                Anggota Direksi</button>

            <hr>

            <x-input type="number" text="Berdiri Tahun" name="berdiri_tahun" />
            <x-input type="number" text="Dibawah Manajemen Sejak Tahun" name="manajemen_sejak_tahun" />
            <x-input type="text" text="Bentuk Usaha (CV/PT/etc)" name="bentuk_usaha" />

            Induk Perusahaan
            <h4>Nama Perusahaan Induk</h4>
            <x-input type="text" text="Nama Perusahaan Induk" name="induk_perusahaan_nama" />
            <x-input type="text" text="Alamat Pos" name="induk_perusahaan_alamat" />
            <x-input type="text" text="Kota" name="induk_perusahaan_kota" />
            <x-input type="text" text="Negara" name="induk_perusahaan_negara" />
            <x-input type="text" text="E-mail / Telephone" name="induk_perusahaan_email_telephone" />

            <hr>

            Anak Perusahaan
            <h4>Nama Anak Perusahaan</h4>
            <x-input type="text" text="Nama Anak Perusahaan" name="anak_perusahaan_nama" />
            <x-input type="text" text="Alamat" name="anak_perusahaan_alamat" />
            <x-input type="text" text="Kota" name="anak_perusahaan_kota" />
            <x-input type="text" text="Negara" name="anak_perusahaan_negara" />
            <x-input type="text" text="E-mail / Telephone" name="anak_perusahaan_email_telephone" />

            <hr>

            Prinsipal Perusahaan
            <h4>Nama Perusahaan Prinsipal</h4>
            <x-input type="text" text="Nama Perusahaan Prinsipal" name="prinsipal_perusahaan_nama" />
            <x-input type="text" text="Alamat" name="prinsipal_perusahaan_alamat" />
            <x-input type="text" text="Kota" name="prinsipal_perusahaan_kota" />
            <x-input type="text" text="Negara" name="prinsipal_perusahaan_negara" />
            <x-input type="text" text="E-mail / Telephone" name="prinsipal_perusahaan_email_telephone" />

            <hr>

            Asuransi
            <h4>Asuransi</h4>
            <x-input type="text" text="Penanggung (PT)" name="asuransi_penanggung" />
            <x-input type="text" text="Alamat Pos" name="asuransi_alamat" />
            <x-input type="text" text="Telephone / E-mail" name="asuransi_telephone_email" />
            <x-input type="text" text="Jenis Jaminan" name="asuransi_jenis_jaminan" />

            <!-- Pertanyaan Asuransi Karyawan -->
            <h4>5. Apakah semua karyawan diasuransikan?</h4>
            <label for="asuransi_karyawan_ya">Ya</label>
            <input type="radio" id="asuransi_karyawan_ya" name="asuransi_karyawan" value="ya">
            <label for="asuransi_karyawan_tidak">Tidak</label>
            <input type="radio" id="asuransi_karyawan_tidak" name="asuransi_karyawan" value="tidak">

            <!-- Textarea ini akan muncul jika jawabannya 'Tidak' -->
            <div id="alasan-container" style="display: none;">
                <textarea name="alasan_asuransi" id="alasan_asuransi" placeholder="Jika tidak, jelaskan alasannya"></textarea>
            </div>

            <hr>

            <!-- Riwayat Pekerjaan -->
            <div id="riwayat-fields">
                <h4>Riwayat Pekerjaan</h4>
                <div class="riwayat-item mb-3">
                    <x-input type="text" text="NAMA PERUSAHAAN PEMBERI PEKERJAAN"
                        name="riwayat[0][nama_perusahaan_pemberi_pekerjaan]" />
                    <x-input type="text" text="JENIS PEKERJAAN" name="riwayat[0][jenis_pekerjaan]" />
                    <x-input type="number" text="NILAI KONTRAK" name="riwayat[0][nilai_kontrak]" />
                    <x-input type="number" text="TELP/ FAX E-MAIL" name="riwayat[0][telepon_fax_rw]" />
                </div>
            </div>
            <!-- Button to add new Anggota Riwayat -->
            <button type="button" id="add-riwayat-btn" style="background-color: #1D4ED8;"
                class="text-white px-4 py-2 rounded mt-2">Tambah Riwayat Perusahaan</button>

            <hr>

            <!-- Pertanyaan Pengadilan -->
            <h4>7. Apakah perusahaan saudara sedang berurusan dengan pengadilan, klaim, atau tuntutan pihak lain?</h4>
            <label for="pengadilan_karyawan_ya">Ya</label>
            <input type="radio" id="pengadilan_karyawan_ya" name="pengadilan_karyawan" value="ya">
            <label for="pengadilan_karyawan_tidak">Tidak</label>
            <input type="radio" id="pengadilan_karyawan_tidak" name="pengadilan_karyawan" value="tidak">

            <div id="alasan-pengadilan-container" style="display: none;">
                <textarea name="alasan_pengadilan" id="alasan_pengadilan" placeholder="Jika tidak, jelaskan alasannya"></textarea>
            </div>

            <h4>8. Apakah anda memiliki sertifikat CSMS yang masih berlaku?</h4>
            <label for="sertifikat_ya">Ya</label>
            <input type="radio" id="sertifikat_ya" name="sertifikat" value="ya">
            <label for="sertifikat_tidak">Tidak</label>
            <input type="radio" id="sertifikat_tidak" name="sertifikat" value="tidak">

            <div id="upload-certificate-container" style="display: none; margin-top: 10px;">
                <input type="file" name="certificate" id="certificate">
            </div>



            <!-- Submit button -->
            <x-button type="primary btn-block mt-4" text="Register" for="submit" />
        </form>



        <hr>

        <div class="text-center">
            <a class="font-weight-bold small" href="{{ route('login') }}">Already have an account?</a>
        </div>
    </x-auth-card>

    <script>
        let direksiIndex = 1; // Mulai dari 1 karena 0 sudah ada di form

        document.getElementById('add-direksi-btn').addEventListener('click', function() {
            const direksiFields = document.getElementById('direksi-fields');

            // Buat elemen baru untuk anggota direksi
            const newDireksiItem = document.createElement('div');
            newDireksiItem.classList.add('direksi-item', 'mb-3');
            newDireksiItem.setAttribute('id', `direksi-${direksiIndex}`);

            newDireksiItem.innerHTML = `
        <x-input type="text" text="Jabatan" name="direksi[${direksiIndex}][jabatan]" />
        <x-input type="text" text="Nama" name="direksi[${direksiIndex}][nama]" />
        <x-input type="text" text="Pendidikan Terakhir" name="direksi[${direksiIndex}][pendidikan]" />
        <x-input type="number" text="Masa Kerja (tahun)" name="direksi[${direksiIndex}][masa_kerja]" />
    `;

            // Tambahkan elemen ke dalam container
            direksiFields.appendChild(newDireksiItem);

            // Tingkatkan index untuk anggota direksi berikutnya
            direksiIndex++;
        });

        document.getElementById('add-riwayat-btn').addEventListener('click', function() {
            const riwayatFields = document.getElementById('riwayat-fields');
            const index = riwayatFields.getElementsByClassName('riwayat-item').length;

            const newItem = document.createElement('div');
            newItem.classList.add('riwayat-item', 'mb-3');
            newItem.innerHTML = `
            <x-input type="text" text="NAMA PERUSAHAAN PEMBERI PEKERJAAN" name="riwayat[${index}][nama_perusahaan]" />
            <x-input type="text" text="JENIS PEKERJAAN" name="riwayat[${index}][jenis_pekerjaan]" />
            <x-input type="text" text="NILAI KONTRAK" name="riwayat[${index}][nilai_kontrak]" />
            <x-input type="text" text="TELP/ FAX E-MAIL" name="riwayat[${index}][telepon]" />
        `;

            riwayatFields.appendChild(newItem);
        });



        // Dapatkan elemen input radio dan textarea
        const asuransiKaryawanYa = document.getElementById('asuransi_karyawan_ya');
        const asuransiKaryawanTidak = document.getElementById('asuransi_karyawan_tidak');
        const alasanContainer = document.getElementById('alasan-container');

        // Fungsi untuk menampilkan/menyembunyikan textarea
        function toggleAlasan() {
            if (asuransiKaryawanTidak.checked) {
                alasanContainer.style.display = 'block'; // Tampilkan textarea jika 'Tidak' dipilih
            } else {
                alasanContainer.style.display = 'none'; // Sembunyikan jika 'Ya' dipilih
            }
        }

        // Pasang event listener untuk radio buttons
        asuransiKaryawanYa.addEventListener('change', toggleAlasan);
        asuransiKaryawanTidak.addEventListener('change', toggleAlasan);


        // Dapatkan elemen radio button dan textarea
        const pengadilanYa = document.getElementById('pengadilan_karyawan_ya');
        const pengadilanTidak = document.getElementById('pengadilan_karyawan_tidak');
        const alasanPengadilanContainer = document.getElementById('alasan-pengadilan-container');

        // Fungsi untuk menampilkan/menyembunyikan textarea
        function toggleAlasanPengadilan() {
            if (pengadilanYa.checked) {
                alasanPengadilanContainer.style.display = 'block'; // Tampilkan textarea jika "Ya" dipilih
            } else {
                alasanPengadilanContainer.style.display = 'none'; // Sembunyikan textarea jika "Tidak" dipilih
            }
        }

        document.querySelectorAll('input[name="sertifikat"]').forEach((element) => {
            element.addEventListener('change', function() {
                if (this.value === 'ya') {
                    document.getElementById('upload-certificate-container').style.display = 'block';
                } else {
                    document.getElementById('upload-certificate-container').style.display = 'none';
                }
            });
        });

        // Pasang event listener untuk radio buttons
        pengadilanYa.addEventListener('change', toggleAlasanPengadilan);
        pengadilanTidak.addEventListener('change', toggleAlasanPengadilan);
    </script>
</x-guest-layout>
