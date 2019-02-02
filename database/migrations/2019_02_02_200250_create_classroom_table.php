<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClassroomTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('classroom', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('academic_year_id');
            $table->unsignedInteger('section_id');
            $table->unsignedInteger('course_id');
            $table->unsignedInteger('semester_id');

            $table->foreign('academic_year_id')->references('id')->on('academic_year');
            $table->foreign('section_id')->references('id')->on('section');
            $table->foreign('course_id')->references('id')->on('course');
            $table->foreign('semester_id')->references('id')->on('semester');
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
        Schema::dropIfExists('classroom');
    }
}
