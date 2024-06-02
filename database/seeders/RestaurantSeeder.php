<?php

namespace Database\Seeders;

use App\Constants\GlobalConstant;
use App\Models\Category;
use App\Models\Restaurant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class RestaurantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        Restaurant::truncate();
        $categoryIds = Category::pluck('id')->toArray();
        foreach (GlobalConstant::RESTAURANT as $key => $value) {
            $price = $faker->randomFloat(0, 10, 90);
            Restaurant::create([
                'name' => $value,
                'photo' => 'https://picsum.photos/600/400',
                'price' => $price,
                'status' => GlobalConstant::STATUS[array_rand(GlobalConstant::STATUS)],
                'category_id' => $categoryIds[array_rand($categoryIds)],
                'map' => 'https://maps.app.goo.gl/UsgmVfRyDn9ghSdH9'
            ]);
        }
    }
}
