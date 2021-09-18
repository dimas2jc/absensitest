<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('user')->delete();
        
        \DB::table('user')->insert(array (
            0 => 
            array (
                'id_user' => '4aad36d175e84635a26e89eeffe13006',
                'nama' => 'hrd',
                'alamat' => NULL,
                'email' => 'hrd@gmail.com',
                'password' => '$2y$10$DXe6F2wUsX76JAZuvn1mw.TBaCdgztQiitiqH0SEAeia1PgnhLauC',
                'role' => 1,
                'status' => 1,
                'created_at' => '2021-09-18 18:44:28',
                'updated_at' => '2021-09-18 19:57:25',
            ),
            1 => 
            array (
                'id_user' => 'a247e02d86b244f6bf4aa15114bb1d92',
                'nama' => 'Manajer',
                'alamat' => 'Jl. Pare-Kediri rt/rw 003/005',
                'email' => 'manajer@gmail.com',
                'password' => '$2y$10$Y9LCsYGiIwBQrHs5WpqIwu/s30HBrjrs47N4kO6z5QfiXQ9WX50QK',
                'role' => 2,
                'status' => 1,
                'created_at' => '2021-09-18 18:34:52',
                'updated_at' => '2021-09-18 19:15:26',
            ),
        ));
        
        
    }
}