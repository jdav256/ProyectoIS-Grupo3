<?php

namespace Database\Factories;

use App\Models\Employee;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Employee::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'status'=>$this->faker->randomElement(['activo','inactivo']),
            'employee_type'=>$this->faker->randomElement(['repartidor','administrador']),
            'hiring_date'=>$this->faker->date($format='Y-m-d',$max='now'),
            'user_id'=>$this->faker->unique()->numberBetween(1, User::count())
            
            
        ];
    }
}
