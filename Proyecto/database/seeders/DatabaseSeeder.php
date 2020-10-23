<?php

namespace Database\Seeders;

use App\Models\Address;
use App\Models\Employee;
use App\Models\Order;
use App\Models\Telephone;
use Illuminate\Database\Seeder;
use \App\Models\User;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(20)->create();

        $user = User::create([
                    'name' => 'Joselp',
                    'lastname'=>'Aguilar',
                    'email' => 'joselp256@hotmail.es',
                    'gender'=>'masculino',
                    'birthdate'=>'1996-04-16',
                    'email_verified_at' => now(),
                    'password' => '$2y$10$rq5oCT9eD1szjfUsTn5E8uJWCMCvFRjUsrq85t/pz1Qy9CRxoDADu', // password asd.123456
                    'remember_token' =>Str::random(10),
                ]);
        $user->save();        

        Employee::factory(10)->create();

        Telephone::factory(20)->create();

        Address::factory(80)->create();

        Order::factory(40)->create();

        
        
        
    }
}
