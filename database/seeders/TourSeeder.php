<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TourSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tours')->insert([
            'name' => 'ATP Tour',
            'icono' => 'atp',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    
        DB::table('tours')->insert([
            'name' => 'WTA Tour',
            'icono' => 'wta',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
   
        DB::table('tours')->insert([
            'name' => 'ITF Tour',
            'icono' => 'itf',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    
        DB::table('tours')->insert([
            'name' => 'UTR Tour',
            'icono' => 'utr',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
