<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
                'name' => 'usuario',
                'surname' => 'apellido',
                'email' => 'correo@correo.com',
                'password' => '12345678Q!',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
    }
}
