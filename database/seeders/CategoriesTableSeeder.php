<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Str;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [];

        for($i = 1; $i <= 5; $i++) {
            $cName = 'Основна категорія #' . $i;

            $categories[] =[
                'name' => $cName,
                'parent_id' => 0
            ];
        }

        for ($i = 1; $i <= 15; $i++) {
            $cName = 'Категорія #'.$i;
            $parentId = rand(1, 5);

            $categories[] =[
                'name' => $cName,
                'parent_id' => $parentId
            ];
        }

        \DB::table('categories')->insert($categories);
    }
}
