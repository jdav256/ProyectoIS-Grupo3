<div>
    {{-- Care about people's approval and you will be their prisoner. --}}
         
        <div class="grid grid-flow-col grid-cols-2  py-6 w-100 " >
            <div class="w-100 px-4">
                <div class="w-100 py-4  sm:px-6 lg:px-8" style="float: left">
                    <form action="">
                                <div >
                                    <label  class="inline-block w-32 font-bold"
                                    >Descripcion</label>
                                    <textarea name="descripciondelPedido"
                                    class="appearance-none block  bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                        wire:model="descripciondelPedido" cols="50" rows="3"  placeholder="Describa instrucciones de entrega o de recollecion de paquetes" ></textarea> 
                                        @error('descripciondelPedido') <span class="error text-red-600">la descripcion del pedido es obligatoria</span> @enderror
    
                                </div>
                                <div class="mb-8 ">
                                    <label for=""
                                    class="inline-block w-32 font-bold">Fecha de Entrega:</label>
                                    <input class="p-2 px-4 py-2 pr-8 leading-tight bg-white border border-gray-400 rounded shadow appearance-none hover:border-gray-500 focus:outline-none focus:shadow-outline"
                                    wire:model="fechaEntrega" type="date" class="mt-1 block " placeholder="Add un nombre a su pedido" />
                                    
                                    @error('fechaEntrega') <br><span class="error text-red-600">La fecha de entrega es obligatoria</span> @enderror
    
                                </div>
                                <div class="mb-8">
                                    <label class="inline-block w-32 font-bold">Direccion de Salida:</label>
                                    <select name="direccionSalida" wire:model="direccionSalida" 
                                        class="p-2 px-4 py-2 pr-8 leading-tight bg-white border border-gray-400 rounded shadow appearance-none hover:border-gray-500 focus:outline-none focus:shadow-outline">
                                        <option value='-1'>Seleccione una direccion</option>
                                        @foreach(Auth::user()->addresses as $direccion)
                                            @if($direccionEntrega != $direccion->id)
                                                <option value={{ $direccion->id }}>{{ $direccion->description }}</option>
                                            @endif  
                                        @endforeach
                                    </select>
                                    
                                    @error('direccionSalida') <br><span class="error text-red-600">la direccion de salida es obligatoria</span> @enderror
    
                                </div>
                                <div class="mb-8">
                                    <label class="inline-block w-32 font-bold">Direccion de Entrega:</label>
                                    <select name="direccionEntrega" wire:model="direccionEntrega" 
                                        class="p-2 px-4 py-2 pr-8 leading-tight bg-white border border-gray-400 rounded shadow appearance-none hover:border-gray-500 focus:outline-none focus:shadow-outline">
                                        <option value=''>Seleccione una direccion</option>
                                        @foreach(Auth::user()->addresses as $direccion)
                                            @if($direccionSalida != $direccion->id)
                                                <option value={{ $direccion->id }}>{{ $direccion->description }}</option>
                                            @endif                                        
                                        @endforeach
                                    </select>
                                    @error('direccionEntrega') <br><span class="error text-red-600">la direccion de entrega es obligatoria</span> @enderror
                                </div>
                                <br>
        
                        <button wire:click="guardar" @if (sizeof($misPaquetes) == 0) disabled @endif type="button"
                        class="@if (sizeof($misPaquetes) > 0) 
                        bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow
                        @else
                        bg-white text-red-800 font-semibold py-2 px-4 border border-red-400 rounded shadow
                        @endif
                        "  >
                            @if (sizeof($misPaquetes) > 0)
                            Hacer Pedido
                            @else
                            Ingrese un Paquete
                            @endif
                        </button>
                        
                        
    
                        
                    
                    </form>
                </div>
            </div>
            <div class="w-100 px-4">
                <div class="py-4" style="float: left; width: 600px"  >
                    <h2 class="inline-block font-bold">Ingreso de Paqutes</h2>
                    <br>
                    <form action="">
                        <div class="mb-4 w-100">
                            <label for="">Contenido Paquete:</label>
                            <input wire:model="contenido" class=" w-80 p-2 px-4 py-2 pr-8 leading-tight bg-white border border-gray-400 rounded shadow appearance-none hover:border-gray-500 focus:outline-none focus:shadow-outline"
                            type="text" placeholder="Contenido Paquete">
                        
                        </div>
                        <div class="mb-4 w-100">
                            <label for="">Volumen</label>
                            <input wire:model="volumen" class=" w-80 p-2 px-4 py-2 pr-8 leading-tight bg-white border border-gray-400 rounded shadow appearance-none hover:border-gray-500 focus:outline-none focus:shadow-outline"
                            type="numeric" placeholder="Ancho x Largo x Alto en cm">
                        
                        </div>
                        <div class="mb-4 w-100">
                            <label for="">Es Fragil</label> <br>
                            <div class="mx-2" style="float: left">
                                <input wire:model="fragil" type="radio" name="fragil" value="1">
                                Si
                            </div>
                            <div class="mx-2" style="float: left">
                                <input wire:model="fragil" type="radio" name="fragil"  value="0" checked="checked">
                                No
                            </div>
                        </div><br>
                        <div class="mb-4 w-100">
                            <label for="">Peso</label>
                            <input wire:model="peso" class=" w-80 p-2 px-4 py-2 pr-8 leading-tight bg-white border border-gray-400 rounded shadow appearance-none hover:border-gray-500 focus:outline-none focus:shadow-outline"
                            type="numeric" placeholder="Peso en Libras ">
                        </div>
    
                        <button type="button" wire:click="agregarPaquete" 
                            class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow"
                            > Ingresar Paquete</button>
                        
    
                        
    
                    </form>
                    <br>
                    <h2>Paquetes Ingresados</h2>
                    <ul>
                        @if ($this->misPaquetes!=[])
                            @foreach ($packages as $key=>$value)
                            <li>Paquete {{$value['description']}} | Volumen: {{$value['volume']}} Peso: {{$value['weight']}} | Fragil: {{$value['is_it_fragile'] ? 'Si' : 'No'}}
                                <button type="button" wire:click="quitarPaquete({{$key}})"
                                class="bg-white hover:bg-gray-100 text-gray-800 font-semibold  px-4 border border-gray-400 rounded shadow"
                                >X</button> </li> 
                            @endforeach    
                        @else
                        
                        @endif
                    </ul>
                    
                    
                </div>
            </div>
            
        </div>

    
</div>