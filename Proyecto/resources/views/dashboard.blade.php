<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Main') }}
            
        </h2>
        <div>
            @livewire('newdirection')
        </div>
        
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
<<<<<<< HEAD
                @livewire('formulario-pedidos')
=======
               
>>>>>>> 13bd2b35e7b5353d91befa507509f0a7804fa6c1
            </div>
        </div>
    </div>
</x-app-layout>
