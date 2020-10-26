<?php

namespace Database\Factories;

use App\Models\Telephone;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

class TelephoneFactory extends Factory
{
    public $number = 1;
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Telephone::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id'=>$this->faker->phoneNumber,
            'user_id'=>$this->number++
        ];
    }
}
