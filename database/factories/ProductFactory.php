<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
           /* 'product_code'=>$this->faker->ean8,
            'product_name'=>$this->faker->word,
            'product_desc'=>$this->faker->realText($maxNbChars = 100, $indexSize = 2),
            'qty'=>$this->faker->numberBetween($min = 50, $max = 500),
            'price'=>$this->faker->randomFloat($nbMaxDecimals = 2, $min = 1, $max = 100),
            */
        ];
    }
}
