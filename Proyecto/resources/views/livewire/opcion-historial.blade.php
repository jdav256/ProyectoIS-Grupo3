<div class="overflow-hidden mx-auto my-1 sm:rounded-sm md:rounded-2xl" wire:click="$emitUp('select', $order->id)">
    <div class="cursor-pointer rounded-2xl bg-gray-100 hover:from-cool-gray-300 bg-gradient-to-l p-6 h-28">
        <p class="text-md">Pedido: {{$order->order_number}}</p>
        <small class="break-normal text-sm">{{$order->description}} ...</small>  
    </div>
</div>