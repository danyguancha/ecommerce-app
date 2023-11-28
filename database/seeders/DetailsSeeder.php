<?php

namespace Database\Seeders;

use App\Models\DetailProduct;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DetailsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('detailsproduct')->insert( [
            [
                'ram' => '8GB',
                'internal_storage' => '128GB',
                'battery' => '4500mAh',
                'main_camera' => '64MP',
                'front_camera' => '32MP',
                'display' => '6.2"',
                'processor' => 'Exynos 2100',
                'conectivity' => '4G y 5G',
                'colors' => 'Phantom Gray, Phantom White, Phantom Violet, Phantom Pink, Phantom Gold, Phantom Red',
                'operating_system' => 'Android 11',
                'dimensions' => '151.7 x 71.2 x 7.9 mm',
                'weight' => '169 g',
                'model' => 'SM-G991UZAAXAA',
            ],
            [
                'ram' => '8GB',
                'internal_storage' => '128GB',
                'battery' => '4500mAh',
                'main_camera' => '64MP',
                'front_camera' => '32MP',
                'display' => '6.2"',
                'processor' => 'Exynos 2100',
                'conectivity' => '4G y 5G',
                'colors' => 'Phantom Gray, Phantom White, Phantom Violet, Phantom Pink, Phantom Gold, Phantom Red',
                'operating_system' => 'Android 11',
                'dimensions' => '151.7 x 71.2 x 7.9 mm',
                'weight' => '169 g',
                'model' => 'SM-G991UZAAXAA',
            ],
            [
                'ram' => '8GB',
                'internal_storage' => '128GB',
                'battery' => '4500mAh',
                'main_camera' => '64MP',
                'front_camera' => '32MP',
                'display' => '6.2"',
                'processor' => 'Exynos 2100',
                'conectivity' => '4G y 5G',
                'colors' => 'Phantom Gray, Phantom White, Phantom Violet, Phantom Pink, Phantom Gold, Phantom Red',
                'operating_system' => 'Android 11',
                'dimensions' => '151.7 x 71.2 x 7.9 mm',
                'weight' => '169 g',
                'model' => 'SM-G991UZAAXAA',
            ],
            [
                'ram' => '8GB',
                'internal_storage' => '128GB',
                'battery' => '4500mAh',
                'main_camera' => '64MP',
                'front_camera' => '32MP',
                'display' => '6.2"',
                'processor' => 'Exynos 2100',
                'conectivity' => '4G y 5G',
                'colors' => 'Phantom Gray, Phantom White, Phantom Violet, Phantom Pink, Phantom Gold, Phantom Red',
                'operating_system' => 'ios 8',
                'dimensions' => '151.7 x 71.2 x 7.9 mm',
                'weight' => '169 g',
                'model' => 'SM-G991UZAAXAA',
            ],
            //agununos registros para iphone
            [
                'ram' => '8GB',
                'internal_storage' => '128GB',
                'battery' => '4500mAh',
                'main_camera' => '64MP',
                'front_camera' => '32MP',
                'display' => '6.2"',
                'processor' => 'Exynos 2100',
                'conectivity' => '4G y 5G',
                'colors' => 'Phantom Gray, Phantom White, Phantom Violet, Phantom Pink, Phantom Gold, Phantom Red',
                'operating_system' => 'ios 10',
                'dimensions' => '151.7 x 71.2 x 7.9 mm',
                'weight' => '169 g',
                'model' => 'SM-G991UZAAXAA',
            ],
            [
                'ram' => '8GB',
                'internal_storage' => '128GB',
                'battery' => '4500mAh',
                'main_camera' => '64MP',
                'front_camera' => '32MP',
                'display' => '6.2"',
                'processor' => 'Exynos 2100',
                'conectivity' => '4G y 5G',
                'colors' => 'Phantom Gray, Phantom White, Phantom Violet, Phantom Pink, Phantom Gold, Phantom Red',
                'operating_system' => 'ios 11',
                'dimensions' => '151.7 x 71.2 x 7.9 mm',
                'weight' => '169 g',
                'model' => 'SM-G991UZAAXAA',
            ],

        ]);
    }
}
