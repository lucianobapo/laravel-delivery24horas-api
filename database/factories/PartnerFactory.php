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
$factory->define(App\Models\Partner::class, function (Faker\Generator $faker) {
    return [
        //'user_id' => 'factory|App\Models\User',
        'mandante' => $faker->word,
        'nome' => $faker->name(),
        'data_nascimento' => $faker->date(),
        'observacao' => $faker->text(),
    ];
});
