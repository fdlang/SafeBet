<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FavoritoPartido extends Model
{
    use HasFactory;
    
    protected $fillable = 
    [
        'favorito_id',
        'partido_id',
    ];

}
