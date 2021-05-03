<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;



class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert(array(
                array(
    'name' => "liyakat",
    'email' => 'admin@fancyfab.com',
    'password' => bcrypt('guddu_786'),
                ),
                array(
    'name' => "dev",
    'email' => 'dev.intaspharma@gmail.com',
    'password' => bcrypt('12345678'),
                )
            ));
    }
}
