<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStoksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stoks', function (Blueprint $table) {
            $table->string('id_stok', 50)->primary();
            $table->string('nama_stok', 50);
            $table->string('jenis', 50);
            $table->string('kendaraan', 50);
            $table->string('merk', 50);
            $table->string('knalpot', 50);
            $table->string('tipe', 50);
            $table->integer('qty');
            $table->integer('harga');
            $table->integer('gambar')->nullable();
            $table->longText('display')->nullable();
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
        Schema::dropIfExists('stoks');
    }
}
