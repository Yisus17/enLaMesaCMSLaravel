<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function category(){ 
        return $this->belongsTo(Category::class); //Pertenece a una categoría.
    }

    public function nutritional_value(){ 
        return $this->belongsTo(NutritionalValue::class); //Pertenece a una categoría.
    }
}
