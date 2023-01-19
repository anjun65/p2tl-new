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
        Schema::create('barang_buktis', function (Blueprint $table) {
            $table->id();

            $table->foreignId('works_id')->constrained('work_orders')->onDelete('cascade')->onUpdate('cascade');
            $table->string('nama_saksi')->nullable();
            $table->string('alamat_saksi')->nullable();
            $table->string('nomor_identitas')->nullable();
            $table->string('no_telpon_saksi')->nullable();
            $table->string('file_identitas')->nullable();
            $table->string('jenis_kabel')->nullable();
            $table->string('panjang_kabel')->nullable();
            $table->string('tera')->nullable();
            $table->string('terminal_kwh_meter')->nullable();
            $table->string('box_ok')->nullable();
            $table->string('box_app')->nullable();
            $table->string('alat_pembatas')->nullable();
            $table->string('alat_bantu_ukur')->nullable();
            $table->string('file_barang_bukti')->nullable();


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
        Schema::dropIfExists('barang_buktis');
    }
};
