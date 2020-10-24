<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <div class="sm:rounded-lg md:py-y">
        <div class="grid grid-cols-3 gap-4 py-4 md:py-0 w-full">
            <div class="col-span-1">
                <div>
                    <x-jet-label for="historial-send">Buscar orden</x-jet-label>
                    <x-jet-input id="historial-send" class="block mt-1 w-full" wire:model=""/>
                </div>
                <div class="overflow-y-scroll h-96 mt-4">
                    @foreach (Auth::user()->addresses as $address)
                        @foreach ($address->orders as $order)
                        <div class="shadow overflow-hidden mx-auto my-1 sm:rounded-sm md:rounded-2xl w-11/12" wire:click="seleccionar({{$order_id}})">
                            <div class="p-2 rounded-2xl bg-white sm:p-6 h-full">
                                <p>Pedido: {{$order->order_number}}</p>
                            </div>
                        </div>
                        @endforeach
                    @endforeach
                </div>
            </div>
            
            <div class="col-span-2 shadow overflow-hidden sm:rounded-md w-full">
                <div class="px-4 py-5 bg-white sm:p-6 h-full">
                    <h1 class="text-xl">Prueba #Status -- -- </h1>
                    
                    <div>
                        <x-jet-label for="historial-send">Direccion de envio</x-jet-label>
                        <x-jet-input id="historial-send" class="block mt-1 w-full" value="{{$pedido_seleccionado}}" />
                    </div>

                    <div class="mt-4">
                        <x-jet-label for="historial-receive">Direccion de entrega</x-jet-label>
                        <x-jet-input id="historial-receive" class="block mt-1 w-full" />
                    </div>

                    <div class="mt-4">
                        <x-jet-label for="historial-date">Fecha de envio</x-jet-label>
                        <x-jet-input  id="historial-date" class="block mt-1 w-full" />
                    </div>    
                    

                    <div class="mt-5">
                        <h2 class="text-lg">Paquetes</h2>
                            <div class="flex mt-5">
                                <img class="h-8 w-8 rounded-full object-cover"
                                    src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                <img class="h-8 w-8 rounded-full object-cover"
                                    src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>  
    
</div>
