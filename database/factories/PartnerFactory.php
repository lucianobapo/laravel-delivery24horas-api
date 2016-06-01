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

$class = App::make(App\Models\RepositoryLayer\PartnerRepositoryInterface::class);

if ($class->model instanceof Illuminate\Database\Eloquent\Model)
    $factory->define(get_class($class->model), function (Faker\Generator $faker) {
        return [
            //'user_id' => 'factory|App\Models\User',
            'mandante' => $faker->word,
            'nome' => $faker->name(),
            'data_nascimento' => $faker->date(),
            'observacao' => $faker->text(),
        ];
    });
