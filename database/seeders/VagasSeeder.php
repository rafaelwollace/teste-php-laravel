<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Vagas;


class VagasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $vagas = new Vagas();

        Vagas::factory()->count(100)->create();
    }
}