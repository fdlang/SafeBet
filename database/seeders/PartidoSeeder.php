<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PartidoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('partidos')->insert([
            'torneo_id' => 42,
            'url' => '/tennis/spain/atp-madrid/khachanov-karen-rublev-andrey-MLwaSbJq/',
            'is_double' => false,
            'home_name' => 'Khachanov K.',
            'away_name' => 'Rublev A.',
            'urlname_torneo' => 'http://api.brokersports.club/api/v2/tennis/spain/atp-madrid/',
            'homeResult' => '0',
            'awayResult' => '2',
            'home_winner' => 'lost',
            'away_winner' => 'win',
            'info' => 'null',
            'partialresult' => '3:6, 3:6',
            'result' => '0:2',
            'country_name' => 'spain', 
            'odds_local' => 1.45,
            'odds_visitor' => 2.56,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
