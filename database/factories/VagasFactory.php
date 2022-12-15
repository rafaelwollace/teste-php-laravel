<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Vagas;


class VagasFactory extends Factory
{
    protected $model = Vagas::class;
    
    public function definition()
    {
        return [
            'titulo_vaga' => fake()->sentence(2),
            'descricao_vaga' => fake()->text(),
            'status_vaga' => fake()->boolean(),
            'tipo_vaga' => 'CLT'
        ];
    }



}