<?php

namespace Database\Seeders;

use App\Models\Address;
use App\Models\Employee;
use App\Models\Order;
use App\Models\Telephone;
use App\Models\User;
use Illuminate\Database\Seeder;

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
        Address::factory(40)->create();
        Order::factory(80)->create();
        Telephone::factory(20)->create();
        
    }
}
