<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Order;
use App\Models\Address;
use App\Models\Employee;
use App\Models\Telephone;
use App\Models\AddressOrder;
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

        $contadorDirecciones = 1;
        $posicion = 1;
        $arregloPosiciones = [0,1];
        $ordenes = Order::all();
        foreach ($ordenes as $orden ){
            if($contadorDirecciones>19){
                $contadorDirecciones=1;
            }
            AddressOrder::create([
                'address_id'=>$contadorDirecciones,
                'order_id'=>$orden->id,
                'position'=> 0
            ]);
            $contadorDirecciones= $contadorDirecciones+1;
            AddressOrder::Create([
                'address_id'=>$contadorDirecciones,
                'order_id'=>$orden->id,
                'position'=> 1
            ]);
        }
    }
}
