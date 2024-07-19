<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductSize;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Xoá dữ liệu cũ
        Schema::disableForeignKeyConstraints();
        Product::query()->truncate();
        ProductSize::query()->truncate();
        //Thêm size
        foreach (['S', 'M', 'L', 'XL', 'XXL'] as $item) {
            ProductSize::query()->create([
                'name' => $item
            ]);
        }

        //Bảng product
        for ($i = 0; $i < 20; $i++) {
                Product::query()->create([
                    'category_id' => rand(1, 5),
                    'name' => fake()->text(50),
                    'image' => 'https://tokyolife.vn/_next/image?url=https%3A%2F%2Fpm2ec.s3.ap-southeast-1.amazonaws.com%2Fcms%2F16964968221039714_512.JPG&w=1920&q=75',
                    'price' => 100000,
                    'price_sale' => 88000,
                    'description' => fake()->text(100),
                ]);
        }
    }
}
