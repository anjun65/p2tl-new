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
        Schema::create('kalibrasi_kwh_meters', function (Blueprint $table) {
            $table->id();
            $table->foreignId('works_id')->constrained('work_orders')->onDelete('cascade')->onUpdate('cascade');
            $table->string('nama_saksi');
            $table->string('alamat_saksi');
            $table->string('nomor_identitas_saksi');
            $table->string('pekerjaan_saksi');
            $table->string('no_telp_saksi');
            
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
        Schema::dropIfExists('kalibrasi_kwh_meters');
    }
};
