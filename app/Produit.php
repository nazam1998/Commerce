<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    public function categories()
    {
        return $this->belongsToMany('App\Categorie', 'produit_categorie', 'categorie_id', 'produit_id');
    }
    public function users()
    {
        return $this->belongsToMany('App\User', 'panier', 'user_id', 'produit_id');
    }
}
