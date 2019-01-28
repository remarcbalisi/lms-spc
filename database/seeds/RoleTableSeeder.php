<?php

use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('role')->insert([
            'name' => 'Admin',
            'slug' => 'admin',
        ]);

        DB::table('role')->insert([
            'name' => 'Lecturer',
            'slug' => 'lecturer',
        ]);

        DB::table('role')->insert([
            'name' => 'Learner',
            'slug' => 'learner',
        ]);

    }
}
