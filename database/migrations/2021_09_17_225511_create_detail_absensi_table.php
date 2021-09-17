<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailAbsensiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_absensi', function (Blueprint $table) {
            $table->string('id_detail_absensi', 32)->primary();
            $table->string('id_absensi', 32)->index('detail_absensi_fk');
            $table->timestamp('jam_masuk')->useCurrent();
            $table->timestamp('jam_keluar')->useCurrent();
            $table->string('lokasi', 500);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_absensi');
    }
}
