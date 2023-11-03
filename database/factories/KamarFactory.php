<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Kamar>
 */
class KamarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'type_kamar'=>$this->faker->word(),
            'jumlah_kamar'=>rand(5,10),
            'harga'=>$this->faker->numberBetween(580000, 1500000),
            'deskripsi_kamar'=>$this->faker->paragraph()
        ];
    }
}
