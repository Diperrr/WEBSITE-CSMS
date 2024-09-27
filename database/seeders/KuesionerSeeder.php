<?php

namespace Database\Seeders;

use App\Models\Kuesioner;
use Illuminate\Database\Seeder;

class KuesionerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Kuesioner::create([
            'user_id' => 14,
            'pertanyaan' => 'Apakah perusahaan saudara memiliki kebijakan K3?',
            'kriteria' => 'KOMITMEN MANAJEMEN',
            'faktor' => 'Utama',
            'keterangan' => 'Jika ya, lampirkan',
        ]);

        Kuesioner::create([
            'user_id' => 14,
            'pertanyaan' => 'Apakah kebijakan K3 tsb sudah disosialisasikan & dipahami oleh seluruh pekerja serta ditinjau ulang secara berkala ?',
            'kriteria' => 'KOMITMEN MANAJEMEN',
            'faktor' => 'Utama',
            'keterangan' => 'Jika ya, lampirkan program sosialisasi dan absen peserta',
        ]);

        Kuesioner::create([
            'user_id' => 14,
            'pertanyaan' => 'Apakah Perusahaan Saudara mempunyai organisasi K3 ?',
            'kriteria' => 'ORGANISASI K3',
            'faktor' => 'Utama',
            'keterangan' => 'Jika ya, lampirkan lengkap dgn uraian kerja (Job Description)',
        ]);
        
        Kuesioner::create([
            'user_id' => 14,
            'pertanyaan' => 'Adakah person dalam organisasi yg bertanggung jawab terhadap kebijakan K3 yang dijalankan pada daerah kewenangan dan lokasi dimana karyawan bekerja ?',
            'kriteria' => 'ORGANISASI K3',
            'faktor' => 'Utama',
            'keterangan' => 'Sebutkan level jabatan masing masing personil yg bertanggung jawab',
        ]);

        Kuesioner::create([
            'user_id' => 14,
            'pertanyaan' => 'Apakah perusahaan saudara memiliki program Inspeksi yang dilakukan oleh Manajemen ?',
            'kriteria' => 'PROGRAM INSPEKSI K3',
            'faktor' => 'Utama',
            'keterangan' => 'Jika ya, lampirkan program tersebut',
        ]);

        Kuesioner::create([
            'user_id' => 14,
            'pertanyaan' => 'Apakah hasil temuan Inspeksi Manajemen selalu ditindak lanjuti ?',
            'kriteria' => 'PROGRAM INSPEKSI K3',
            'faktor' => 'Utama',
            'keterangan' => 'Jika ya, lampirkan buktinya',
        ]);

        Kuesioner::create([
            'user_id' => 14,
            'pertanyaan' => 'Apakah perusahaan saudara menyelenggarakan rapat–rapat rutin tentang K3 dan dihadiri oleh Manajemen ?',
            'kriteria' => 'PROGRAM RAPAT K3',
            'faktor' => 'Utama',
            'keterangan' => 'Jika ya, lampirkan buktinya',
        ]);

        Kuesioner::create([
            'user_id' => 14,
            'pertanyaan' => 'Apakah hasil rapat K3 ditindak lanjuti ?',
            'kriteria' => 'PROGRAM RAPAT K3',
            'faktor' => 'Utama',
            'keterangan' => 'Jika ya, lampirkan buktinya',
        ]);

        Kuesioner::create([
            'user_id' => 14,
            'pertanyaan' => 'Apakah Perusahaan saudara mempunyai prosedur Penanggulangan keadaan darurat dan melakukan latihan berkala ?',
            'kriteria' => 'PERENCANAAN KEADAAN DARURAT',
            'faktor' => 'Utama',
            'keterangan' => 'Jika ya, lampirkan buktinya',
        ]);

        Kuesioner::create([
            'user_id' => 14,
            'pertanyaan' => 'Apakah perusahaan saudara mempunyai prosedur / buku panduan Keselamatan dan kesehatan kerja ?',
            'kriteria' => 'PROSEDUR K3',
            'faktor' => 'Utama',
            'keterangan' => 'Jika ya, lampirkan prosedur / buku tsb',
        ]);

        Kuesioner::create([
            'user_id' => 14,
            'pertanyaan' => 'Apakah perusahaan saudara memiliki buku/referensi (standard, kumpulan peraturan perundangan) tentang K3',
            'kriteria' => 'PROSEDUR K3',
            'faktor' => 'Utama',
            'keterangan' => 'Jika ya, lampirkan daftar buku standard tersebut',
        ]);

        Kuesioner::create([
            'user_id' => 14,
            'pertanyaan' => 'Apakah perusahaan saudara mempunyai prosedur pelaporan kecelakaan kerja dan investigasi ?',
            'kriteria' => 'PROSEDUR KECELAKAAN KERJA',
            'faktor' => 'Utama',
            'keterangan' => 'Jika ya lampirkan prosedur tersebut',
        ]);

        Kuesioner::create([
            'user_id' => 14,
            'pertanyaan' => 'Apakah ada prosedur atau teknik untuk mengindentifikasi, menilai, mengawasi dan mengurangi dampak bahaya pada suatu pekerjaan ?',
            'kriteria' => 'PROSEDUR KECELAKAAN KERJA',
            'faktor' => 'Utama',
            'keterangan' => 'Jika ya lampirkan prosedur tersebut',
        ]);

        Kuesioner::create([
            'user_id' => 14,
            'pertanyaan' => 'Apakah perusahaan saudara mempunyai program pelatihan (teori & praktek) tentang K3 baik untuk karyawan lama maupun baru ?',
            'kriteria' => 'PROGRAM PELATIHAN K3',
            'faktor' => 'Utama',
            'keterangan' => 'Jika ya lampirkan prosedur tersebut',
        ]);

        Kuesioner::create([
            'user_id' => 14,
            'pertanyaan' => 'Apakah para penanggung jawab K3 di unIt kerja telah mendapatkan pelatihan K3 yg sesuai dgn tanggung jawabnya ?',
            'kriteria' => 'PROGRAM PELATIHAN K3',
            'faktor' => 'Utama',
            'keterangan' => 'Jika ya, lampirkan program dan jadwal pelatihan tersebut',
        ]);
        
        Kuesioner::create([
            'user_id' => 14,
            'pertanyaan' => 'Apakah perusahaan Saudara mempunyai petugas yg berkualifikasi ahli K3 ?',
            'kriteria' => 'PROGRAM PELATIHAN K3',
            'faktor' => 'Utama',
            'keterangan' => 'Jika ya, lampirkan daftar nama dan sertifikat kompetensi',
        ]);
        
        Kuesioner::create([
            'user_id' => 14,
            'pertanyaan' => 'Apakah perusahaan saudara memberikan alat pelindung diri pada setiap karyawan yang akan melaksanakan pekerjaan ?',
            'kriteria' => 'ALAT PELINDUNG DIRI',
            'faktor' => 'Utama',
            'keterangan' => 'Jika ya, sebutkan jenis APD yang diberikan',
        ]);
        
        Kuesioner::create([
            'user_id' => 14,
            'pertanyaan' => 'Apakah ada prosedur pemeriksaan dan pemeiharaan alat pelindung diri khusus ?',
            'kriteria' => 'ALAT PELINDUNG DIRI',
            'faktor' => 'Utama',
            'keterangan' => 'Jika ya lampirkan prosedur tersebut',
        ]);
        
        Kuesioner::create([
            'user_id' => 14,
            'pertanyaan' => 'Apakah perusahaan saudara selalu memeriksa dan mensertifikasi secara rutin semua peralatan kerja yang digunakan ?',
            'kriteria' => 'ALAT PELINDUNG DIRI',
            'faktor' => 'Utama',
            'keterangan' => 'Jika ya, lampirkan sertifikat atau hasil pemeriksaan tersebut',
        ]);
        
        Kuesioner::create([
            'user_id' => 14,
            'pertanyaan' => 'Apakah perusahaan saudara memiliki prosedur penanganan, pengangkutan dan penyimpanan bahan berbahaya dan beracun (B3) ?',
            'kriteria' => 'PENGELOLAAN MATERIAL B3',
            'faktor' => 'Utama',
            'keterangan' => 'Jika ya lampirkan prosedur tersebut',
        ]);
        
        Kuesioner::create([
            'user_id' => 14,
            'pertanyaan' => 'Apakah Perusahaan Saudara melakukan pemeriksaan kesehatan terhadap calon pekerja serta melakukan pemeriksaan berkala ?',
            'kriteria' => 'HIGIENE INDUSTRI',
            'faktor' => 'Pendukung',
            'keterangan' => 'Jika ya, lampirkan buktinya',
        ]);
        
        Kuesioner::create([
            'user_id' => 14,
            'pertanyaan' => 'Apakah perusahaan saudara melakukan pemantauan kesehatan tenaga kerja yg bekerja di lokasi yg mengandung bahaya dan resiko kesehatan ?',
            'kriteria' => 'HIGIENE INDUSTRI',
            'faktor' => 'Pendukung',
            'keterangan' => 'Jika ya, lampirkan buktinya',
        ]);
        
        Kuesioner::create([
            'user_id' => 14,
            'pertanyaan' => 'Apakah ada program monitoring dan pengendalian bahaya kesehatan di tempat kerja ?',
            'kriteria' => 'HIGIENE INDUSTRI',
            'faktor' => 'Pendukung',
            'keterangan' => 'Jika ya, lampirkan buktinya',
        ]);
        
        Kuesioner::create([
            'user_id' => 14,
            'pertanyaan' => 'Apakah perusahaan saudara memiliki prosedur/peraturan larangan pemakaian obat-obat terlarang & minuman keras ?',
            'kriteria' => 'HIGIENE INDUSTRI',
            'faktor' => 'Pendukung',
            'keterangan' => 'Jika ya, lampirkan prosedur tersebut',
        ]);
        
        Kuesioner::create([
            'user_id' => 14,
            'pertanyaan' => 'Apakah perusahaan memiliki prosedur terkait pengelolaan lingkungan kerja (5S / 5R) ?',
            'kriteria' => 'PENGELOLAAN LINGKUNGAN KERJA',
            'faktor' => 'Pendukung',
            'keterangan' => 'Jika ya, lampirkan prosedur tersebut',
        ]);
        
        Kuesioner::create([
            'user_id' => 14,
            'pertanyaan' => 'Apakah perusahaan saudara melakukan pengukuran lingkungan kerja sesuai Permenaker No. 05 Tahun 2018 ?',
            'kriteria' => 'PENGELOLAAN LINGKUNGAN KERJA',
            'faktor' => 'Pendukung',
            'keterangan' => 'Jika ya, lampirkan prosedur tersebut',
        ]);
        
        Kuesioner::create([
            'user_id' => 14,
            'pertanyaan' => 'Apakah Perusahaan saudara menyimpan catatan kinerja K3LH untuk 3 tahun terakhir ?',
            'kriteria' => 'DATA KINERJA K3',
            'faktor' => 'Pendukung',
            'keterangan' => 'Jika ya lampirkan data kinerja K3 tersebut',
        ]);
        
        Kuesioner::create([
            'user_id' => 14,
            'pertanyaan' => 'Apakah dilakukan evaluasi terhadap sasaran dan program K3 tahunan ?',
            'kriteria' => 'DATA KINERJA K3',
            'faktor' => 'Pendukung',
            'keterangan' => 'Jika ya, lampirkan dokumen evaluasi tersebut',
        ]);
        
        Kuesioner::create([
            'user_id' => 14,
            'pertanyaan' => 'Apakah dilakukan investigasi pada setiap kecelakaan kerja ?',
            'kriteria' => 'INVESTIGASI KECELAKAAN',
            'faktor' => 'Pendukung',
            'keterangan' => 'Jika ya, lampirkan laporan tersebut',
        ]);
        
        Kuesioner::create([
            'user_id' => 14,
            'pertanyaan' => 'Apakah hasil investigasi berisi saran dan dan ditindak lanjuti ?',
            'kriteria' => 'INVESTIGASI KECELAKAAN',
            'faktor' => 'Pendukung',
            'keterangan' => 'Jika ya, lampirkan laporan tersebut',
        ]);
    }
}
