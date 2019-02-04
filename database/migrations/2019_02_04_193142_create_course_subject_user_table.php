<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCourseSubjectUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_subject_user', function (Blueprint $table) {
            $table->increments('id');
            $table->longText('activation_link')->nullable();
            $table->boolean('is_activated')->default(false);
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('course_subject_id');

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('course_subject_id')->references('id')->on('course_subject');
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
        Schema::dropIfExists('course_subject_user');
    }
}
