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
            $table->string('no_ba')->nullable();
            $table->string('surat_tugas_p2tl')->nullable();
            $table->date('tanggal_surat_tugas_p2tl')->nullable();
            $table->string('surat_tugas_tni')->nullable();
            $table->date('tanggal_surat_tugas_tni')->nullable();
            $table->string('nama_tni')->nullable();
            $table->string('nip_tni')->nullable();
            $table->string('jabatan_tni')->nullable();
            $table->string('nama_saksi')->nullable();
            $table->string('alamat_saksi')->nullable();
            $table->string('nomor_identitas')->nullable();
            $table->string('no_telpon_saksi')->nullable();

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
