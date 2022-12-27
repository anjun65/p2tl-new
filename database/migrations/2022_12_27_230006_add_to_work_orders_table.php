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
        Schema::table('work_orders', function (Blueprint $table) {
            $table->string('no_ba')->nullable();
            $table->string('surat_tugas_p2tl')->nullable();
            $table->date('tanggal_surat_tugas_p2tl')->nullable();
            $table->string('surat_tugas_tni')->nullable();
            $table->date('tanggal_surat_tugas_tni')->nullable();
            $table->foreignId('pendamping1_id')->constrained('pendampings')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('pendamping2_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('work_orders', function (Blueprint $table) {
            //
        });
    }
};
