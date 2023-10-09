<?php

use App\Http\Controllers\PokemonController;
use App\Http\Controllers\PokemonTypeController;
use App\Http\Controllers\TypeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/pokemons', [PokemonController::class, 'index']);
Route::get('/pokemons/{type}', [PokemonController::class, 'index'])
    ->where('type', '[A-Za-z]+');

Route::post('/pokemons', [PokemonController::class, 'store']);


Route::get('/types', [TypeController::class, 'index']);
Route::patch('/types/{id}', [TypeController::class, 'update']);


Route::get('/pokemons_types', [PokemonTypeController::class, 'index']);
Route::post('/pokemons_types', [PokemonTypeController::class, 'store']);

