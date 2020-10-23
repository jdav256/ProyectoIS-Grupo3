<?php

namespace Database\Factories;

use App\Models\Address;
use Illuminate\Database\Eloquent\Factories\Factory;

class AddressFactory extends Factory
{
    public $numero = 1;
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Address::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        if($this->numero>20){
            $this->numero =1;
        }

        return [
            'latitude'=>$this->faker->latitude,
            'longitude'=>$this->faker->longitude,
            'description'=>$this->faker->streetAddress,
            'user_id'=>$this->numero++
        ];
    }
}
