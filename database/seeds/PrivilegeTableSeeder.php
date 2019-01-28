<?php

use Illuminate\Database\Seeder;

class PrivilegeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('privilege')->insert([
            'action' => 'create',
            'table' => 'users',
        ]);

        DB::table('privilege')->insert([
            'action' => 'view',
            'table' => 'users',
        ]);

        DB::table('privilege')->insert([
            'action' => 'update',
            'table' => 'users',
        ]);

        DB::table('privilege')->insert([
            'action' => 'delete',
            'table' => 'users',
        ]);

    }
}
