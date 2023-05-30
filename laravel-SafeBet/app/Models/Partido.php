<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partido extends Model
{
    use HasFactory;

    protected $fillable = 
    [
        'torneo_id',
        'url',
        'is_double',
        'home_name',
        'away_name',
        'urlname_torneo',
        'homeResult',
        'awayResult',
        'home_winner',
        'away_winner',
        'info',
        'partialresult',
        'result',
        'country_name', 
        'odds_local',
        'odds_visitor'
    ];
}
