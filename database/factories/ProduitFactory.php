<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Produit;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

$factory->define(Produit::class, function (Faker $faker) {
    $image = Str::random(10) . '.jpg';
    Storage::disk('public')->copy('seeder/musc-royal.jpg', $image);
    $title = $faker->sentence;
    $slug = Str::slug($title, '-');
    return [
        'nom' => $faker->name,
        'slug'=>$slug,
        'image' => $image,
        'prix'=>$faker->numberBetween($min = 1000, $max = 9000),
        'etat'=>'Normal'
    ];
});
