<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\PokemonService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PokemonController extends Controller
{
    private $pokemonService;

    public function __construct(PokemonService $pokemonService)
    {
        $this->pokemonService = $pokemonService;
    }

    public function index(Request $request, $type = null)
    {
        if ($type == null) {
            $pokemons = $this->pokemonService->getAll();
        } else {
            $pokemons = $this->pokemonService->getByType($type);
        }

        return response()->json($pokemons);
    }

    public function store(Request $request)
    {
        $pokemon = $this->pokemonService->create($request->all());
        return response()->json($pokemon, 201);
    }

    public function show($id)
    {
        $pokemon = $this->pokemonService->find($id);
        return response()->json($pokemon);
    }

    public function update(Request $request, $id)
    {
        $pokemon = $this->pokemonService->update($id, $request->all());
        return response()->json($pokemon);
    }

    public function destroy($id)
    {
        $this->pokemonService->delete($id);
        return response()->json(null, 204);
    }
}
