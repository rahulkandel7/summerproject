<?php

namespace Database\Factories;

use App\Models\Listing;
use Illuminate\Database\Eloquent\Factories\Factory;

class ListingFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Listing::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'tole' => $this->faker->word,
            'municipality' => $this->faker->word,
            'wardno' => 7,
            'price' => 5000,
            'tbphoto' => $this->faker->image,
            'hallphoto' => $this->faker->image,
            'kitchenphoto' => $this->faker->image,
            'psphoto' => $this->faker->image,
            'froom' =>  $this->faker->image,
            'sroom' => $this->faker->image,
            'type' => 'flat',
            'info' => $this->faker->randomHtml(2,3),
            'rules' => $this->faker->randomHtml(2,3),
            'isAvailable' => true,
            'isNegotiable' => true,
            'age_range' => '20-40',
            'tenant_type' => 'student',
            'gender' => 'male',
            'user_id' => $this->faker->numberBetween(1,50),
        ];
    }
}
