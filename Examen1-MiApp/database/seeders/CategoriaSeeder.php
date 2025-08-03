<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    // database/seeders/CategoriaSeeder.php
public function run()
{
    $categorias = [
        [
            'nombre' => 'Running',
            'slug' => 'running',
            'descripcion' => 'Zapatos diseñados para correr'
        ],
        [
            'nombre' => 'Basketball',
            'slug' => 'basketball',
            'descripcion' => 'Tenis para jugar baloncesto'
        ],
        [
            'nombre' => 'Skateboarding',
            'slug' => 'skateboarding',
            'descripcion' => 'Zapatos para andar en skate'
        ],
        [
            'nombre' => 'Casual',
            'slug' => 'casual',
            'descripcion' => 'Tenis para uso diario'
        ]
    ];

    foreach($categorias as $categoria){
        \App\Models\Categoria::create($categoria);
    }
}
}
