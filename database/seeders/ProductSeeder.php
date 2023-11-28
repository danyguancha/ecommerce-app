<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'fk_category_id' => 1,
                'code' => 'COD-1',
                'name' => 'Samsung Galaxy S21',
                'price' => 6000000,
                'stock'=> 20,
                'description' => 'Samsung Galaxy S21 5G | Factory Unlocked Android Cell Phone | US Version 5G Smartphone | Pro-Grade Camera, 8K Video, 64MP High Res | 128GB, Phantom Gray (SM-G991UZAAXAA)',
                'image'=> 'https://www.cqnetcr.com/103513-thickbox_default/celular-samsung-galaxy-s21-violeta-64mp-4500mah.jpg',
                'estado' => 'available',
                'slug'=> 'samsung-galaxy-s21',
            ],
            [
                'fk_category_id'=> 2,
                'code'=> 'COD-2',
                'name'=> 'Samsung Galaxy S20',
                'price'=> 5000000,
                'stock'=> 20,
                'description'=> 'Samsung Galaxy S20 FE 5G | Factory Unlocked Android Cell Phone | 128 GB | US Version Smartphone | Pro-Grade Camera, 30X Space Zoom, Night Mode | Cloud Navy',
                'image'=> 'https://th.bing.com/th/id/OIP.xH6H_qhbHT9Xx7x50O4tMwHaHa?pid=ImgDet&rs=1',
                'estado'=> 'available',
                'slug'=> 'samsung-galaxy-s20',
            ],
            [
                'fk_category_id'=> 1,
                'code'=> 'COD-3',
                'name'=> 'Samsung Galaxy S10',
                'price'=> 4000000,
                'stock'=> 20,
                'description'=> 'Samsung Galaxy S10 Factory Unlocked Android Cell Phone | US Version | 128GB of Storage | Fingerprint ID and Facial Recognition | Long-Lasting Battery | Prism Black',
                'image'=> 'https://th.bing.com/th/id/R.1afca8fc80e2dd0747089bd5e1af594c?rik=BNLz6yvX6pTWVg&pid=ImgRaw&r=0',
                'estado'=> 'available',
                'slug'=> 'samsung-galaxy-s10',
            ],
            [
                'fk_category_id'=> 2,
                'code'=> 'COD-4',
                'name'=> 'Samsung Galaxy S9',
                'price'=> 3000000,
                'stock'=> 20,
                'description'=> 'Samsung Galaxy S9, 64GB, Midnight Black - Fully Unlocked (Renewed)',
                'image'=> 'https://th.bing.com/th/id/OIP.XXV4ssrnSfP6s0RBLSjpOQHaHa?pid=ImgDet&rs=1',
                'estado'=> 'available',
                'slug'=> 'samsung-galaxy-s9',
            ],
            [
                'fk_category_id'=> 2,
                'code'=> 'COD-5',
                'name'=> 'Samsung Galaxy S8',
                'price'=> 2000000,
                'stock'=> 20,
                'description'=> 'Samsung Galaxy S8, 64GB, Midnight Black - Fully Unlocked (Renewed)',
                'image'=> 'https://th.bing.com/th/id/R.361fbfe794b5b934001374677368bf9d?rik=i%2b3sn1VWHtDDXA&pid=ImgRaw&r=0',
                'estado'=> 'available',
                'slug'=> 'samsung-galaxy-s8',
            ],
            [
                'fk_category_id'=> 3,
                'code'=> 'COD-6',
                'name'=> 'Samsung Galaxy S7',
                'price'=> 1000000,
                'stock'=> 20,
                'description'=> 'Samsung Galaxy S7 G930A 32GB Black Onyx - Unlocked GSM (Renewed)',
                'image'=> 'https://th.bing.com/th/id/R.34df00ccd84e913449d8eb604f714e24?rik=N90dw7JaiBKzDA&pid=ImgRaw&r=0',
                'estado'=> 'discontinued',
                'slug'=> 'samsung-galaxy-s7',
            ]

            // Agrega más productos aquí...
        ];

        // Insertar los registros en la base de datos
        foreach ($products as $productData) {
            Product::create($productData);
        }
    }
}
