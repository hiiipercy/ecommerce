<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
            'name'        => $faker->word,
            'description' => $faker->sentence,
            'pre_price'   => $faker->randomNumber(4),
            'price'       => $faker->randomNumber(4),
            'quantity'    => $faker->numberBetween(1, 100),
            'weight'      => $faker->randomFloat(2, 0.1, 10), // e.g., 1.23 kg
            'available'   => $faker->randomElement([1, 2]),
            'status'      => $faker->randomElement([1, 2]),
            // 'image'       => $faker->optional()->imageUrl($width = 640, $height = 480, 'product', true, 'Faker', true, 'jpg'), // Optional image URL
      
    ];
});
