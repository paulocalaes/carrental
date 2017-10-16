<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CarTest extends TestCase
{
    public function testsCarsAreCreatedCorrectly()
    {
        $user = factory(\App\User::class)->create();
        $token = $user->generateToken();
        $headers = ['Authorization' => "Bearer $token"];
        $payload = [
            'make'=>'Audi', 
            'model'=> 'A3',
            'owner' => 'John',
            'description'=> 'Test',
            'horsepower'=> '300hp', 
            'number_of_doors'=> '3', 
            'number_of_seats'=> '4', 
			'transmission'=> 'Automatic', 
			'fuel'=> 'Gas'
        ];

        $this->json('POST', '/api/cars', $payload, $headers)
            ->assertStatus(201)
            ->assertJsonFragment([ 
            	'make'=>'Audi', 
            'model'=> 'A3',
            'owner' => 'John',
            'description'=> 'Test',
            'horsepower'=> '300hp', 
            'number_of_doors'=> '3', 
            'number_of_seats'=> '4', 
			'transmission'=> 'Automatic', 
			'fuel'=> 'Gas']);
    }

    public function testsCarsAreUpdatedCorrectly()
    {
        $user = factory(\App\User::class)->create();
        $token = $user->generateToken();
        $headers = ['Authorization' => "Bearer $token"];
        $car = factory(\App\Car::class)->create([
        	'make'=>'Audi', 
            'model'=> 'A3',
            'owner' => 'John',
            'description'=> 'Test',
            'horsepower'=> '300hp', 
            'number_of_doors'=> '3', 
            'number_of_seats'=> '4', 
			'transmission'=> 'Automatic', 
			'fuel'=> 'Gas',
        ]);

        $payload = [
            'make'=>'Audi2', 
            'model'=> 'A32',
            'owner' => 'John2',
            'description'=> 'Test2',
            'horsepower'=> '300hp2', 
            'number_of_doors'=> '32', 
            'number_of_seats'=> '42', 
			'transmission'=> 'Automatic2', 
			'fuel'=> 'Gas2',
        ];

        $response = $this->json('PUT', '/api/cars/' . $car->id, $payload, $headers)
            ->assertStatus(200)
            ->assertJsonFragment([ 
                'make'=>'Audi2', 
	            'model'=> 'A32',
	            'owner' => 'John2',
	            'description'=> 'Test2',
	            'horsepower'=> '300hp2', 
	            'number_of_doors'=> '32', 
	            'number_of_seats'=> '42', 
				'transmission'=> 'Automatic2', 
				'fuel'=> 'Gas2',
            ]);
    }

    public function testsArtilcesAreDeletedCorrectly()
    {
        $user = factory(\App\User::class)->create();
        $token = $user->generateToken();
        $headers = ['Authorization' => "Bearer $token"];
        $car = factory(\App\Car::class)->create([
            'make'=>'Audi', 
            'model'=> 'A3',
            'owner' => 'John',
            'description'=> 'Test',
            'horsepower'=> '300hp', 
            'number_of_doors'=> '3', 
            'number_of_seats'=> '4', 
			'transmission'=> 'Automatic', 
			'fuel'=> 'Gas',
        ]);

        $this->json('DELETE', '/api/cars/' . $car->id, [], $headers)
            ->assertStatus(204);
    }

    public function testCarsAreListedCorrectly()
    {
        factory(\App\Car::class)->create([
            'make'=>'Audi', 
            'model'=> 'A3',
            'owner' => 'John',
            'description'=> 'Test',
            'horsepower'=> '300hp', 
            'number_of_doors'=> '3', 
            'number_of_seats'=> '4', 
			'transmission'=> 'Automatic', 
			'fuel'=> 'Gas'
        ]);

        factory(\App\Car::class)->create([
            'make'=>'Audi2', 
	            'model'=> 'A32',
	            'owner' => 'John2',
	            'description'=> 'Test2',
	            'horsepower'=> '300hp2', 
	            'number_of_doors'=> '32', 
	            'number_of_seats'=> '42', 
				'transmission'=> 'Automatic2', 
				'fuel'=> 'Gas2'
        ]);

        $user = factory(\App\User::class)->create();
        $token = $user->generateToken();
        $headers = ['Authorization' => "Bearer $token"];

        $response = $this->json('GET', '/api/cars', [], $headers)
            ->assertStatus(200)
            ->assertJsonFragment(
                ['make'=>'Audi', 
            'model'=> 'A3',
            'owner' => 'John',
            'description'=> 'Test',
            'horsepower'=> '300hp', 
            'number_of_doors'=> '3', 
            'number_of_seats'=> '4', 
			'transmission'=> 'Automatic', 
			'fuel'=> 'Gas'])
			->assertJsonFragment(
                [
            'make'=>'Audi2', 
	            'model'=> 'A32',
	            'owner' => 'John2',
	            'description'=> 'Test2',
	            'horsepower'=> '300hp2', 
	            'number_of_doors'=> '32', 
	            'number_of_seats'=> '42', 
				'transmission'=> 'Automatic2', 
				'fuel'=> 'Gas2'
            ])
            ->assertJsonStructure([
                '*' => ['id', 'make', 'model', 'owner', 'description', 'horsepower','number_of_doors', 'number_of_seats', 'transmission', 'fuel', 'created_at', 'updated_at'],
            ]);
    }
}
