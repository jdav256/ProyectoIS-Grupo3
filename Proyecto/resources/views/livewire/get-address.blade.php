<div wire:focusout="toggle" wire:focusin="toggle" class="my-4">
    <div class="flex">
        <img src="{{asset('storage/location.png')}}" class="h-5 w-5 mr-5 place-self-center" />
        <div class="w-full">
            <x-jet-input wire:model="query" type="text" class="w-full" autocomplete="off"/>
            @if($focused)
                <div class="bg-white absolute rounded-md shadow-lg overflow-y-scroll scrollbar max-h-52">
                <h2 class="p-2 sticky top-0 bg-white">Mis direcciones</h2>
                @foreach ($addresses as $address)
                    <div class="shadow h-full p-2 flex border-gray-100 border hover:bg-indigo-200 cursor-pointer" wire:click="select({{$address->id}})">
                        <i class="fas fa-user mr-3 place-self-center"></i>
                        {{$address->description}}
                    </div>
                @endforeach
                <h2 class="p-2 sticky top-0 bg-white">Direcciones de mis amigos</h2>
                
                @foreach ($addresses as $address)
                    <div class="shadow h-full p-2 flex border-gray-100 border hover:bg-indigo-200 cursor-pointer" wire:click="select({{$address->id}})">
                        <i class="fas fa-user-friends mr-3 place-self-center"></i>
                        {{$address->description}}
                    </div>
                @endforeach
            </div>
        @endif
        </div>
        <div class="flex flex-row place-items-center px-5">
            @if ($selection !== -1)
                <i class="fas fa-angle-double-right mr-3 place-self-center"></i>
                <img src="{{\App\Models\Address::find($selection)->user->profile_photo_url}}" class="h-8 w-8 mx-5 rounded-full place-self-center" />   
            @endif
        </div>
        
    </div>
    
</div>
