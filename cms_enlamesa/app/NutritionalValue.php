<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NutritionalValue extends Model
{
    public function product(){ 
        return $this->belongsTo(Product::class); //Pertenece a una categoría.
    }
}
