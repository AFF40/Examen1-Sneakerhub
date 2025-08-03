<?php

namespace Database\Seeders;

use App\Models\Producto;
use Illuminate\Database\Seeder;

class ProductoSeeder extends Seeder
{
    public function run(): void
    {
        $productos = [
            [
                'nombre' => 'Nike Air Max 90',
                'descripcion' => 'Zapatillas clásicas de running',
                'precio' => 129.99,
                'stock' => 50,
                'marca_id' => 1, // Nike
                'categoria_id' => 1, // Running
                'imagen_url' => 'https://i.ebayimg.com/images/g/l28AAOSwTChi~mcN/s-l2400.jpg'
            ],
            [
                'nombre' => 'Adidas Ultraboost',
                'descripcion' => 'Zapatillas con tecnología Boost',
                'precio' => 179.99,
                'stock' => 30,
                'marca_id' => 2, // Adidas
                'categoria_id' => 1, // Running
                'imagen_url' => 'https://i.ebayimg.com/thumbs/images/g/9uQAAeSwuSNnuZBc/s-l1200.jpg'
            ],
            [
                'nombre' => 'Puma RS-X',
                'descripcion' => 'Zapatillas urbanas con estilo retro',
                'precio' => 99.99,
                'stock' => 40,
                'marca_id' => 3, // Puma
                'categoria_id' => 4, // Casual
                'imagen_url' => 'https://i.ebayimg.com/images/g/iQoAAOSwI7tjvZYJ/s-l400.jpg'
            ],
            [
                'nombre' => 'New Balance 574',
                'descripcion' => 'Zapatillas icónicas de New Balance',
                'precio' => 89.99,
                'stock' => 60,
                'marca_id' => 4, // New Balance
                'categoria_id' => 4, // Casual
                'imagen_url' => 'https://i.ebayimg.com/images/g/opMAAOSweTBlLXqm/s-l400.jpg'
            ],
            [
                'nombre' => 'Nike Air Jordan 1',
                'descripcion' => 'Zapatillas de baloncesto legendarias',
                'precio' => 159.99,
                'stock' => 25,
                'marca_id' => 1, // Nike
                'categoria_id' => 2, // Basketball
                'imagen_url' => 'https://i.ebayimg.com/images/g/KDUAAOSwBOdlPAWG/s-l400.jpg'
            ]
        ];

        foreach ($productos as $producto) {
            Producto::create($producto);
        }
    }
}
