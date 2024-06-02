<?php

namespace Database\Seeders;

use App\Models\Rating;
use App\Models\Restaurant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class RatingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        Rating::truncate();
        $restaurantIds = Restaurant::pluck('id')->toArray();

        foreach (range(1, 100) as $index) {
            Rating::create([
                'image' => "https://picsum.photos/id/" . rand(1, 300) . "/400/400",
                'rating' => $faker->numberBetween(1, 5),
                'name' => $faker->name(),
                'text' => $faker->sentence(),
                'restaurant_id' => $faker->randomElement($restaurantIds)
            ]);
        }
    }
}
