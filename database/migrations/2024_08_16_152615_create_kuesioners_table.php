<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKuesionersTable extends Migration
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

            // Kolom untuk induk perusahaan
            $table->string('induk_perusahaan_nama')->nullable();
            $table->string('induk_perusahaan_alamat')->nullable();
            $table->string('induk_perusahaan_kota')->nullable();
            $table->string('induk_perusahaan_negara')->nullable();
            $table->string('induk_perusahaan_email_telephone')->nullable();

            // Kolom untuk anak perusahaan
            $table->string('anak_perusahaan_nama')->nullable();
            $table->string('anak_perusahaan_alamat')->nullable();
            $table->string('anak_perusahaan_kota')->nullable();
            $table->string('anak_perusahaan_negara')->nullable();
            $table->string('anak_perusahaan_email_telephone')->nullable();

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

            // Kolom tambahan terkait pengadilan karyawan
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
        Schema::dropIfExists('kuesioners');
    }
}
