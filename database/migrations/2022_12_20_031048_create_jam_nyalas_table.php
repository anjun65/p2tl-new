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
        Schema::create('jam_nyalas', function (Blueprint $table) {
            $table->id();

            $table->foreignId('works_id')->constrained('work_orders')->onDelete('cascade')->onUpdate('cascade');
            $table->date('tanggal');
            $table->integer('jumlah');
            
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
        Schema::dropIfExists('jam_nyalas');
    }
};
