<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Modify2ConfitureTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('confiture_table', function (Blueprint $table) {
            $table->unsignedBigInteger('id_image');
        });
        Schema::table('confiture_table', function (Blueprint $table) {
            $table->foreign('id_image')->references('id')->on('image_confiture');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('confiture_table', function (Blueprint $table) {
            Schema::disableForeignKeyConstraints();
            $table->dropForeign(['id_image']);
            $table->dropIfExists('id_image');
        });
        Schema::dropIfExists('confiture_table');
    }
}
