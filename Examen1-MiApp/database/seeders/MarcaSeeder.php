<?php

namespace Database\Seeders;

use App\Models\Marca;
use Illuminate\Database\Seeder;

class MarcaSeeder extends Seeder
{
    public function run(): void
    {
        $marcas = [
            [
                'nombre' => 'Nike',
                'pais_origen' => 'Estados Unidos'
            ],
            [
                'nombre' => 'Adidas',
                'pais_origen' => 'Alemania'
            ],
            [
                'nombre' => 'Puma',
                'pais_origen' => 'Alemania'
            ],
            [
                'nombre' => 'New Balance',
                'pais_origen' => 'Estados Unidos'
            ],
            [
                'nombre' => 'Reebok',
                'pais_origen' => 'Reino Unido'
            ],
            [
                'nombre' => 'Converse',
                'pais_origen' => 'Estados Unidos'
            ],
            [
                'nombre' => 'Vans',
                'pais_origen' => 'Estados Unidos'
            ]
        ];

        foreach ($marcas as $marca) {
            Marca::create($marca);
        }
    }
}