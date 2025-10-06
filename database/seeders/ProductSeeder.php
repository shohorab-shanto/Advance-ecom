<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\{Product, Category, SubCategory, SubSubCategory, Brand, MultiImg};
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $definitions = [
            [
                'category' => 'Clothing',
                'subcategory' => 'Men',
                'subsubcategory' => 'T-Shirts',
                'brand' => 'Acme',
                'name' => 'Classic Cotton T-Shirt',
                'thumbnail' => 'upload/products/thambnail/tshirt1.png',
                'images' => [
                    'upload/products/multi-image/tshirt1_1.png',
                    'upload/products/multi-image/tshirt1_2.png',
                ],
                'tags' => 'clothing,tshirt,cotton',
                'colors' => ['Red','Blue','Black'],
                'sizes' => ['S','M','L','XL'],
                'price' => 1299,
                'discount' => 999,
                'featured' => 1,
            ],
            [
                'category' => 'Clothing',
                'subcategory' => 'Women',
                'subsubcategory' => 'Dresses',
                'brand' => 'Globex',
                'name' => 'Summer Floral Dress',
                'thumbnail' => 'upload/products/thambnail/dress1.png',
                'images' => [
                    'upload/products/multi-image/dress1_1.png',
                    'upload/products/multi-image/dress1_2.png',
                ],
                'tags' => 'clothing,dress,summer',
                'colors' => ['Yellow','Pink'],
                'sizes' => ['S','M','L'],
                'price' => 2499,
                'discount' => null,
                'special_offer' => 1,
            ],
            [
                'category' => 'Electronics',
                'subcategory' => 'Mobiles',
                'subsubcategory' => 'Smartphones',
                'brand' => 'Initech',
                'name' => 'Initech X1 Smartphone',
                'thumbnail' => 'upload/products/thambnail/phone1.png',
                'images' => [
                    'upload/products/multi-image/phone1_1.png',
                    'upload/products/multi-image/phone1_2.png',
                ],
                'tags' => 'electronics,smartphone,android',
                'colors' => ['Black','Silver'],
                'sizes' => [],
                'price' => 29999,
                'discount' => 27999,
                'hot_deals' => 1,
            ],
            [
                'category' => 'Electronics',
                'subcategory' => 'Laptops',
                'subsubcategory' => 'Gaming Laptops',
                'brand' => 'Globex',
                'name' => 'Globex G-15 Gaming Laptop',
                'thumbnail' => 'upload/products/thambnail/laptop1.png',
                'images' => [
                    'upload/products/multi-image/laptop1_1.png',
                    'upload/products/multi-image/laptop1_2.png',
                ],
                'tags' => 'electronics,laptop,gaming',
                'colors' => ['Black'],
                'sizes' => [],
                'price' => 89999,
                'discount' => null,
                'special_deals' => 1,
            ],
        ];

        foreach ($definitions as $def) {
            $category = Category::where('category_slug_en', Str::slug($def['category']))->first();
            $subcategory = $category ? SubCategory::where('category_id', $category->id)
                ->where('subcategory_slug_en', Str::slug($def['subcategory']))->first() : null;
            $subsubcategory = ($subcategory && $category) ? SubSubCategory::where('category_id', $category->id)
                ->where('subcategory_id', $subcategory->id)
                ->where('subsubcategory_slug_en', Str::slug($def['subsubcategory']))->first() : null;
            $brand = Brand::where('brand_slug_en', Str::slug($def['brand']))->first();

            if (!($category && $subcategory && $subsubcategory && $brand)) {
                continue;
            }

            $product = Product::updateOrCreate(
                ['product_slug_en' => Str::slug($def['name'])],
                [
                    'brand_id' => $brand->id,
                    'category_id' => $category->id,
                    'subcategory_id' => $subcategory->id,
                    'subsubcategory_id' => $subsubcategory->id,
                    'product_name_en' => $def['name'],
                    'product_name_hin' => $def['name'],
                    'product_slug_en' => Str::slug($def['name']),
                    'product_slug_hin' => Str::slug($def['name']),
                    'product_code' => strtoupper(Str::random(8)),
                    'product_qty' => 50,
                    'product_tags_en' => $def['tags'],
                    'product_tags_hin' => $def['tags'],
                    'product_size_en' => !empty($def['sizes']) ? implode(',', $def['sizes']) : null,
                    'product_size_hin' => !empty($def['sizes']) ? implode(',', $def['sizes']) : null,
                    'product_color_en' => implode(',', $def['colors']),
                    'product_color_hin' => implode(',', $def['colors']),
                    'selling_price' => $def['price'],
                    'discount_price' => $def['discount'],
                    'short_descp_en' => 'Short description for '.$def['name'],
                    'short_descp_hin' => 'Short description for '.$def['name'],
                    'long_descp_en' => 'Long description for '.$def['name'],
                    'long_descp_hin' => 'Long description for '.$def['name'],
                    'product_thambnail' => $def['thumbnail'],
                    'hot_deals' => $def['hot_deals'] ?? null,
                    'featured' => $def['featured'] ?? null,
                    'special_offer' => $def['special_offer'] ?? null,
                    'special_deals' => $def['special_deals'] ?? null,
                    'status' => 1,
                ]
            );

            foreach ($def['images'] as $img) {
                MultiImg::updateOrCreate(
                    [
                        'product_id' => $product->id,
                        'photo_name' => $img,
                    ],
                    [
                        'product_id' => $product->id,
                        'photo_name' => $img,
                    ]
                );
            }
        }
    }
}


