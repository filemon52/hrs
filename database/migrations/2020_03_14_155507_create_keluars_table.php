<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKeluarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('keluars', function (Blueprint $table) {
            $table->string('id_keluar', 50)->primary();
            $table->string('nama', 50);
            $table->string('jenis', 50);
            $table->string('kendaraan', 50);
            $table->string('merk', 50);
            $table->string('tipe', 50);
            $table->string('id_stok', 50);
            $table->integer('qty');
            $table->integer('harga');
            $table->integer('total_harga');
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
        Schema::dropIfExists('keluars');
    }
}
