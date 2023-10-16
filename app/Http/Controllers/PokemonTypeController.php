<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\PokemonTypeService;
use Illuminate\Http\Request;

class PokemonTypeController extends Controller
{
    private $pokemonTypesService;

    public function __construct(PokemonTypeService $pokemonTypesService)
    {
        $this->pokemonTypesService = $pokemonTypesService;
    }

    public function index()
    {
        $pokemonsTypes = $this->pokemonTypesService->getAll();
        return response()->json($pokemonsTypes);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'pokemon_name' => 'required|string',
            'type_name' => 'required|string',
        ]);

        $result = $this->pokemonTypesService->create($data);

        if ($result === 'pokemon_not_found') {
            return response()->json(['error' => 'Pokemon not found'], 404);
        } elseif ($result === 'type_not_found') {
            return response()->json(['error' => 'Type not found'], 404);
        } else {
            return response()->json($result, 201);
        }
    }



    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'pokemon_name' => 'required|string',
            'pokemon_type' => 'required|string',
        ]);

        $result = $this->pokemonTypesService->update($id, $data);

        if ($result === 'pokemon_not_found') {
            return response()->json(['error' => 'Pokemon not found'], 404);
        } elseif ($result === 'type_not_found') {
            return response()->json(['error' => 'Type not found'], 404);
        } else {
            return response()->json($result);
        }
    }

    public function destroy($id)
    {
        $this->pokemonTypesService->delete($id);
        return response()->json(null, 204);
    }
}
