<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('camions', function (Blueprint $table) {
            $table->id();
            $table->string('num_jawas')->unique();
            $table->string('matrecul')->unique();
            $table->integer('kilométrage')->length(11);
            $table->integer('vidange')->length(11);
            $table->decimal('poids_max', 10, 2);
            $table->decimal('hauteur_max', 10, 2);
            $table->decimal('largeur_max', 10, 2);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('camions');
    }
};