<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AdresseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adresse_table', function (Blueprint $table) {
            $table->id();
            $table->integer('numero');
            $table->string('adresse');
            $table->string('complement_adresse')->nullable();
            $table->integer('code_postal');
            $table->string('ville');
            $table->string('pays');
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
        Schema::dropIfExists('adresse_table');
    }
}
