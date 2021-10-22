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

        $cName = 'Без категорії';
        $categories[] =[
            'name' => $cName,
            'parent_id' => 0
        ];

        for ($i = 2; $i <= 20; $i++) {
            $cName = 'Категорія #'.$i;
            $parentId = rand(1, 20);

            $categories[] =[
                'name' => $cName,
                'parent_id' => $parentId
            ];
        }

        \DB::table('categories')->insert($categories);
    }
}
