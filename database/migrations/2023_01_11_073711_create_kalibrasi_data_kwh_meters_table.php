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
        Schema::create('kalibrasi_data_kwh_meters', function (Blueprint $table) {
            $table->id();

            $table->foreignId('forms_id')->constrained('kalibrasi_kwh_meters')->onDelete('cascade')->onUpdate('cascade');
            $table->string('merk');
            $table->string('no_register');
            $table->string('no_seri');
            $table->string('tahun_pembuatan');
            $table->string('class');
            $table->string('konstanta');
            $table->string('rating_arus');
            $table->string('tegangan_nominal');
            $table->string('stand_kwh_meter');
            $table->string('keterangan');
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
        Schema::dropIfExists('kalibrasi_data_kwh_meters');
    }
};
