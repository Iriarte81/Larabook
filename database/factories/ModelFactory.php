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

$factory->define(App\User::class, function ($faker) {
    return [
        'username' => $faker->name,
        'email' => $faker->email,
        'password' => 'secret',
        'remember_token' => str_random(10)
    ];
});


$factory->define(App\Statuses\Status::class, function($faker) {
	return [
		'body' => $faker->sentence,
		'user_id' => App\User::all()->random()->id,
		];
	});