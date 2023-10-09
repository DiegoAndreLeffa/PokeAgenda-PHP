<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PokemonType extends Model
{
    use HasFactory;

    protected $table = 'pokemons_types';
    public $timestamps = false;

    protected $fillable = [
        'id_pokemon',
        'id_type',
    ];
}
