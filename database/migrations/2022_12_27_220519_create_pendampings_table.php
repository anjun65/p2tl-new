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
        Schema::create('pendampings', function (Blueprint $table) {
            $table->id();
            
            $table->foreignId('regus_id')->constrained('regus')->onDelete('cascade')->onUpdate('cascade');
            $table->string('name');
            $table->string('nip');
            $table->string('jabatan');
            
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
        Schema::dropIfExists('pendampings');
    }
};
