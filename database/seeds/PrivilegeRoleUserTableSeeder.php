<?php

use Illuminate\Database\Seeder;

class PrivilegeRoleUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('privilege_role_user')->insert([
            'role_user_id' => 1,
            'privilege_id' => 1,
        ]);

        DB::table('privilege_role_user')->insert([
            'role_user_id' => 1,
            'privilege_id' => 2,
        ]);

        DB::table('privilege_role_user')->insert([
            'role_user_id' => 1,
            'privilege_id' => 3,
        ]);

        DB::table('privilege_role_user')->insert([
            'role_user_id' => 1,
            'privilege_id' => 4,
        ]);

    }
}
