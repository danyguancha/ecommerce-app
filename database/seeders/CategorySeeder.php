<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Categoria 1',
                'description' => 'Descripción de la Categoria 1',
                'state' => 'available',
            ],
            [
                'name' => 'Categoria 2',
                'description' => 'Descripción de la Categoria 2',
                'state' => 'available',
            ],
            [
                'name' => 'Categoria 3',
                'description' => 'Descripción de la Categoria 3',
                'state' => 'discontinued',
            ],
            // Agrega más categorías aquí...
        ];
        foreach ($categories as $categoryData) {
            Category::create($categoryData);
        }
    }
}
