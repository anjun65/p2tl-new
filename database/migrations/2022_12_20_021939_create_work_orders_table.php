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
        Schema::create('work_orders', function (Blueprint $table) {
            $table->id();

            $table->string('id_pelanggan');
            $table->string('nama_pelanggan');
            $table->string('latitude');
            $table->string('longitude');
            $table->string('alamat');
            $table->string('jenis_p2tl');
            $table->string('tarif');
            $table->integer('daya');
            $table->integer('rbm');
            $table->string('lgkh');
            $table->integer('fkm');
            $table->foreignId('regus_id')->constrained('regus')->onDelete('cascade')->onUpdate('cascade');
            $table->string('keterangan_p2tl')->nullable();
            $table->string('status')->default('OPEN');

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
        Schema::dropIfExists('work_orders');
    }
};
