<?php


namespace App\Services;

use App\Models\Pokemon;
use Illuminate\Support\Facades\DB;

class PokemonService
{
    public function getAll()
    {
        return Pokemon::select('pokemons.*', 'types.name as tipo', 'types.id as tipo_id')
            ->join('pokemons_types', 'pokemons.id', '=', 'pokemons_types.id_pokemon')
            ->join('types', 'pokemons_types.id_type', '=', 'types.id')
            ->get()
            ->groupBy('id')
            ->map(function ($grouped) {
                $first = $grouped->first();
                $first->tipos = $grouped->map(function ($item) {
                    return [
                        'id' => $item->tipo_id,
                        'name' => $item->tipo,
                    ];
                })->toArray();
                unset($first->tipo_id, $first->tipo);
                return $first;
            });
    }


    public function create(array $data)
    {
        return Pokemon::create($data);
    }

    public function find($id)
    {
        return Pokemon::findOrFail($id);
    }

    public function update($id, array $data)
    {
        $pokemon = Pokemon::findOrFail($id);
        $pokemon->update($data);
        return $pokemon;
    }

    public function delete($id)
    {
        $pokemon = Pokemon::findOrFail($id);
        $pokemon->delete();
    }

    public function getByType($type)
    {
        return Pokemon::select('pokemons.*', 'types.name as tipo', 'types.id as tipo_id')
            ->join('pokemons_types', 'pokemons.id', '=', 'pokemons_types.id_pokemon')
            ->join('types', 'pokemons_types.id_type', '=', 'types.id')
            ->whereRaw('LOWER(types.name) = LOWER(?)', [$type])
            ->orWhereExists(function ($query) use ($type) {
                $query->select(DB::raw(1))
                    ->from('pokemons_types as pt')
                    ->join('types as t', 'pt.id_type', '=', 't.id')
                    ->whereRaw('LOWER(t.name) = LOWER(?)', [$type])
                    ->whereRaw('pt.id_pokemon = pokemons.id');
            })
            ->get()
            ->groupBy('id')
            ->map(function ($grouped) {
                $first = $grouped->first();
                $first->tipos = $grouped->map(function ($item) {
                    return [
                        'id' => $item->tipo_id,
                        'name' => $item->tipo,
                    ];
                })->toArray();
                unset($first->tipo_id, $first->tipo);
                return $first;
            });
    }
}
