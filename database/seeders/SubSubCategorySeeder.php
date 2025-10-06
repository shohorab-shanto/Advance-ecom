<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use Illuminate\Support\Str;

class SubSubCategorySeeder extends Seeder
{
    public function run()
    {
        $map = [
            'Clothing' => [
                'Men' => [
                    ['en' => 'T-Shirts', 'hin' => 'टी-शर्ट'],
                    ['en' => 'Jeans', 'hin' => 'जींस'],
                ],
                'Women' => [
                    ['en' => 'Dresses', 'hin' => 'ड्रेसेज़'],
                    ['en' => 'Sarees', 'hin' => 'साड़ी'],
                ],
            ],
            'Electronics' => [
                'Mobiles' => [
                    ['en' => 'Smartphones', 'hin' => 'स्मार्टफोन'],
                    ['en' => 'Feature Phones', 'hin' => 'फीचर फोन'],
                ],
                'Laptops' => [
                    ['en' => 'Ultrabooks', 'hin' => 'अल्ट्राबुक्स'],
                    ['en' => 'Gaming Laptops', 'hin' => 'गेमिंग लैपटॉप'],
                ],
            ],
        ];

        foreach ($map as $catEn => $subs) {
            $category = Category::where('category_slug_en', Str::slug($catEn))->first();
            if (!$category) continue;

            foreach ($subs as $subEn => $subsubs) {
                $subcategory = SubCategory::where('category_id', $category->id)
                    ->where('subcategory_slug_en', Str::slug($subEn))
                    ->first();
                if (!$subcategory) continue;

                foreach ($subsubs as $item) {
                    SubSubCategory::updateOrCreate(
                        [
                            'category_id' => $category->id,
                            'subcategory_id' => $subcategory->id,
                            'subsubcategory_slug_en' => Str::slug($item['en'])
                        ],
                        [
                            'subsubcategory_name_en' => $item['en'],
                            'subsubcategory_name_hin' => $item['hin'],
                            'subsubcategory_slug_en' => Str::slug($item['en']),
                            'subsubcategory_slug_hin' => Str::slug($item['hin']),
                        ]
                    );
                }
            }
        }
    }
}


