<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAcademicYearSemester extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('academic_year_semester', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('academic_year_id');
            $table->unsignedInteger('semester_id');

            $table->foreign('academic_year_id')->references('id')->on('academic_year');
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
        Schema::dropIfExists('academic_year_semester');
    }
}
