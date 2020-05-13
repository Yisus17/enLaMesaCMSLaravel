<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    public function Product(){
        return $this->belongsToMany(Product::class); // Muchos a muchos
    }
}
