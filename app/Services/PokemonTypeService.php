<?php

namespace App\Services;

use App\Models\Pokemon;
use App\Models\Type;
use App\Models\PokemonType;

class PokemonTypeService
{
    public function getAll()
    {
        return PokemonType::all();
    }

    public function create(array $data)
    {
        $pokemonName = $data['pokemon_name'];
        $typeName = $data['type_name'];

        // Verificar se o Pokémon e o Tipo existem
        $pokemon = Pokemon::whereRaw('LOWER(name) = LOWER(?)', [$pokemonName])->first();
        $type = Type::whereRaw('LOWER(name) = LOWER(?)', [$typeName])->first();

        if (!$pokemon) {
            return 'pokemon_not_found';
        }

        if (!$type) {
            return 'type_not_found';
        }

        // Criar uma nova entrada na tabela pokemons_types
        PokemonType::create([
            'id_pokemon' => $pokemon->id,
            'id_type' => $type->id,
        ]);

        // Retornar a nova entrada na tabela pokemons_types
        return PokemonType::where([
            'id_pokemon' => $pokemon->id,
            'id_type' => $type->id,
        ])->first();
    }

    public function update($id, array $data)
    {
        $pokemonType = PokemonType::find($id);

        if (!$pokemonType) {
            return 'pokemon_type_not_found';
        }

        $pokemonName = $data['pokemon_name'];
        $typeName = $data['pokemon_type'];

        $pokemon = Pokemon::whereRaw('LOWER(name) = LOWER(?)', [$pokemonName])->first();
        $type = Type::whereRaw('LOWER(name) = LOWER(?)', [$typeName])->first();

        if (!$pokemon) {
            return 'pokemon_not_found';
        }

        if (!$type) {
            return 'type_not_found';
        }

        $pokemonType->id_pokemon = $pokemon->id;
        $pokemonType->id_type = $type->id;
        $pokemonType->save();

        return $pokemonType;
    }

    public function delete($id)
    {
        $pokemonType = PokemonType::find($id);

        if ($pokemonType) {
            $pokemonType->delete();
        }
    }
}
