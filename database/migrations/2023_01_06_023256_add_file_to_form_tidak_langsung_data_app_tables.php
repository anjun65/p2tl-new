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
            $table->string('file_alat_pembatas');
            $table->string('file_kwh_meter');
            $table->string('file_trafo_arus');
            $table->string('file_trafo_tegangan');
            $table->string('file_kubikel');
            $table->string('file_box_app');
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
