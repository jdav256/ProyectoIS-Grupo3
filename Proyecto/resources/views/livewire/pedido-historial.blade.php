<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <div class="sm:rounded-lg md:py-y">
        <div class="flex flex-col px-4 md:px-0 md:grid md:grid-cols-3 md:grid-rows-1 gap-4 py-4 md:py-0 w-full">
            <div class="shadow sm:rounded-md w-1/3 md:col-span-1 md:w-full md:row-span-1 h-screen">
                <div class="bg-white h-full">
                    <div class="px-6 pt-4">
                        <x-jet-label for="historial-send">Buscar orden</x-jet-label>
                        <x-jet-input id="historial-send" class="block mt-1 w-full" wire:model="query"/>
                    </div>
                    <div class="scrollbar mt-2 @if(sizeof($orders) >= 3) overflow-y-scroll @endif h-10/12 w-full p-4">
                        @foreach ($orders as $order)

                        <div class="overflow-hidden mx-auto my-1 shadow hover:shadow-lg sm:rounded-sm md:rounded-2xl" wire:click="select({{$order->id}})">
                            <div class="cursor-pointer rounded-2xl  @if($details_order->id === $order->id) bg-gradient-to-l from-indigo-300 @endif p-6 h-28">
                                <p class="text-md">Pedido: {{$order->order_number}}</p>
                                <small class="break-normal text-sm">{{Str::limit($order->description, 50, '...')}}</small>
                            </div>
                        </div>
                        
                        @endforeach
                    </div>
                </div>
            </div>
            
            <div class="shadow overflow-hidden sm:rounded-md w-2/3 md:col-span-2 md:w-full md:row-span-1"">
                <div class="px-4 py-5 bg-white sm:p-6 h-full">
                    @if($details_order !== null)
                    <h1 class="text-xl">Número de Pedido: {{$details_order->order_number}}</h1>
                    
                    <h2 class="text-lg mt-6">Empleado</h2>
                    <div class="mt-4 flex gap-4">
                        <img class="col-span-1 h-16 w-16 rounded-full object-cover"
                        src="{{ $details_order->employee->user->profile_photo_url }}" alt="{{ $details_order->employee->user->name }}" />

                        <div>
                            <x-jet-label for="employee_name">Nombre</x-jet-label>
                            <x-jet-input id="employee_name" class="block mt-1 w-full form-textarea text-left" value="{{$details_order->employee->user->name}} {{$details_order->employee->user->lastname}}" disabled />
                        </div>
                        
                    </div>

                    <h2 class="text-lg mt-6">Detalles del Pedido</h2>
                    <div class="mt-4">
                        <x-jet-label for="description">Descripcion</x-jet-label>
                        <textarea id="description" class="block mt-1 w-full form-textarea text-left" disabled>
                            {{$details_order->description}}
                        </textarea>
                    </div>

                    <div class="mt-4">
                        <x-jet-label for="send_address">Direccion de envio</x-jet-label>
                        <x-jet-input id="send_address" class="block mt-1 w-full" value="{{$details_order->addresses[0]->description}}" disabled/>
                    </div>

                    <div class="mt-4">
                        <x-jet-label for="receive_address">Direccion de entrega</x-jet-label>
                        <x-jet-input id="receive_address" class="block mt-1 w-full" value="{{$details_order->addresses[1]->description}}" disabled/>
                    </div>

                    <div class="flex gap-4 mt-4">
                        <div class="w-full">
                            <x-jet-label for="send_date">Fecha de envio</x-jet-label>
                            <x-jet-input  id="send_date" class="block mt-1 w-full" value="{{$details_order->order_date->format('d/m/Y')}}" disabled/>
                        </div>
                        <div class="w-full">
                            <x-jet-label for="receive_date">Fecha de entrega</x-jet-label>
                            <x-jet-input  id="receive_date" class="block mt-1 w-full" value="{{$details_order->delivery_date->format('d/m/Y')}}" disabled/>
                        </div>
                    </div>
                    
                    <div class="mt-5">
                        @if(sizeof($details_order->packages) > 0)
                        <h2 class="text-lg">Paquetes</h2> 
                        <div class="mt-5 grid grid-cols-3 gap-4">                      
                            <div class="col-span-1">
                                
                                <div class="grid grid-cols-3 gap-4 border-2 rounded-md border-gray-100 p-3 h-full">
                                    @foreach ($details_order->packages as $package)
                                    <img wire:click="selectPackage({{$package->id}})" class="col-span-1 @if($selected_package === $package->id) shadow-outline @endif h-16 w-16 rounded-full object-cover cursor-pointer"
                                        src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                    @endforeach
                                </div> 
                                
                            </div>
                            <div class="col-span-2">
                                <div class="grid grid-cols-3 gap-4">    
                                    @if($detail_package !== null)
                                    <div class="col-span-2">
                                        <div>
                                            <x-jet-label for="package-weight">Peso</x-jet-label>
                                            <x-jet-input id="package-weight" class="block mt-1 w-full" value="{{$detail_package->weight}} kg" disabled/>
                                        </div>
                    
                                        <div class="mt-4">
                                            <x-jet-label for="package-volume">Volumen</x-jet-label>
                                            <x-jet-input id="package-volume" class="block mt-1 w-full" value="{{$detail_package->volume}} m3" />
                                        </div>
                                    </div>
                                    <div class="col-span-1">
                                        <div>
                                            <x-jet-label for="package-volume">Es fragil</x-jet-label>
                                            <input id="package-volume" type="checkbox" class="inline-block"  {{$detail_package->is_it_fragile ? 'checked': ''}} disabled />
                                        </div>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>  
    
</div>
