<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ConfitureHasFruit extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('confiture_has_fruit', function (Blueprint $table) {
            $table->biginteger('id_confiture')->unsigned();
            $table->foreign('id_confiture')->references('id')->on('confiture_table');
            $table->biginteger('id_fruit')->unsigned();
            $table->foreign('id_fruit')->references('id')->on('fruit_table');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('confiture_has_fruit', function (Blueprint $table) {
            Schema::disableForeignKeyConstraints();
            $table->dropForeign(['id_confiture']);
            $table->dropIfExists('id_fruit');
        });
        Schema::dropIfExists('confiture_has_fruit');
    }
}
