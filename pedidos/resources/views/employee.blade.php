<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Bienvenido Empleado
        </h2>
        <a href="" class="mr-2">Pagos</a>
        <a href="" class="mr-2">Solicitdues</a>
        <a href="">Pedidos Activos</a>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <x-tabla-pedidos/>
            </div>
        </div>
    </div>
</x-app-layout>
