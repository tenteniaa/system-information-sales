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
        Schema::create('penjualan', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_pelanggan')->nullable();
            $table->integer('total_item');
            $table->bigInteger('total_harga');
            $table->tinyInteger('diskon')->default(0);
            $table->bigInteger('bayar')->default(0);
            $table->bigInteger('diterima')->default(0);
            $table->bigInteger('id_user');
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
        Schema::dropIfExists('penjualan');
    }
};
