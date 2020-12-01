<div class="py-12">
    <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
        <div class="sm:rounded-lg md:py-y">
            <div class="flex flex-col px-4 md:px-0 md:grid md:grid-cols-3 md:grid-rows-1 gap-4 py-4 md:py-0 w-full">
                <div class="bg-white h-full">
                    <div class="px-6 pt-4">
                        <x-jet-label for="historial-send"><h1>Pedidos Asignados</h1></x-jet-label>
                        
                    </div>
                    <div class="scrollbar mt-2 @if(sizeof($pedidosAsignados) >= 3) overflow-y-scroll @endif h-10/12 w-full p-4">
                        @foreach ($pedidosAsignados as $order)

                        <div class="overflow-hidden mx-auto my-1 shadow hover:shadow-lg sm:rounded-sm md:rounded-2xl" wire:click="select({{$order->id}})">
                            <div class="cursor-pointer rounded-2xl  @if($selected_order=== $order->id) bg-gradient-to-l from-indigo-300 @endif  p-6 h-28">
                                <p class="text-md">Pedido: {{$order->order_number}}</p>
                                <small class="break-normal text-sm">{{Str::limit($order->description, 50, '...')}}</small>
                            </div>
                        </div>
                        
                        @endforeach
                    </div>
                </div>
                <div class="shadow overflow-hidden sm:rounded-md md:col-span-2 md:w-full md:row-span-1">
                    <div class="px-4 py-5 bg-white sm:p-6 h-full">
                        @if($details_order !== null)
                        <div class="grid grid-flow-row grid-cols-2 grid-rows-1 gap-4">
                            <div><h1 class="text-xl">Número de Pedido: {{$details_order->order_number}} </h1>
                            </div>
                            <div>
                                <div style="float: right">
                                    @if($confirming===$details_order->id)
                                    <button wire:click="kill({{ $details_order->id }})"
                                        class="bg-red-800 text-white w-20 px-4 py-1 hover:bg-red-600 rounded border">Seguro?</button>
                                    @else
                                    <button wire:click="confirmDelete({{ $details_order->id }})"
                                        class="bg-gray-600 text-white w-20 px-4 py-1 hover:bg-red-600 rounded border">Delete</button>
                                    @endif

                                </div> 
                            </div>
                          </div>
                        
                        
                        <h2 class="text-lg mt-6">Cliente: {{  $this->nombreUsuario($details_order->user_id)}}</h2>
                        <div class="mt-4 flex gap-4">
                            <div>
                                <x-jet-label for="client_telephone">Telefono</x-jet-label>
                                <div class="grid grid-flow-row grid-cols-2 grid-rows-1 gap-4">
                                    <div><input id="client_telephone" class="block mt-1 w-full form-textarea text-left"  value="{{$this->telefonoUsuario($details_order->user_id)}}" disabled />
                                    </div>
                                    <div><button class="border border-indigo-500 text-indigo-500 rounded-md px-4 py-1 m-2 transition duration-500 ease select-none hover:text-white hover:bg-indigo-600 focus:outline-none focus:shadow-outline"  
                                        type="button" value="copy" onclick="copiar('client_telephone')"><i class="far fa-copy"></i></button></div>
                                  </div>
                            </div>
                        </div>

                        <!-- Procesamiento del pedido -->
                        <div class="mt-4">
                            <x-jet-label class="text-lg mt-6" for="Status">Desarrollo del Pedido: {{$this->details_order->status}}</x-jet-label>
                            @if('espera'===$this->details_order->status)
                                    <button 
                                        class="bg-gray-600 text-white w-40 px-4 py-1 hover:bg-red-600 rounded border"
                                        wire:click="cambioStatus('{{$this->details_order->status}}',1)">Iniciar</button>
                                        
                            @elseif('iniciado'===$this->details_order->status)
                                <div class="grid grid-flow-col grid-cols-2 grid-rows-2 gap-4" >
                                    <div class="row-span-2">
                                        <x-jet-label for="">Direccion de envio: (latitud - longitud)</x-jet-label>
                                        <x-jet-input  class="block mt-1 w-full" value="{{$details_order->addresses[0]->latitude}} {{$details_order->addresses[0]->longitude}}" disabled/>        
                                    
                                    </div>
                                    <div class="mt-2">
                                        <button
                                        class="bg-gray-600 text-white w-20 px-4 py-1 hover:bg-red-600 rounded border "
                                        wire:click="cambioStatus('{{$this->details_order->status}}',0)"> 
                                        <i class="fas fa-step-backward"></i></button>
                                        <button 
                                        class="bg-gray-600 text-white w-40 px-4 py-1 hover:bg-red-600 rounded border"
                                        wire:click="cambioStatus('{{$this->details_order->status}}',1)">Recolectado?</button>
                                    </div>
                                </div>
                                    
                            @elseif('recolectado'===$this->details_order->status)
                                <x-jet-label for="">imagen de paquetes</x-jet-label>
                                <input  type="file" class="w-full" name="profile_image">
                                <div class="mt-2">
                                    <button
                                        class="bg-gray-600 text-white w-20 px-4 py-1 hover:bg-red-600 rounded border"
                                        wire:click="cambioStatus('{{$this->details_order->status}}',0)"> 
                                    <i class="fas fa-step-backward"></i></button>
                                    <button 
                                        class="bg-gray-600 text-white w-60 px-4 py-1 hover:bg-red-600 rounded border"
                                        wire:click="cambioStatus('{{$this->details_order->status}}',1)">se Realiza Embalaje?</button>
                                </div>
                                
                            @elseif('embalando'===$this->details_order->status)
                            <div class="w-full">
                                <x-jet-label for="send_date">Comentario de embalaje </x-jet-label>
                                <x-jet-input  id="comentario_embalaje" class="block mt-1 w-full" value="" disabled/>
                            </div>
                            
                                   
                            <button
                                        class="bg-gray-600 text-white w-20 px-4 py-1 hover:bg-red-600 rounded border mt-2"
                                        wire:click="cambioStatus('{{$this->details_order->status}}',0)"> 
                                        <i class="fas fa-step-backward"></i></button>
                                <button 
                                class="bg-gray-600 text-white w-60 px-4 py-1 hover:bg-red-600 rounded border"
                                wire:click="cambioStatus('{{$this->details_order->status}}',1)">Dirigirse hacia Punto 2</button>
                            @elseif('hacia_puntoDos'===$this->details_order->status)   
                               <div class="grid grid-flow-col grid-cols-2 grid-rows-2 gap-4" >
                                    <div class="row-span-2">
                                        <x-jet-label for="send_address">Direccion de envio: (latitud - longitud)</x-jet-label>
                                        <x-jet-input id="send_address" class="block mt-1 w-full" value="{{$details_order->addresses[1]->latitude}} {{$details_order->addresses[1]->longitude}}" disabled/>        
                                    
                                    </div>
                                    <div>
                                        <button
                                        class="bg-gray-600 text-white w-20 px-4 py-1 hover:bg-red-600 rounded border"
                                        wire:click="cambioStatus('{{$this->details_order->status}}',0)"> 
                                        <i class="fas fa-step-backward"></i></button>
                                        <button 
                                        class="bg-gray-600 text-white w-60 px-4 py-1 hover:bg-red-600 rounded border"
                                        wire:click="cambioStatus('{{$this->details_order->status}}',1)">Se entrego el Paquete?</button>
                                    </div>
                                </div>
                                
                            @elseif('entregado'===$this->details_order->status)
                                <x-jet-label for="">imagen de Recibido</x-jet-label>
                                <input  type="file" class="w-full" name="profile_image">
                                <button
                                    class="bg-gray-600 text-white w-20 px-4 py-1 hover:bg-red-600 rounded border"
                                    wire:click="cambioStatus('{{$this->details_order->status}}',0)"> <i class="fas fa-step-backward"></i></button>
                                <button 
                                    class="bg-gray-600 text-white w-40 px-4 py-1 hover:bg-red-600 rounded border"
                                    wire:click="cambioStatus('{{$this->details_order->status}}',1)">Finalizar Entrega</button>
                            @endif
                            
                        </div>
    
                        <h2 class="text-lg mt-6">Detalles del Pedido</h2>
                        <div class="mt-4">
                            <div class="grid grid-flow-col grid-cols-2 grid-rows-2 gap-4">
                                <div class="row-span-2">
                                    <x-jet-label for="description">Descripcion</x-jet-label>
                                    <textarea id="description" style="height: 80%" class="block mt-1 w-full form-textarea text-left" disabled>
                                        {{$details_order->description}}
                                        </textarea>
                                </div>
                                <div class="flex gap-4 mt-4">
                                        <div class="w-full">
                                            <x-jet-label for="receive_date">Fecha de entrega</x-jet-label>
                                            <x-jet-input  id="receive_date" class="block mt-1 w-full" value="{{$details_order->delivery_date->format('d/m/Y')}}" disabled/>
                                        </div>
                                    
                                </div>
                                <div>
                                    <div class="w-full">
                                        <x-jet-label for="send_date">Fecha de envio</x-jet-label>
                                        <x-jet-input  id="send_date" class="block mt-1 w-full" value="{{$details_order->order_date->format('d/m/Y')}}" disabled/>
                                    </div>
                                </div>
                                
                            </div>
                            
                        </div>
    
                        <div class="mt-4">
                            <x-jet-label for="send_address">Direccion de envio</x-jet-label>
                            <x-jet-input id="send_address" class="block mt-1 w-full" value="{{$details_order->addresses[0]->description}}" disabled/>
                        </div>
    
                        <div class="mt-4">
                            <x-jet-label for="receive_address">Direccion de entrega</x-jet-label>
                            <x-jet-input id="receive_address" class="block mt-1 w-full" value="{{$details_order->addresses[1]->description}}" disabled/>
                        </div>
    
                        

                        @endif
                    </div>
                </div>
            </div>
            
        </div>
        
    </div>
    <div >
        

    </div>

    
</div>
<script>
    function copiar(id) {
        /* Get the text field */
        console.log(document.getElementById(id).value);
        document.getElementById(id).focus();
        document.getElementById(id).select();
        document.execCommand('copy');
        }
</script>
