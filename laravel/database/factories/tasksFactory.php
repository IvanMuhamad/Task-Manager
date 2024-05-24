<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\tasks>
 */
class tasksFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => function() {
                \App\Models\tasks::factory()->create()->id;
            },
            'nama' => $this->faker->sentence,
            'deskripsi' => $this->faker->paragraph,
            'status' => $this->faker->randomElement(['Selesai', 'Belum Selesai']),
            'image' => null,
        ];

    }

}
