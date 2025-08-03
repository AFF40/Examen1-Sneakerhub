<?php

namespace Database\Seeders;

use App\Models\Categoria;
use Illuminate\Database\Seeder;

class CategoriaSeeder extends Seeder
{
    public function run(): void
    {
        $categorias = [
            [
                'nombre' => 'Running',
                'descripcion' => 'Zapatos para correr'
            ],
            [
                'nombre' => 'Basketball',
                'descripcion' => 'Zapatos para baloncesto'
            ],
            [
                'nombre' => 'Skateboarding',
                'descripcion' => 'Zapatos para skate'
            ],
            [
                'nombre' => 'Casual',
                'descripcion' => 'Zapatos para uso diario'
            ],
            [
                'nombre' => 'Fútbol',
                'descripcion' => 'Zapatos para fútbol'
            ],
            [
                'nombre' => 'Training',
                'descripcion' => 'Zapatos para entrenamiento'
            ]
        ];

        foreach ($categorias as $categoria) {
            Categoria::create($categoria);
        }
    }
}
