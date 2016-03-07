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

$factory->define(App\Models\Order::class, function (Faker\Generator $faker) {
    return [
        'mandante' => $faker->word,
        'posted_at'      => $faker->date(),
//        'partner_id' => factory(App\Models\Partner::class)->create()->id,
        'descricao' => $faker->text(),
    ];
});
