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
        Schema::table('form_langsung_data_app_lamas', function (Blueprint $table) {
            $table->string('foto_kwh_meter');
            $table->string('foto_pembatas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('form_langsung_data_app_lamas', function (Blueprint $table) {
            //
        });
    }
};
