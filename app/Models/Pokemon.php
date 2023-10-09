<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pokemon extends Model
{
    use HasFactory;

    protected $table = 'pokemons';
    public $timestamps = false;
    
    protected $fillable = [
        'name',
        'number_dex',
        'previous_evolution',
        'img',
        'description',
    ];

    public function types()
    {
        return $this->belongsToMany(Type::class, 'pokemons_types', 'id_pokemon', 'id_type');
    }
}
