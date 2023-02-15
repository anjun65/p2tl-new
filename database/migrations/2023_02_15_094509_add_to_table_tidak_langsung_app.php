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
        Schema::table('form_tidak_langsung_data_apps', function (Blueprint $table) {
            $table->string('data_tegangan_tersambung')->nullable();
            $table->string('data_jenis_pengukuran')->nullable();
            $table->string('data_tempat_kedudukan')->nullable();
            $table->string('kubikel_merk')->nullable();
            $table->string('kubikel_type')->nullable();
            $table->string('kubikel_no_seri')->nullable();
            $table->string('kubikel_tahun')->nullable();
            $table->string('kubikel_foto')->nullable();
            $table->string('box_app_merk')->nullable();
            $table->string('box_app_type')->nullable();
            $table->string('box_app_no_seri')->nullable();
            $table->string('box_app_tahun')->nullable();
            $table->string('box_app_foto')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('form_tidak_langsung_data_apps', function (Blueprint $table) {
            //
        });
    }
};
