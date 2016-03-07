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
$factory->define(App\Models\ItemOrder::class, function (Faker\Generator $faker) {
    return [
        'mandante' => $faker->word,
        'quantidade' => $faker->randomNumber(2),
        'valor_unitario' => $faker->randomFloat(2),
//        'order_id' => factory(App\Models\Order::class)->create()->id,
//        'cost_id' => factory(App\Models\CostAllocate::class)->create()->id,
        'descricao' => $faker->text(),
    ];
});
