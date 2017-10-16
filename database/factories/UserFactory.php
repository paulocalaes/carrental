<?php

use Faker\Generator as Faker;

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

$factory->define(App\User::class, function (Faker $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Car::class, function (Faker $faker) {
    return [
        'make'=> $faker->randomElement($array = array ('Audi','BMW','GM', 'Citroen', 'Ferrari','Fiat', 'Ford', 'Honda', 'Toyota')), 
        'model'=> $faker->word,
        'owner' => $faker->name,
        'description'=> $faker->paragraph,
        'horsepower'=> $faker->randomDigit, 
        'number_of_doors'=> $faker->randomDigit, 
        'number_of_seats'=> $faker->randomDigit, 
		'transmission'=> $faker->name, 
		'fuel'=> $faker->name,
    ];
});
