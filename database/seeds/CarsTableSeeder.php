<?php

use Illuminate\Database\Seeder;
Use App\Car;

class CarsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Car::truncate();

        $faker = \Faker\Factory::create();

        // And now, let's create a few articles in our database:
        for ($i = 0; $i < 50; $i++) {
            Car::create([
            	'make'=> $faker->randomElement($array = array ('Audi','BMW','GM', 'Citroen', 'Ferrari','Fiat', 'Ford', 'Honda', 'Toyota')), 
            	'model'=> $faker->word,
            	'owner' => $faker->name,
            	'description'=> $faker->paragraph,
            	'horsepower'=> $faker->randomDigit, 
            	'number_of_doors'=> $faker->randomDigit, 
            	'number_of_seats'=> $faker->randomDigit, 
				'transmission'=> $faker->name, 
				'fuel'=> $faker->name,
            ]);
        }
    }
}
