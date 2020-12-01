<div class="container bg-gray-100">
    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
        <div wire:ignore.self class="bg-gray-200 rounded-lg">
            
              <div class="mt-4">
                <x-jet-label for="commentary" class="inline-block w-31 font-bold">Evalua nuestra aplicación con tu comentario</x-jet-label>
                <textarea name="commentary" @if (Auth::user()->commented == 1) disabled @endif class="block mt-1 bg-gray-300 w-full form-textarea py-8 text-left focus:border-gray-500" wire:model="commentary"></textarea>
                @error('comment') <span>{{ $message }}</span> @enderror
                
            </div>
            
          
            <div class="flex justify-end pt-2">
               
                <button wire:click="posts" @if (Auth::user()->commented == 1) disabled class="px-4 bg-gray-400 p-3 rounded-lg text-white mr-2" @endif type="button" class="px-4 bg-blue-600 p-3 rounded-lg text-white mr-2" border-color="white">Publicar</button>   
            </div>
        </div>
        <div class="bg-gray-200 sm:col-span-1 md:col-span-3 rounded-lg">
            <table class="table-fixed">
                <thead>
                  <tr>
                    <th class="w-1/4 ... pt-3">Usuario</th>
                    <th class="w-1/2 ... pt-3">Comentario</th>
                    <th class="w-1/4 ... pt-3">&nbsp;</th>
                  </tr>
                </thead>
                <tbody>
            
                    @if (Auth::user()->commented == 1)
                    <tr>
                        <td class="pt-3 pl-5">{{ $mycomment->name }}</td>
                        <td class="pt-3 pl-5">{{ $mycomment->commentary }}</td>
                        <td class="pt-3 pl-5">
                            <button wire:click="eliminar" class="px-4 bg-gray-600 p-3 rounded-lg text-white mr-2" border-color="white">Eliminar</button>
                        </td>
                    </tr>
                    @endif
            
                    @foreach ($comments as $comment)
                    @if ($comment->commented == 1)
                        <tr>
                           <td class="pt-5 pl-5">{{ $comment->name }}</td>
                           <td class="pt-5 pl-5">{{ $comment->commentary }}</td>
                           <td class="pt-5 pl-5">&nbsp;</td>
                        </tr>
                    @endif
                    @endforeach       
                </tbody>
              </table>
        </div>
    </div>
</div>
