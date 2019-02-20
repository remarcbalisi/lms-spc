<?php

use Illuminate\Database\Seeder;

class AssessmentTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('assessment_type')->insert([
            'type' => 'Quiz',
            'slug' => 'quiz',
        ]);

        DB::table('assessment_type')->insert([
            'type' => 'Assignment',
            'slug' => 'assignment',
        ]);

        DB::table('assessment_type')->insert([
            'type' => 'Prelim Exam',
            'slug' => 'prelim-exam',
        ]);
    }
}
