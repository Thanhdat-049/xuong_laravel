<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ProductColor;
use App\Models\Tag;
use App\Models\ProductSize;
use App\Models\Product;
use App\Models\ProductGallery;
use App\Models\ProductVariant;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        ProductVariant::query()->truncate();
        ProductGallery::query()->truncate();
        ProductSize::query()->truncate();
        Product::query()->truncate();
        ProductColor::query()->truncate();
        DB::table('product_tag')->truncate();
        Tag::query()->truncate();

        Tag::factory(15)->create();

        //s, m, l, xl, xxl
        foreach (['s', 'm', 'l', 'xl', 'xxl'] as $item) {
            ProductSize::query()->create(
                ['name' => $item]
            );
        }
        //black, blue, green, yellow, red
        foreach (['black', 'blue', 'green', 'yellow', 'red'] as $item) {
            ProductColor::query()->create(
                ['name' => $item]
            );
        }

        for ($i = 0; $i < 1000; $i++) {
            $name = fake()->text(100);

            Product::query()->create(
                [
                    'slug' => Str::slug($name) . '-' . Str::random(8),
                    'name' => $name,
                    'catelogue_id' => rand(1, 2),
                    'sku' => Str::random(8) . $i,
                    'img_thumbnail' => 'https://canifa.com/img/1000/1500/resize/8/b/8bj24s003-sj859-31-1-u.webp',
                    'price_regular' => 600.000,
                    'price_sale' => 490.000,

                ]
            );
        }



        for ($i = 1; $i < 1001; $i++) {

            ProductGallery::query()->insert(
                [
                    [
                        'product_id' => $i,
                        'image' => 'https://canifa.com/img/1000/1500/resize/8/b/8bj24s003-sj859-31-1-u.webp',

                    ],
                    [
                        'product_id' => $i,
                        'image' => 'https://canifa.com/img/1000/1500/resize/8/b/8bj23a004-sj814-3.webp',

                    ],
                ]
            );

            ProductGallery::query()->create(
                [
                    'product_id' => $i,
                    'image' => 'https://canifa.com/img/1000/1500/resize/8/b/8bj23a004-sj814-1.webp',

                ]
            );
        }

        for ($i = 1; $i < 1001; $i++) {

            DB::table('product_tag')->insert([
                [
                    'product_id' => $i,
                    'tag_id' =>  rand(1, 8),
                ],
                [
                    'product_id' => $i,
                    'tag_id' =>  rand(9, 15),
                ],

            ]);
        }


        for ($productID = 1; $productID < 1001; $productID++) {
            $data= [];
            for ($sizeID = 1; $sizeID < 6; $sizeID++) {
                for ($colorID = 1; $colorID < 6; $colorID++) {
                    $data[] = [
                        'product_id' => $productID,
                        'product_size_id' => $sizeID,
                        'product_color_id' => $colorID,
                        'quantity' => 100,
                        'image' => 'https://canifa.com/img/1000/1500/resize/8/b/8bj23a004-sj814-1.webp',

                    ];
                }
            }
        DB::table('product_variants')->insert($data);

        }

    }
}
