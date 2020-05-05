<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users_table', function (Blueprint $table) {
            $table->unsignedBigInteger('id_role');
        });


        Schema::table('users_table', function (Blueprint $table) {
            $table->foreign('id_role')->references('id')->on('role_users_table');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users_table');
    }
}
