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

        DB::table('users')->insert([
            'fname' => 'Admin 2',
            'mname' => 'Admin Middle name 2',
            'lname' => 'Admin Last name 2',
            'email' => 'admin2@gmail.com',
            'password' => bcrypt('admin'),
        ]);

        DB::table('users')->insert([
            'fname' => 'Lecturer',
            'mname' => 'Lecturer Middlename',
            'lname' => 'Lecturer Lastname',
            'email' => 'lecturer@gmail.com',
            'password' => bcrypt('lecturer'),
        ]);

        DB::table('users')->insert([
            'fname' => 'Learner',
            'mname' => 'Learner Middlename',
            'lname' => 'Learner Lastname',
            'email' => 'learner@gmail.com',
            'password' => bcrypt('learner'),
        ]);
    }
}
