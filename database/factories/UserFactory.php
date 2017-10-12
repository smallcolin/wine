<?php

use Faker\Generator as Faker;
use Faker\Provider\en_US\Address;
use Faker\Provider\Base;
/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

// Users Factory
$factory->define(App\User::class, function (Faker $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

// Wines Factory
$factory->define(App\Wine::class, function (Faker $faker) {
    static $password;

    return [
      'country_id' => $faker->randomDigit,
      'name' => $faker->word,
      'description' => $faker->text($maxNbChars = 200),
      'price' => $faker->randomDigit(),
      'stock' => $faker->randomDigit,
      'image_url' => $faker->imageUrl($width = 640, $height = 480)
    ];
});

// Countries Factory
$factory->define(App\Country::class, function (Faker $faker) {
    static $password;

    return [
      'name' => $faker->country
    ];
});

// Comments Factory
$factory->define(App\Comment::class, function (Faker $faker) {
    static $password;

    return [
      'customer_id' => $faker->randomDigit,
      'wine_id' => $faker->randomDigit,
      'title' => $faker->word,
      'body' => $faker->text($maxNbChars = 200),
      'grade' => $faker->numberBetween($min=1, $max=5)
    ];
});

// Customers Factory
$factory->define(App\Customer::class, function (Faker $faker) {
    static $password;

    return [
      'name' => $faker->name,
      'email' => $faker->unique()->safeEmail,
      'password' => $password ?: $password = bcrypt('secret')
    ];
});

// Orders Factory
$factory->define(App\Order::class, function (Faker $faker) {
    static $password;

    return [
      'user_name' => $faker->name,
      'user_email' => $faker->unique()->safeEmail,
      'wine_name' => $faker->name,
      'wine_id' => $faker->randomDigit,
    ];
});
