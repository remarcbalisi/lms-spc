<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCourseSectionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_subject', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('course_id');
            $table->unsignedInteger('subject_id');
            $table->unsignedInteger('academic_year_semester_id');
            $table->unsignedInteger('section_id');

            $table->foreign('course_id')->references('id')->on('course');
            $table->foreign('subject_id')->references('id')->on('subject');
            $table->foreign('academic_year_semester_id')->references('id')->on('academic_year_semester');
            $table->foreign('section_id')->references('id')->on('section');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('course_subject');
    }
}
