<?php

$factory->define(\LaravelAdminPanel\Models\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name'    => $faker->name,
        'email'   => $faker->unique()->safeEmail,
        'role_id' => function () {
            return factory(\LaravelAdminPanel\Models\Role::class)->create()->id;
        },
        'password'       => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});
