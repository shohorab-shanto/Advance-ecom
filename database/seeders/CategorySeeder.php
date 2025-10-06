<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $categories = [
            [
                'category_name_en' => 'Clothing',
                'category_name_hin' => 'कपड़े',
                'category_icon' => 'fa fa-shopping-bag',
            ],
            [
                'category_name_en' => 'Electronics',
                'category_name_hin' => 'इलेक्ट्रॉनिक्स',
                'category_icon' => 'fa fa-plug',
            ],
        ];

        foreach ($categories as $category) {
            Category::updateOrCreate(
                ['category_slug_en' => Str::slug($category['category_name_en'])],
                [
                    'category_name_en' => $category['category_name_en'],
                    'category_name_hin' => $category['category_name_hin'],
                    'category_slug_en' => Str::slug($category['category_name_en']),
                    'category_slug_hin' => Str::slug($category['category_name_hin']),
                    'category_icon' => $category['category_icon'],
                ]
            );
        }
    }
}


