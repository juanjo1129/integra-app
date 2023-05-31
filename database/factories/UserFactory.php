<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // Para que parezca una cédula
            'user' => $this->faker->numberBetween(10000000),
            'password' => Hash::make('password'),
            'marketing' => $this->faker->boolean,
            // ¿Activado?
            'status' => 1,
            // ¿Activado?
            'sms' => 1,
            // ¿Validado?
            'validation' => 1,
            // TODO:
            // Asociar al contacto 1, que puede que no sea el administrador.
            // Hay que revisar esto.
            'contact_id' => 1,
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ];
    }
}
