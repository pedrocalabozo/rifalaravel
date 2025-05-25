<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserFactory extends Factory
{
    protected $model = User::class;

    public function definition()
    {
        return [
            'google_id' => $this->faker->unique()->word,
            'email' => $this->faker->unique()->safeEmail,
            'nombre' => $this->faker->firstName,
            'apellido' => $this->faker->lastName,
            'telefono' => $this->faker->phoneNumber,
            'numero_id' => $this->faker->unique()->word,
            'imagen_perfil' => $this->faker->imageUrl(),
        ];
    }
}
