<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Nuevo Pedido') }}
        </h2>
        <a href="" class="mr-2">Solicitud de Entrega</a>
    </x-slot> 
    <livewire:formulario-ordenes />
</x-app-layout>