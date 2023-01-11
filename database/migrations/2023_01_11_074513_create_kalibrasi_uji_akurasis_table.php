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
        Schema::create('kalibrasi_uji_akurasis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('forms_id')->constrained('kalibrasi_kwh_meters')->onDelete('cascade')->onUpdate('cascade');
            $table->string('beban_100_tegangan');
            $table->string('beban_100_arus');
            $table->string('beban_100_akurasi');
            $table->string('beban_100_keterangan');
            $table->string('beban_50_tegangan');
            $table->string('beban_50_arus');
            $table->string('beban_50_akurasi');
            $table->string('beban_50_keterangan');
            $table->string('beban_5_tegangan');
            $table->string('beban_5_arus');
            $table->string('beban_5_akurasi');
            $table->string('beban_5_keterangan');

            $table->string('alat_uji_merk');
            $table->string('alat_uji_type');
            $table->string('alat_uji_no_seri');
            $table->text('kesimpulan');

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
        Schema::dropIfExists('kalibrasi_uji_akurasis');
    }
};
