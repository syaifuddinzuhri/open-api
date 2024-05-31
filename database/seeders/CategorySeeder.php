<?php

namespace Database\Seeders;

use App\Constants\GlobalConstant;
use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

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
        foreach (GlobalConstant::CATEGORIES as $key => $value) {
            Category::create([
                'name' => $value,
            ]);
        }
    }
}
