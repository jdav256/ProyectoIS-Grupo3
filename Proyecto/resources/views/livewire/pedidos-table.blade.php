<div>
    

    <table class="table-fixed border">
        <THEAd>
            <tr>
                <th class="w-1/6 px-4 py-2">Fecha Entrega</th>
                <th class="w-1/2 px-4 py-2 ">Descripcion</th>
                <th class="w-1/2 px-14 py-2">Contacto Usuario</th>
                <th class="w-1/2 px-4 py-2">Accion</th>
                <th class="w-1/2 px-4 py-2">Cancelar</th>
            </tr>
        </THEAd>
        <tbody>
            
            @foreach ($pedidosAsignados as $pedido)
            <tr >
                <td class="border px-4 py-2">{{$pedido->delivery_date}}</td>
                <td class="border px-4 py-2">{{$pedido->description}}</td>
                <td class="border px-4 py-2">{{$this->datosUsuario($pedido->user_id)}}</td>
                <td class="border px-4 py-2">
                    <button  wire:click="iniciarPedido({{$pedido->id}})"  class="bg-gray-600 text-white w-20 px-4 py-1 hover:bg-blue-600 rounded border" >
                        {{$pedido->status}}
                    </button> 
                </td>
                <td class="border px-4 py-2">
                    @if($confirming===$pedido->id)
                    <button wire:click="kill({{ $pedido->id }})"
                        class="bg-red-800 text-white w-20 px-4 py-1 hover:bg-red-600 rounded border">Seguro?</button>
                @else
                    <button wire:click="confirmDelete({{ $pedido->id }})"
                        class="bg-gray-600 text-white w-20 px-4 py-1 hover:bg-red-600 rounded border">Delete</button>
                @endif 
                </td class="border px-4 py-2">
                
            </tr>
            @endforeach
            
        </tbody>
    </table>
</div>
