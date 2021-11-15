<?php

namespace Database\Factories;

use App\Models\Materi;
use App\Models\Bab;
use Illuminate\Database\Eloquent\Factories\Factory;

class MateriFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'bab_id'=>Bab::inRandomOrder()->orderBy('id')->first(),
            'title'=>$this->faker->title,
            'content'=>$this->faker->paragraph,
        ];
    }
}
