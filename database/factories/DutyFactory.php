<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use App\Users\Domain\Models\User;
use App\Duties\Domain\Models\Duty;

$factory->define(Duty::class, function (Faker $faker) {

    return [
        'duty' => $faker->paragraph,
        'is_completed' => $faker->boolean,
        'created_at' => $faker->date(),
        'updated_at' => $faker->date(),
        'user_id' => factory(User::class)->create()->id,
    ];
});