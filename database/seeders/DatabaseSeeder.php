<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Categories;
use App\Models\Images;
use App\Models\Product;
use App\Models\Projects;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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
        $user = User::factory()->create([
            'name' => 'Serb Oleksiy',
            'email' => 'test@test.com',
            'password' => Hash::make('123123123')
        ]);
//        Article::factory(20)->create();
//        $products = Product::factory(100)->create([
//            'author_id' => $user->id
//        ]);
//        foreach ($products as $product) {
//            Images::factory()->create([
//                'product_id' => $product->id
//            ]);
//        }
//        Projects::factory(20)->create([
//            'author_id' => $user->id
//        ]);
    }
}
