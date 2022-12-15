<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\VagaCandidato;
use App\Models\User;
use App\Models\Vagas;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class VagaCandidatoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

     protected $model = VagaCandidato::class;
     
    public function definition()
    {
        return [
            'fk_users' =>  User::all()->random()->id,
            'fk_vagas' =>  Vagas::all()->random()->id,
        ];
    }
}