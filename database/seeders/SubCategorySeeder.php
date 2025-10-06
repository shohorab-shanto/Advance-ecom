<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Support\Str;

class SubCategorySeeder extends Seeder
{
    public function run()
    {
        $map = [
            'Clothing' => [
                ['en' => 'Men', 'hin' => 'पुरुष'],
                ['en' => 'Women', 'hin' => 'महिला'],
            ],
            'Electronics' => [
                ['en' => 'Mobiles', 'hin' => 'मोबाइल'],
                ['en' => 'Laptops', 'hin' => 'लैपटॉप'],
            ],
        ];

        foreach ($map as $categoryEn => $subs) {
            $category = Category::where('category_slug_en', Str::slug($categoryEn))->first();
            if (!$category) continue;

            foreach ($subs as $sub) {
                SubCategory::updateOrCreate(
                    [
                        'category_id' => $category->id,
                        'subcategory_slug_en' => Str::slug($sub['en'])
                    ],
                    [
                        'subcategory_name_en' => $sub['en'],
                        'subcategory_name_hin' => $sub['hin'],
                        'subcategory_slug_en' => Str::slug($sub['en']),
                        'subcategory_slug_hin' => Str::slug($sub['hin']),
                    ]
                );
            }
        }
    }
}


