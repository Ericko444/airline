<?php

/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(Brackets\AdminAuth\Models\AdminUser::class, function (Faker\Generator $faker) {
    return [
        'activated' => true,
        'created_at' => $faker->dateTime,
        'deleted_at' => null,
        'email' => $faker->email,
        'first_name' => $faker->firstName,
        'forbidden' => $faker->boolean(),
        'language' => 'en',
        'last_login_at' => $faker->dateTime,
        'last_name' => $faker->lastName,
        'password' => bcrypt($faker->password),
        'remember_token' => null,
        'updated_at' => $faker->dateTime,
        
    ];
});/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Vol::class, static function (Faker\Generator $faker) {
    return [
        'avion_id' => $faker->sentence,
        'created_at' => $faker->dateTime,
        'date_depart' => $faker->dateTime,
        'lieu_arrivee_id' => $faker->sentence,
        'lieu_depart_id' => $faker->sentence,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Lieu::class, static function (Faker\Generator $faker) {
    return [
        'created_at' => $faker->dateTime,
        'nom' => $faker->sentence,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Avion::class, static function (Faker\Generator $faker) {
    return [
        'created_at' => $faker->dateTime,
        'nom' => $faker->sentence,
        'nombreplaces' => $faker->randomNumber(5),
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Category::class, static function (Faker\Generator $faker) {
    return [
        'created_at' => $faker->dateTime,
        'designation' => $faker->sentence,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\CategorieAge::class, static function (Faker\Generator $faker) {
    return [
        'age_max' => $faker->randomNumber(5),
        'age_min' => $faker->randomNumber(5),
        'created_at' => $faker->dateTime,
        'designation' => $faker->sentence,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
