<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengajuanIzinTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengajuan_izin', function (Blueprint $table) {
            $table->string('id_pengajuan', 32)->primary();
            $table->string('id_jenis_izin', 32)->index('pengajuan_fk1');
            $table->string('id_user', 32)->index('pengajuan_fk2');
            $table->date('tgl_mulai');
            $table->date('tgl_selesai');
            $table->integer('durasi');
            $table->smallInteger('status');
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
        Schema::dropIfExists('pengajuan_izin');
    }
}
