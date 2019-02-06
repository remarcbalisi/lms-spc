<?php

use Illuminate\Database\Seeder;

class PostTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('post_type')->insert([
            'name' => 'Announcement',
            'slug' => 'announcement',
        ]);

        DB::table('post_type')->insert([
            'name' => 'Activity',
            'slug' => 'activity',
        ]);
    }
}
