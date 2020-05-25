<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyConfitureTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('confiture_table', function (Blueprint $table) {
            $table->unsignedBigInteger('id_producteur');
            $table->string('image')->nullable();
        });

        Schema::table('confiture_table', function (Blueprint $table) {
            $table->foreign('id_producteur')->references('id')->on('producteur_table');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('confiture_table');
    }
}
