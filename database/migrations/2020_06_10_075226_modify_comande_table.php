<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyComandeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('commande_table', function (Blueprint $table) {
            $table->bigInteger('id_adresse_facturation')->unsigned();
            $table->bigInteger('id_adresse_livraison')->unsigned();
            $table->foreign('id_adresse_facturation')->references('id')->on('adresse_table');
            $table->foreign('id_adresse_livraison')->references('id')->on('adresse_table');
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
            $table->dropForeign(['id_adresse_facturation']);
            $table->dropForeign(['id_adresse_livraison']);
            $table->dropColumn('id_adresse_facturation');
            $table->dropColumn('id_adresse_livraison');
        });
    }
}
