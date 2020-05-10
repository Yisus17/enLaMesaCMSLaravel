<?php

use Illuminate\Database\Seeder;
use App\Category;
use App\Product;
use App\NutritionalValue;
use Carbon\Carbon;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::truncate(); // Evita duplicar datos

        $categoria = new Category();
        $categoria->name = "Categoría 1";
        $categoria->save();

        NutritionalValue::truncate();
        $nutritionalValue = new NutritionalValue();
        $nutritionalValue->name= "Glucosa";
        $nutritionalValue->value="90";
        $nutritionalValue->unit="gramos";
        $nutritionalValue->product_id=1;
        $nutritionalValue->save();
    

        Product::truncate(); // Evita duplicar datos

        $product = new Product();
        $product->name = "Hamburguesa con Queso";
        $product->description = "Super mega hamburguesa con Queso";
        $product->photo = "mifoto.jpg";
        $product->category_id = 1;
        $product->nutritional_value_id = 1;
        $product->created_at= Carbon::now();
        $product->updated_at= Carbon::now();
        $product->save();
        
       
    }
}
