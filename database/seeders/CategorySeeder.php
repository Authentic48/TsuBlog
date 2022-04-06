<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::truncate();

        Category::create(['name' => 'Art']);
        Category::create(['name' => 'Tech']);
        Category::create(['name' => 'Sport']);
        Category::create(['name' => 'Entertaiment']);
        Category::create(['name' => 'Health']);
        Category::create(['name' => 'Science']);
        Category::create(['name' => 'Food']);
    }
}
