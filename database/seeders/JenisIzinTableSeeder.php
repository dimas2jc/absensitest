<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class JenisIzinTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('jenis_izin')->delete();
        
        \DB::table('jenis_izin')->insert(array (
            0 => 
            array (
                'id_jenis_izin' => '22d842e7494948d087fae0eae6bd11c8',
                'nama' => 'Sakit',
            ),
            1 => 
            array (
                'id_jenis_izin' => '41d70a2bc0994802af3eb5f246a3ab0e',
                'nama' => 'Cuti',
            ),
        ));
        
        
    }
}