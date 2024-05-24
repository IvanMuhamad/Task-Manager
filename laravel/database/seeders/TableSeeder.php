<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\users::factory()->count(10)->create()->each(function ($user){
            \App\Models\tasks::factory()->count(2)->create(['user_id' => $user->id]);
        });
    }
}
