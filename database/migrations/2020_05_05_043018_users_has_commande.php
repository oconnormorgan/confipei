<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UsersHasCommande extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_has_commande', function (Blueprint $table) {
            $table->biginteger('id_user')->unsigned();
            $table->foreign('id_user')->references('id')->on('users_table');
            $table->biginteger('id_commande')->unsigned();
            $table->foreign('id_commande')->references('id')->on('commande_table');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users_has_commande');
    }
}
