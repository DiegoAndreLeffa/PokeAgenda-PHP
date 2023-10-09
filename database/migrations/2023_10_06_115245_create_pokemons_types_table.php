<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePokemonsTypesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pokemons_types', function (Blueprint $table) {
            $table->id();
            $table->integer('id_pokemon');
            $table->integer('id_type');

            $table->foreign('id_pokemon')->references('id')->on('pokemons');
            $table->foreign('id_type')->references('id')->on('types');

            $table->unique(['id_pokemon', 'id_type']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pokemons_types');
    }
}
