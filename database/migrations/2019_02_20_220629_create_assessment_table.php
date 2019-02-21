<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssessmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assessment', function (Blueprint $table) {
            $table->increments('id');
            $table->float('score');
            $table->float('total_items');
            $table->date('date_taken');
            $table->unsignedInteger('assessment_type_id');
            $table->unsignedInteger('course_subject_user_id');

            $table->foreign('assessment_type_id')->references('id')->on('assessment_type');
            $table->foreign('course_subject_user_id')->references('id')->on('course_subject_user');
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
        Schema::dropIfExists('assessment');
    }
}
