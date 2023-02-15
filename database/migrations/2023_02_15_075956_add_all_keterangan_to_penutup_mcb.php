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
        Schema::table('form_langsung_pemeriksaan_penutup_mcbs', function (Blueprint $table) {
            $table->string('all_keterangan')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('form_langsung_pemeriksaan_penutup_mcbs', function (Blueprint $table) {
            //
        });
    }
};
