<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Categories;
use App\Models\Images;
use App\Models\Product;
use App\Models\Projects;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CategoriesTableSeeder::class);
        User::factory(10)->create();
        Article::factory(20)->create();
        Product::factory(30)->create();
        Images::factory(30)->create();
        Projects::factory(20)->create();
    }
}
