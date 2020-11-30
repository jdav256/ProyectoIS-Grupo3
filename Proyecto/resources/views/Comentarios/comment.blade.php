<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Comentar') }}
        </h2>
    </x-slot>
    <div>
        <div class="py-12 bg-gray-100">
            @livewire('page-info')
        </div>
    </div>
    <div>
        <div class="py-12 bg-gray-100">
            @livewire('comentar')
        </div>
    </div>
</x-app-layout>