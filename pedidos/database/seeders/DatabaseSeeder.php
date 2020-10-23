<?php

namespace Database\Seeders;

use App\Models\Address;
use App\Models\Employee;
use App\Models\Order;
use App\Models\Telephone;
use Illuminate\Database\Seeder;
use \App\Models\User;

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

        Employee::factory(10)->create();

        Telephone::factory(20)->create();

        Address::factory(80)->create();

        Order::factory(40)->create();

        
        
        
    }
}
