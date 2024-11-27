<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        DB::table('products')->insert([
            'name' => "sanpham1",
            'image' => "product-image-1.jpg",
            'price' => "39000",
            'description' => "San pham lam tu....",
            'material' => "kim cuong",
            'size' => "12",
        ]);
        DB::table('products')->insert([
            'name' => "sanpham2",
            'image' => "product-image-2.jpg",
            'price' => "39000",
            'description' => "San pham lam tu....",
            'material' => "kim cuong",
            'size' => "12",
        ]);
        DB::table('products')->insert([
            'name' => "sanpham3",
            'image' => "product-image-3.jpg",
            'price' => "39000",
            'description' => "San pham lam tu....",
            'material' => "kim cuong",
            'size' => "12",
        ]);
        DB::table('products')->insert([
            'name' => "sanpham4",
            'image' => "product-image-4.jpg",
            'price' => "35000",
            'description' => "San pham lam tu....",
            'material' => "kim cuong",
            'size' => "12",
        ]);
        DB::table('products')->insert([
            'name' => "sanpham5",
            'image' => "product-image-5.jpg",
            'price' => "29000",
            'description' => "San pham lam tu....",
            'material' => "kim cuong",
            'size' => "12",
        ]);
        DB::table('products')->insert([
            'name' => "sanpham6",
            'image' => "product-image-6.jpg",
            'price' => "19000",
            'description' => "San pham lam tu....",
            'material' => "kim cuong",
            'size' => "12",
        ]);
        DB::table('products')->insert([
            'name' => "sanpham7",
            'image' => "product-image-7.jpg",
            'price' => "19000",
            'description' => "San pham lam tu....",
            'material' => "kim cuong",
            'size' => "12",
        ]);
        DB::table('products')->insert([
            'name' => "sanpham8",
            'image' => "product-image-8.jpg",
            'price' => "19000",
            'description' => "San pham lam tu....",
            'material' => "kim cuong",
            'size' => "12",
        ]);
        DB::table('products')->insert([
            'name' => "sanpham9",
            'image' => "product-image-9.jpg",
            'price' => "19000",
            'description' => "San pham lam tu....",
            'material' => "kim cuong",
            'size' => "12",
        ]);
        DB::table('products')->insert([
            'name' => "sanpham10",
            'image' => "product-image-10.jpg",
            'price' => "19000",
            'description' => "San pham lam tu....",
            'material' => "kim cuong",
            'size' => "12",
        ]);
        DB::table('products')->insert([
            'name' => "sanpham11",
            'image' => "product-image-11.jpg",
            'price' => "19000",
            'description' => "San pham lam tu....",
            'material' => "kim cuong",
            'size' => "12",
        ]);
        DB::table('products')->insert([
            'name' => "sanpham12",
            'image' => "product-image-12.jpg",
            'price' => "19000",
            'description' => "San pham lam tu....",
            'material' => "kim cuong",
            'size' => "12",
        ]);

        DB::table('orders')->insert([
            'order_date' => "2023-11-05",
            'order_status' => 1,
            'order_total' => 40000,
            'user_id' => 1,
        ]);
        DB::table('orders')->insert([
            'order_date' => "2023-11-05",
            'order_status' => 0,
            'order_total' => 60000,
            'user_id' => 1,
        ]);
        DB::table('orders')->insert([
            'order_date' => "2023-11-05",
            'order_status' => 0,
            'order_total' => 80000,
            'user_id' => 2,
        ]);

        DB::table('order_product')->insert([
            'order_id' => 1,
            'product_id' => 1,
            'quality' => 10,
            'unit_price' => 40000,
            'sub_total' => 40000,
        ]);
        DB::table('order_product')->insert([
            'order_id' => 1,
            'product_id' => 2,
            'quality' => 30,
            'unit_price' => 60000,
            'sub_total' => 60000,
        ]);
        DB::table('order_product')->insert([
            'order_id' => 1,
            'product_id' => 3,
            'quality' => 20,
            'unit_price' => 80000,
            'sub_total' => 80000,
        ]);
        DB::table('order_product')->insert([
            'order_id' => 2,
            'product_id' => 2,
            'quality' => 30,
            'unit_price' => 60000,
            'sub_total' => 60000,
        ]);
        DB::table('order_product')->insert([
            'order_id' => 2,
            'product_id' => 1,
            'quality' => 20,
            'unit_price' => 80000,
            'sub_total' => 80000,
        ]);

        DB::table('promotions')->insert([
            'name' => '123456',
            'start_date' => '2023-11-14',
            'end_date' => '2023-11-14',
            'amount' => 10000,
        ]);

        DB::table('users')->insert([
            'id' => '1',
            'password' => Bcrypt('123456789@H'),
            'username' => 'Nguyen van a',
            'name' => 'vana',
            'phone' => '0919191919',
            'email' => '123456789@gmail.com',
        ]);
        DB::table('users')->insert([
            'password' => Bcrypt('123456789@H'),
            'username' => '1234567890',
            'name' => '1234567890',
            'email' => '1234567890@gmail.com',
        ]);
        DB::table('users')->insert([
            'password' => Bcrypt('admin@H'),
            'username' => 'admin',
            'name' => 'admin',
            'admin' => 1,
            'email' => 'admin@gmail.com',
        ]);
    }
}
