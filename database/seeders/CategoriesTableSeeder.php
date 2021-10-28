<?php

namespace Database\Seeders;

use Faker\Factory;
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
        $lorem = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
        ut labore et dolore magna aliqua. Bibendum arcu vitae elementum curabitur vitae. Scelerisque in
        dictum non consectetur a erat nam. Tristique magna sit amet purus gravida quis. Turpis tincidunt
        id aliquet risus feugiat in ante metus. Sed felis eget velit aliquet sagittis id consectetur purus
        ut. Urna porttitor rhoncus dolor purus non enim praesent. Aliquet nec ullamcorper sit amet. Scelerisque
        eu ultrices vitae auctor eu augue ut lectus. Phasellus egestas tellus rutrum tellus pellentesque eu
        tincidunt tortor. Sapien pellentesque habitant morbi tristique senectus et netus et malesuada. In est
        ante in nibh mauris cursus mattis. Nisi scelerisque eu ultrices vitae auctor eu. Egestas fringilla
        phasellus faucibus scelerisque eleifend donec. Leo vel fringilla est ullamcorper eget nulla facilisi
        etiam. Sed elementum tempus egestas sed sed.';

        for($i = 1; $i <= 5; $i++) {
            $cName = 'Основна категорія #' . $i;

            $categories[] =[
                'name' => $cName,
                'slug' => Str::slug($cName),
                'description' => $lorem,
                'parent_id' => 0
            ];
        }

        for ($i = 1; $i <= 15; $i++) {
            $cName = 'Категорія #'.$i;
            $parentId = rand(1, 5);

            $categories[] =[
                'name' => $cName,
                'slug' => Str::slug($cName),
                'description' => $lorem,
                'parent_id' => $parentId
            ];
        }

        \DB::table('categories')->insert($categories);
    }
}
