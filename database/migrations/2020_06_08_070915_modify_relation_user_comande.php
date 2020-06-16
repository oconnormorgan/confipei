<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyRelationUserComande extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        
        Schema::dropIfExists('users_has_commande');

        Schema::enableForeignKeyConstraints();

        Schema::table('commande_table', function (Blueprint $table) {
            $table->unsignedBigInteger('id_user');
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
        Schema::enableForeignKeyConstraints();

        Schema::create('users_has_commande', function (Blueprint $table) {
            $table->biginteger('id_user')->unsigned();
            $table->foreign('id_user')->references('id')->on('users_table');
            $table->biginteger('id_commande')->unsigned();
            $table->foreign('id_commande')->references('id')->on('commande_table');
        });

        Schema::disableForeignKeyConstraints();
        
        Schema::table('commande_table', function (Blueprint $table) {
            $table->dropForeign(['id_user']);
            $table->dropColumn('id_user');
        });
    }
}
