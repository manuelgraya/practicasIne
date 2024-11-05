<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $aRegister = [
            [
                'id' => 1,
                'name' => 'Portatil',
                'description' => 'Portatil HP 15.6" 8GB RAM 1TB',
                'image' => 'portatil.png',
                'price' => 1000.00,
                'company_id' => 1,
            ],
            [
                'id' => 2,
                'name' => 'Raton',
                'description' => 'Raton Logitech G203',
                'image' => 'raton.png',
                'price' => 30.00,
                'company_id' => 2,
            ],
            [
                'id' => 3,
                'name' => 'Teclado',
                'description' => 'Teclado HyperX Alloy FPS',
                'image' => 'teclado.jpg',
                'price' => 100.00,
                'company_id' => 3,
            ],
            [
                'id' => 4,
                'name' => 'Monitor',
                'description' => 'Monitor LG 24" 144Hz',
                'image' => 'monitor.jpg',
                'price' => 200.00,
                'company_id' => 4,
            ],
            [
                'id' => 5,
                'name' => 'Auriculares',
                'description' => 'Auriculares HyperX Cloud II',
                'image' => 'auriculares.jpg',
                'price' => 20.00,
                'company_id' => 5,
            ],
        ];

        foreach ($aRegister as $register) {
            //\App\Models\Product::create($product);
            \App\Models\Product::updateOrCreate(['id' => $register['id']], $register);
        }
    }
}
