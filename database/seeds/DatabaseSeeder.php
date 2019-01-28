<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(RoleTableSeeder::class);
        $this->call(RoleUserTableSeeder::class);
        $this->call(PrivilegeTableSeeder::class);
        $this->call(PrivilegeRoleUserTableSeeder::class);
        $this->call(FiftyUserSeeder::class);
    }
}
