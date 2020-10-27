
<div>
<div>
    <button type="menu" class="open-modal" data-open="modal1">
      Agregar Dirección
    </button>
  </div>
  
  <div  wire:ignore.self class="modal" id="modal1">
    <div class="modal-dialog">
      <header class="modal-header">
        Agrega una nueva dirección
        <button class="close-modal" aria-label="close modal" data-close>
          ✕  
        </button>
      </header>
      <section class="modal-content">
        <div class="w-full max-w-xs">
            
              
            <div class="mt-4">
              <x-jet-label for="latitude">Latitud</x-jet-label>
              <x-jet-input name="latitude" class="block mt-1 w-full" wire:model="latitude"/>
            @error('latitude') <span>{{ $message }}</span> @enderror
          </div>

          <div class="mt-4">
              <x-jet-label for="longitude">Logitud</x-jet-label>
              <x-jet-input name="longitude" class="block mt-1 w-full" wire:model="longitude"/>
              @error('longitude') <span>{{ $message }}</span> @enderror
          </div>

            <div class="mt-4">
              <x-jet-label for="description">Descripcion</x-jet-label>
              <textarea name="description" class="block mt-1 w-full form-textarea text-left" wire:model="description"></textarea>
              @error('description') <span>{{ $message }}</span> @enderror
          </div>

          <div class="flex justify-end pt-2">
              <button wire:click="store" class="px-4 bg-transparent p-3 rounded-lg text-indigo-500 hover:bg-gray-100 hover:text-indigo-400 mr-2" border-color="white">Crear</button>
              <button class="close-modal px-4 bg-indigo-500 p-3 rounded-lg text-white hover:bg-indigo-400" aria-label="close modal" data-close="modal1">Cancelar</button>
          </div>
            
          
        </div>
      </section>
    </div>
  </div>
  
</div>

  <script>
      const openEls = document.querySelectorAll("[data-open]");
const closeEls = document.querySelectorAll("[data-close]");
const isVisible = "is-visible";

for (const el of openEls) {
  el.addEventListener("click", function() {
    const modalId = this.dataset.open;
    document.getElementById(modalId).classList.add(isVisible);
  });
}

for (const el of closeEls) {
  el.addEventListener("click", function() {
    this.parentElement.parentElement.parentElement.classList.remove(isVisible);
  });
}

for (const el of closeEls) {
  el.addEventListener("click", function() {
    const modalId = this.dataset.close;
    document.getElementById(modalId).classList.remove(isVisible);
  });
}



document.addEventListener("click", e => {
  if (e.target == document.querySelector(".modal.is-visible")) {
    document.querySelector(".modal.is-visible").classList.remove(isVisible);
  }
});

document.addEventListener("keyup", e => {
  // if we press the ESC
  if (e.key == "Escape" && document.querySelector(".modal.is-visible")) {
    document.querySelector(".modal.is-visible").classList.remove(isVisible);
  }
});
  </script>