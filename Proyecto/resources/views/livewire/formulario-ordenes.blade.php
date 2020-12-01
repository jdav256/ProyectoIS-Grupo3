<div>
    {{-- Care about people's approval and you will be their prisoner. --}}
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Nuevo Pedido') }}
            </h2>
            <a href="" class="mr-2">Solicitud de Entrega</a>
        </x-slot> 
        <div class="py-10">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <form action="">
                    <x-jet-form-section submit="InfoPedido">
                        <x-slot name="title">
                            {{ __('Informacion de Pedido') }}
                        </x-slot>
                        <x-slot name="description">
                            {{ __('Ingrese la Informacion requerida.') }}
                        </x-slot>
                        <x-slot name="form">
                            <div class="col-span-6 sm:col-span-4">
                                <x-jet-label for="" value="{{ __('Nombre Pedido') }}" />
                                <x-jet-input id="name" type="text" class="mt-1 block w-full" placeholder="Add un nombre a su pedido" write:model='impuntNombre' />
                            </div>
                            <div class="col-span-6 sm:col-span-4">
                                <x-jet-label for="" value="{{ __('Descripcion') }}" />
                                <label for=""> <textarea name="" id="" cols="60" rows="3" class="mt-1 block w-full" placeholder="Describa su pedido" write:model='desciption'></textarea> </label>
        
                            </div>
                            <div class="col-span-6 sm:col-span-4">
                                <x-jet-label for="" value="{{ __('Fecha Entrega:') }}" />
                                <x-jet-input id="name" type="date" class="mt-1 block w-full" placeholder="Add un nombre a su pedido" />
                            </div>
                            <div class="col-span-6 sm:col-span-4">
                                <x-jet-label for="" value="{{ __(' Hora Entrega:') }}" />
                                <x-jet-input id="name" type="time" class="mt-1 block w-full" placeholder="Add un nombre a su pedido" />
                            </div>
                            <div class="col-span-6 sm:col-span-4">
                                <x-jet-label for="" value="{{ __('Direccion Entrega') }}" />
                                <label for=""> <select id="DireccionEntrega" class="mt-1 block w-full">
                                    <option selected>  Ubicacion  </option>
                                    <option>...</option>
                                  </select> </label> 
                            </div>
                            <div class="col-span-6 sm:col-span-4">
                                <x-jet-label for="" value="{{ __('Direccion Salida:') }}" />
                                <label for=""> <select id="DireccionEntrega" class="mt-1 block w-full">
                                    <option selected>  Ubicacion</option>
                                    <option>...</option>
                                  </select> </label> 
                            </div>
                            <div class="col-span-6 sm:col-span-4">
                                <x-jet-label for="" value="{{ __('Costo de Entrega:') }}" />
                                <x-jet-input id="name" type="text" class="mt-1 block w-full" placeholder="LPS." />
                                <br>
                            </div>
                            <br>
    
                        </x-slot>
                    </x-jet-form-section>
                    <x-jet-button wire:click='Guardar'>
                        {{ __('Guardar') }}
                    </x-jet-button>
                    <div class="block px-4 py-2 text-xs text-gray-400">
                        {{ __('Horario') }}
                        
                    </div>
                </form>
            </div>
        </div>

    
</div>