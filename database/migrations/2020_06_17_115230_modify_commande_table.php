<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyCommandeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('commande_table', function (Blueprint $table) {
            $table->bigInteger('id_statut')->unsigned();
            $table->foreign('id_statut')->references('id')->on('statuts_table');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('commande_table', function (Blueprint $table) {
            $table->dropForeign(['id_statut']);
            $table->dropColumn('id_statut');
        });
    }
}
