<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrivilegeRoleUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('privilege_role_user', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('role_user_id');
            $table->unsignedInteger('privilege_id');

            $table->foreign('role_user_id')->references('id')->on('role_user');
            $table->foreign('privilege_id')->references('id')->on('privilege');
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
        Schema::dropIfExists('privilege_role_user');
    }
}
