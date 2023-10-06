<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;

    protected $table = 'types';

    protected $fillable = [
        'name',
    ];

    public function pokemons()
    {
        return $this->belongsToMany(Pokemon::class, 'pokemons_types', 'id_type', 'id_pokemon');
    }
}
