<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DetailsXproductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('detailsxproduct')->insert(
            [
                [
                    'fk_product_id' => 9,
                    'fk_detail_id' => 1,
                ],
                [
                    'fk_product_id' => 10,
                    'fk_detail_id' => 2,
                ],
                [
                    'fk_product_id' => 11,
                    'fk_detail_id' => 3,
                ],
                [
                    'fk_product_id' => 12,
                    'fk_detail_id' => 4,
                ],
                [
                    'fk_product_id' => 13,
                    'fk_detail_id' => 5,
                ],
                [
                    'fk_product_id' => 14,
                    'fk_detail_id' => 6,
                ],
                [
                    'fk_product_id' => 15,
                    'fk_detail_id' => 1,
                ],
                [
                    'fk_product_id' => 18,
                    'fk_detail_id' => 5,
                ],


            ]
        );
    }
}
