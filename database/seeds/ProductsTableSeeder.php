<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        for($i = 1; $i <= 200; $i++){
            $name = $faker->text(50);
            DB::table('products')->insert([
                'name' => $name,
                'slug' => \Illuminate\Support\Str::slug($name),
                'origin_price' => $faker->numberBetween(400000, 800000),
                'sale_price' => $faker->numberBetween(100000, 400000),
                'content' => $faker->text(500),
                'status' =>1,
                'user_id' => 1,
                'category_id' => 1,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ]);
        }
    }
}
