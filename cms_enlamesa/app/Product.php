<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function category(){ 
        return $this->belongsTo(Category::class); //Pertenece a una categoría.
    }

    public function ingredient(){
        return $this->belongsToMany(Ingredient::class); // Muchos a muchos
    }
}
