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
        Category::create(['name' => 'Health']);
        Category::create(['name' => 'Science']);
        Category::create(['name' => 'Events']);
        Category::create(['name' => 'Projects']);
        Category::create(['name' => 'Achievements']);
        Category::create(['name' => 'Partners']);
        Category::create(['name' => 'Education']);
    }
}
