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
        Schema::create('form_tidak_langsung_data_pemeriksaan_tutup_terminals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('forms_id')->constrained('form_langsungs')->onDelete('cascade')->onUpdate('cascade');
            $table->string('peralatan');
            $table->string('segel');
            $table->string('nomor_tahun_kode_segel');
            $table->string('keterangan');
            $table->string('foto_sebelum');
            $table->string('post_peralatan');
            $table->string('post_segel');
            $table->string('post_nomor_tahun_kode_segel');
            $table->string('foto_sesudah');
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
        Schema::dropIfExists('form_tidak_langsung_data_pemeriksaan_tutup_terminals');
    }
};
