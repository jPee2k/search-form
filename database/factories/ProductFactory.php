<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\Brand;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    private const WORDS = ['kyiv', 'chernihiv'];

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
        $storage = array_merge(self::WORDS, [null]);

        return [
            'name' => $this->faker->word,
            'model' => $this->faker->word,
            'rating' => $this->faker->numberBetween(0, 10),
            'view' => $this->faker->numberBetween(0, 5000),
            'price' => $this->faker->randomFloat(2, 45, 150000),
            'availability' => $storage[random_int(0, 2)],
            'description' => $this->faker->text(50),
            'photo' => $this->faker->word . hash('crc32b', $this->faker->word) . '.jpeg',
            'brand_id' => $this->getRandomIdFrom(Brand::class),
            'category_id' => $this->getRandomIdFrom(Category::class)
        ];
    }

    public function getRandomIdFrom($model)
    {
        $ids = $model::pluck('id')->toArray();
        $randomKey = array_rand($ids);

        return $ids[$randomKey];
    }
}
