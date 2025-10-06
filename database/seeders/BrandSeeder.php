<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Brand;
use Illuminate\Support\Str;

class BrandSeeder extends Seeder
{
    public function run()
    {
        $brands = [
            ['en' => 'Acme', 'hin' => 'एक्मे', 'image' => 'upload/brand/acme.png'],
            ['en' => 'Globex', 'hin' => 'ग्लोबेक्स', 'image' => 'upload/brand/globex.png'],
            ['en' => 'Initech', 'hin' => 'इनिटेक', 'image' => 'upload/brand/initech.png'],
        ];

        foreach ($brands as $b) {
            Brand::updateOrCreate(
                ['brand_slug_en' => Str::slug($b['en'])],
                [
                    'brand_name_en' => $b['en'],
                    'brand_name_hin' => $b['hin'],
                    'brand_slug_en' => Str::slug($b['en']),
                    'brand_slug_hin' => Str::slug($b['hin']),
                    'brand_image' => $b['image'],
                ]
            );
        }
    }
}


