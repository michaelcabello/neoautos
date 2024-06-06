<x-app-layout>

    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Datos de mi Empresa') }}
        </h2>
    </x-slot>


    <div class="py-10 mx-auto max-w-7xl sm:px-6 lg:px-8">
        
        @livewire('mi-empresa')

    </div>
{{--     
    <div class="container py-8 mx-auto">
        <figure class="mb-4">
          
        </figure>
             
        Datos de mi Empresa

       {{ $user[0]['id'] }}
       {{ $user[0]['email'] }}
        
    </div> --}}

</x-app-layout>

