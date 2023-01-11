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
        Schema::create('kalibrasi_data_kwh_meter_lanjutans', function (Blueprint $table) {
            $table->id();

            $table->foreignId('forms_id')->constrained('kalibrasi_kwh_meters')->onDelete('cascade')->onUpdate('cascade');
            $table->string('atas_a');
            $table->string('atas_b');
            $table->string('atas_keterangan');
            $table->string('kanan_a');
            $table->string('kanan_b');
            $table->string('kanan_keterangan');
            $table->string('kiri_a');
            $table->string('kiri_b');
            $table->string('kiri_keterangan');
            $table->string('file');


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
        Schema::dropIfExists('kalibrasi_data_kwh_meter_lanjutans');
    }
};
