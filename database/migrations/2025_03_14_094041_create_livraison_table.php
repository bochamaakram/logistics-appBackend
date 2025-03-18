<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('livraisons', function (Blueprint $table) {
        $table->id();
        $table->string('num_command_client');
        $table->string('num_commande_cami');
        $table->string('nom_client');
        $table->string('tel_client');
        $table->text('Produits');
        $table->string('Ville_de_Livraison');
        $table->string('adresse_de_Livraison');
        $table->date('Date_de_Livraison');
        $table->integer('quantité');
        $table->string('commertial');
        $table->string('Matricule');
        $table->decimal('kilométrage');
        $table->integer('prix_Plein');
        $table->string('Chauffeur');
        $table->decimal('poids_total', 10, 2)->nullable();
        $table->decimal('épaisseur_total', 10, 2)->nullable();
        $table->decimal('hauteur', 8, 2)->nullable();
        $table->decimal('largeur', 8, 2)->nullable(); 
        $table->text('remarque')->nullable();
        $table->timestamps();
    });

}

/**
 * Reverse the migrations.
 */
public function down()
{
    Schema::dropIfExists('livraisons');
}
};