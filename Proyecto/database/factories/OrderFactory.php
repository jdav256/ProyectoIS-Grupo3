<?php

namespace Database\Factories;

use App\Models\Employee;
use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    public $empleado =1;
    public $usuario  =1;
    public $pedido = 1;
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Order::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
       
        
        if($this->empleado>10){
            $this->empleado=1;
        }
        if($this->usuario>20){
            $this->usuario=1;
        }
        return [
                    'order_number'=>$this->pedido++,
                    'order_date'=>$this->faker->dateTimeBetween('-5 days','now'),
                    'delivery_date'=>$this->faker->dateTimeBetween('+0 days', '+1 week'),
                    'delivery_cost'=>'400',
                    'description'=>'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Officiis, molestiae?',
                    'packaging'=>$this->faker->randomElement([0,1]),
                    'employee_id'=>$this->empleado++,
                    'user_id'=>$this->usuario++
            
        ];
    }
}
