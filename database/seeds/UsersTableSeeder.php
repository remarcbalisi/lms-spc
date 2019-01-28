<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'fname' => 'Remarc',
            'mname' => 'Espinosa',
            'lname' => 'Balisi',
            'email' => 'remarc.balisi@gmail.com',
            'password' => bcrypt('admin'),
        ]);
    }
}
