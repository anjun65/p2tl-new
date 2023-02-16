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
        Schema::create('form_tidak_langsung_wiring_apps', function (Blueprint $table) {
            $table->id();

            $table->foreignId('forms_id')->constrained('form_tidak_langsungs')->onDelete('cascade')->onUpdate('cascade');
            $table->string('terminal1');
            $table->string('terminal2');
            $table->string('terminal3');
            $table->string('terminal4');
            $table->string('terminal5');
            $table->string('terminal6');
            $table->string('terminal7');
            $table->string('terminal8');
            $table->string('terminal9');
            $table->string('terminal11');
            $table->string('grounding');
            $table->string('keterangan_wiring_app');
            $table->string('wiring_diagram');
            $table->string('wiring_foto');

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
        Schema::dropIfExists('form_tidak_langsung_wiring_apps');
    }
};
