<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_tidak_langsung_pemeriksaan_pengukurans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('forms_id')->constrained('form_tidak_langsungs')->onDelete('cascade')->onUpdate('cascade');
            $table->string('arus_primer_r');
            $table->string('arus_primer_s');
            $table->string('arus_primer_t');
            $table->string('arus_sekunder_r');
            $table->string('arus_sekunder_s');
            $table->string('arus_sekunder_t');
            $table->string('ct_r');
            $table->string('ct_s');
            $table->string('ct_t');
            $table->string('akurasi_r');
            $table->string('akurasi_s');
            $table->string('akurasi_t');
            $table->string('voltase_primer_r');
            $table->string('voltase_primer_s');
            $table->string('voltase_primer_t');
            $table->string('voltase_sekunder_r');
            $table->string('voltase_sekunder_s');
            $table->string('voltase_sekunder_t');
            $table->string('cos_r');
            $table->string('cos_s');
            $table->string('cos_t');
            $table->string('akurasi');
            $table->string('keterangan');
            $table->string('foto');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('form_tidak_langsung_pemeriksaan_pengukurans');
    }
};
