<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlaystationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Playstation::create([
    'name' => 'PS 1',
    'type' => 'PS5',
    'price_per_hour' => 10000
]);//
    }
}
