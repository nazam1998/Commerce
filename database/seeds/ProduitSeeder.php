<?php

use App\Categorie;
use App\Produit;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProduitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Produit::class,10)->create()->each(function ($produit) {
            $produit->categories()->attach(Categorie::inRandomOrder()->take(2)->pluck('id'));
        });
    }
}
