<?php

use Illuminate\Database\Seeder;

class Admins extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admins     = [
            '0' => [
                'nombres'   => 'Victor Manuel',
                'email'     => 'admin@admin.com',
                'password'  => bcrypt('135790')
            ],
        ];
        //

        DB::table('administradores')->insert($admins);
    }
}
