<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CommandeHasConfiture extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commande_has_confiture', function (Blueprint $table) {
            $table->biginteger('id_commande')->unsigned();
            $table->foreign('id_commande')->references('id')->on('commande_table');
            $table->biginteger('id_confiture')->unsigned();
            $table->foreign('id_confiture')->references('id')->on('confiture_table');
            $table->integer('quantite');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('commande_has_confiture', function (Blueprint $table) {
            Schema::disableForeignKeyConstraints();
            $table->dropForeign(['id_commande']);
            $table->dropIfExists('id_confiture');
        });
        Schema::dropIfExists('commande_has_confiture');
    }
}
