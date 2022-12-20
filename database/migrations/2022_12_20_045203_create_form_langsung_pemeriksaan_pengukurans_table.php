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
        Schema::create('form_langsung_pemeriksaan_pengukurans', function (Blueprint $table) {
            $table->id();

            $table->foreignId('forms_id')->constrained('form_langsungs')->onDelete('cascade')->onUpdate('cascade');
            $table->string('arus_1');
            $table->string('arus_2');
            $table->string('arus_3');
            $table->string('arus_netral');
            $table->string('voltase_netral_1');
            $table->string('voltase_netral_2');
            $table->string('voltase_netral_3');
            $table->string('voltase_phase_1');
            $table->string('voltase_phase_2');
            $table->string('voltase_phase_3');
            $table->string('cos_1');
            $table->string('cos_2');
            $table->string('cos_3');
            $table->string('akurasi');

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
        Schema::dropIfExists('form_langsung_pemeriksaan_pengukurans');
    }
};
