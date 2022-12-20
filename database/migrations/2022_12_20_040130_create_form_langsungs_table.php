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
        Schema::create('form_langsungs', function (Blueprint $table) {
            $table->id();

            $table->foreignId('works_id')->constrained('work_orders')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('regus_id')->constrained('regus')->onDelete('cascade')->onUpdate('cascade');
            $table->string('no_ba');
            $table->string('surat_tugas_p2tl');
            $table->date('tanggal_surat_tugas_p2tl');
            $table->string('surat_tugas_tni');
            $table->date('tanggal_surat_tugas_tni');
            $table->string('nama_tni');
            $table->string('nip_tni');
            $table->string('jabatan_tni');
            $table->string('alamat_pelanggan');
            $table->integer('tarif');
            $table->string('nama_saksi');
            $table->string('alamat_saksi');
            $table->string('nomor_identitas');
            $table->string('no_telpon_saksi');

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
        Schema::dropIfExists('form_langsungs');
    }
};
