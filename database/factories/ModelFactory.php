<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Models\Goods::class, function(Faker\Generator $faker) {
    $faker->addProvider(new Faker\Provider\Lorem($faker));

    return [
        'goods_name' => $faker->word,
        'goods_price' => $faker->randomFloat(2, 10, 9999),
        'goods_description' => $faker->paragraph(),
    ];
});

