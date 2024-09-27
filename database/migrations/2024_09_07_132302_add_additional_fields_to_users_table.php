<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAdditionalFieldsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            // Kolom umum
            $table->string('berdiri_tahun')->nullable();
            $table->string('manajemen_sejak_tahun')->nullable();
            $table->string('bentuk_usaha')->nullable();

            // $table->json('direksi')->nullable();
            // $table->json('riwayat')->nullable();

            // Kolom untuk induk perusahaan
            $table->string('induk_perusahaan_nama')->nullable();
            $table->string('induk_perusahaan_alamat')->nullable();
            $table->string('induk_perusahaan_kota')->nullable();
            $table->string('induk_perusahaan_negara')->nullable();
            $table->string('induk_perusahaan_email_telephone')->nullable();

            // Kolom untuk anak perusahaan
            // $table->string('anak_perusahaan_nama')->nullable();
            // $table->string('anak_perusahaan_alamat')->nullable();
            // $table->string('anak_perusahaan_kota')->nullable();
            // $table->string('anak_perusahaan_negara')->nullable();
            // $table->string('anak_perusahaan_email_telephone')->nullable();


            // Kolom untuk prinsipal perusahaan
            $table->string('prinsipal_perusahaan_nama')->nullable();
            $table->string('prinsipal_perusahaan_alamat')->nullable();
            $table->string('prinsipal_perusahaan_kota')->nullable();
            $table->string('prinsipal_perusahaan_negara')->nullable();
            $table->string('prinsipal_perusahaan_email_telephone')->nullable();

            // Kolom untuk asuransi
            $table->string('asuransi_penanggung')->nullable();
            $table->string('asuransi_alamat')->nullable();
            $table->string('asuransi_telephone_email')->nullable();
            $table->string('asuransi_jenis_jaminan')->nullable();

            $table->enum('asuransi_karyawan', ['ya', 'tidak'])->nullable();
            $table->string('alasan_asuransi')->nullable();

            $table->enum('pengadilan_karyawan', ['ya', 'tidak'])->nullable();
            $table->string('alasan_pengadilan')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
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
            ]);
        });
    }
}
