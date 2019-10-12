<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            'Máy tính',
            'Điện thoại',
            'Máy ảnh',
            'Phụ kiện'
        ];
        $faker = \Faker\Factory::create();
       foreach( $categories as $category){
            DB::table('categories')->insert([
                'name' => $category,
                'slug' => \Illuminate\Support\Str::slug($category),
                'parent_id' => 1,
                'depth' => 1,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ]);
        }
    }
}
