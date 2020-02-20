<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Models\Organization;
use Faker\Generator as Faker;

$factory->define(Organization::class, function (Faker $faker) {
    return [
        'name' => $faker->company,
        'description' => $faker->text,
        'email' => $faker->companyEmail,
        'website' => $faker->safeEmailDomain,
        'phone' => $faker->phoneNumber,
    ];
});
