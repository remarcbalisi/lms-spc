<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;	
use App\User;

class FiftyUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
    	foreach (range(1,25) as $index){
            
    		DB::table('users')->insert([
    			'fname' => $faker->firstname,
    			'mname' => $faker->lastname,
    			'lname' => $faker->lastname,
    			'email' => $faker->unique()->email,
    			'password' => bcrypt('test'),
            ]);
            
            $latest_id = User::all()->last()->id;

            DB::table('role_user')->insert([
    			'user_id' => $latest_id,
    			'role_id' => 2
            ]);
    	
        }
        
        foreach (range(1,25) as $index){
            
    		DB::table('users')->insert([
    			'fname' => $faker->firstname,
    			'mname' => $faker->lastname,
    			'lname' => $faker->lastname,
    			'email' => $faker->unique()->email,
    			'password' => bcrypt('test'),
            ]);
            
            $latest_id = User::all()->last()->id;

            DB::table('role_user')->insert([
    			'user_id' => $latest_id,
    			'role_id' => 3
            ]);
    	
        }
        
    }
}
