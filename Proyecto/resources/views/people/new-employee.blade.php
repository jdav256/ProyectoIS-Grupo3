<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Nuevo Empleado') }}
        </h2>
    </x-slot>

    @if ($notification = Session::get('success'))
    <div class="bg-green-600 w-full p-5 text-white rounded-sm">
        <p>Empleado creado exitosamente</p>
    </div>
    @endif

    <div class="py-12">
        <div class="w-4/12 mx-auto">
            <div class="shadow-sm  p-5 rounded-md bg-white">
                <x-slot name="logo">
                    
                </x-slot>
        
                <x-jet-validation-errors class="mb-4" />
        
                <form method="POST" action="{{ route('sempleado') }}">
                    @csrf
        
                    <div class="flex gap-4">
                        <div>
                            <x-jet-label for="name" value="{{ __('Name') }}" />
                            <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                        </div>
        
                        <div>
                            <x-jet-label for="lastname" value="{{ __('Lastname') }}" />
                            <x-jet-input id="lastname" class="block mt-1 w-full" type="text" name="lastname" :value="old('lastname')" required autofocus autocomplete="lastname" />
                        </div>
                    </div>

                    <div class="mt-4">
                        <x-jet-label for="gender" value="{{ __('Gender') }}" />
                        <select id="gender" name="gender" class="form-input rounded-md shadow-sm block mt-1 w-full" >
                            <option value="masculino">Male</option>
                            <option value="femenino">Female</option>
                        </select> 
                    </div>
        
                    <div class="flex gap-4 mt-4">
                    
                        <div class="w-1/2">
                            <x-jet-label for="birthdate" value="{{ __('Birthday') }}" />
                            <x-jet-input id="birthdate" class="block mt-1 w-full" type="date" name="birthdate" :value="old('birthdate')" required autofocus autocomplete="birthdate" />
                        </div>

                        <div class="w-1/2">
                            <x-jet-label for="employment-date" value="{{ __('Employment Date') }}" />
                            <x-jet-input id="employment-date" class="block mt-1 w-full" type="date" name="employment-date" :value="old('employment-date')" required autofocus autocomplete="employment-date" />
                        </div>
                    </div>
        
                    <div class="flex gap-4 mt-4">
                        <div class="w-1/3">
                            <x-jet-label for="type" value="{{ __('Type') }}" />
                            <select id="type" name="type" class="form-input rounded-md shadow-sm block mt-1 w-full" >
                                <option value="repartidor">Driver</option>
                                <option value="administrador">Administrator</option>
                            </select> 
                        </div> 
                        <div class="w-2/3">
                            <x-jet-label for="email" value="{{ __('Email') }}" />
                            <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
                        </div>
                    </div>
        
        
                    <div class="mt-4">
                        <x-jet-label for="password" value="{{ __('Password') }}" />
                        <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                    </div>
        
                    <div class="mt-4">
                        <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                        <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
                    </div>
        
                    <div class="flex items-center justify-end mt-4">
                        
                        <x-jet-button class="ml-4">
                            {{ __('Add') }}
                        </x-jet-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>