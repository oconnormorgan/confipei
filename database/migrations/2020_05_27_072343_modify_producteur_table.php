<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyProducteurTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('producteur_table', function (Blueprint $table) {
            $table->unsignedBigInteger('id_user')->nullable();
        });

        Schema::table('producteur_table', function (Blueprint $table) {
            $table->foreign('id_user')->references('id')->on('users_table');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('producteur_table', function (Blueprint $table) {
            Schema::disableForeignKeyConstraints();
            $table->dropForeign(['id_user']);
            $table->dropIfExists('id_user');
        });
        Schema::dropIfExists('producteur_table');
    }
}
