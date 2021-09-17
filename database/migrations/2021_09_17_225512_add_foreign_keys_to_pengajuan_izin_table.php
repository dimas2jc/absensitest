<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToPengajuanIzinTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pengajuan_izin', function (Blueprint $table) {
            $table->foreign('id_jenis_izin', 'pengajuan_izin_ibfk_1')->references('id_jenis_izin')->on('jenis_izin');
            $table->foreign('id_user', 'pengajuan_izin_ibfk_2')->references('id_user')->on('user');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pengajuan_izin', function (Blueprint $table) {
            $table->dropForeign('pengajuan_izin_ibfk_1');
            $table->dropForeign('pengajuan_izin_ibfk_2');
        });
    }
}
