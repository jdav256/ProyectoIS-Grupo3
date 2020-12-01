<div>
    <div class="flex gap-10">
        <form wire:submit.prevent="add">
            @if($image !== null)
                <img src = {{$image->temporaryURL()}} />
            @endif
            <div class="mt-4">
                <x-jet-label for="package-image">Imagen</x-jet-label>
                <x-jet-input wire:model="image" type="file" id="package-image" class="block mt-1 w-full"/>
                @error('image') <br><span class="error text-red-600">La imagen es obligatoria</span> @enderror
            </div>
            <div>
                <label class="inline-block w-full mt-4">Descripcion del Paquete</label>
                <textarea name="description"
                    class="appearance-none block  w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                    wire:model="description" 
                    placeholder="Describa instrucciones de entrega o de recollecion de paquetes"></textarea>
                @error('description') 
                    <span class="error text-red-600">La descripcion del pedido es obligatoria</span> 
                @enderror
            </div>
            <div class="mt-4">
                <x-jet-label for="package-weight">Peso</x-jet-label>
                <x-jet-input wire:model="weight" id="package-weight" class="block mt-1 w-full"/>
                @error('weight') <br><span class="error text-red-600">El peso es obligatorio</span> @enderror
            </div>
            <div class="mt-4">
                <x-jet-label for="package-volume">Volumen</x-jet-label>
                <x-jet-input wire:model="volume" id="package-volume" class="block mt-1 w-full"/>
                @error('volume') <br><span class="error text-red-600">El volumen es obligatorio</span> @enderror
            </div>
            <div class="my-4">
                <x-jet-label for="package-fragile">Es fragil</x-jet-label>
                <input wire:model="is_it_fragile" id="package-fragile" type="checkbox" class="inline-block"/>
            </div>
            <x-jet-button type="submit">Añadir</x-jet-button>
        </form>
    </div>
</div>