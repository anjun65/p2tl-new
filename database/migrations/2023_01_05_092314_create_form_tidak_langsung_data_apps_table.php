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
        Schema::create('form_tidak_langsung_data_apps', function (Blueprint $table) {
            $table->id();

            $table->foreignId('forms_id')->constrained('form_tidak_langsungs')->onDelete('cascade')->onUpdate('cascade');
            $table->string('merk');
            $table->string('no_seri');
            $table->string('rating_arus');
            $table->string('kwh_merk');
            $table->string('kwh_no_reg');
            $table->string('kwh_no_seri');
            $table->string('kwh_tahun_buat');
            $table->string('kwh_konstanta');
            $table->string('kwh_class');
            $table->string('kwh_rating_arus');
            $table->string('kwh_tegangan_nominal');
            $table->string('kwh_stand_mtr_lbp');
            $table->string('kwh_stand_mtr_bp');
            $table->string('kwh_stand_total');
            $table->string('kwh_stand_kvarh');
            $table->string('ct_merk')->nullable();
            $table->string('ct_cls')->nullable();
            $table->string('ct_rasio')->nullable();
            $table->string('ct_burden')->nullable();
            $table->string('pt_merk')->nullable();
            $table->string('pt_cls')->nullable();
            $table->string('pt_rasio')->nullable();


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
        Schema::dropIfExists('form_tidak_langsung_data_apps');
    }
};
