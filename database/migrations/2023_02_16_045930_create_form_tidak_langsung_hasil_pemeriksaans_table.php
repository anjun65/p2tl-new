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
        Schema::create('form_tidak_langsung_hasil_pemeriksaans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('forms_id')->constrained('form_langsungs')->onDelete('cascade')->onUpdate('cascade');
            $table->string('hasil_pemeriksaan');
            $table->string('kesimpulan');
            $table->string('tindakan');
            $table->string('barang_bukti');
            $table->string('tanggal_penyelesaian');
            $table->string('foto_barang_bukti');
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
        Schema::dropIfExists('form_tidak_langsung_hasil_pemeriksaans');
    }
};
