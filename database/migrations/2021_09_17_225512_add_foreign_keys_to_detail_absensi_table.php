<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToDetailAbsensiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('detail_absensi', function (Blueprint $table) {
            $table->foreign('id_absensi', 'detail_absensi_ibfk_1')->references('id_absensi')->on('absensi');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('detail_absensi', function (Blueprint $table) {
            $table->dropForeign('detail_absensi_ibfk_1');
        });
    }
}
