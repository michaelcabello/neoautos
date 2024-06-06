<x-app-layout>


    <x-slot name="header">
        <div class="flex items-center">
            <h2 class="text-xl font-semibold leading-tight text-gray-600">
                Pedidos  :
            </h2>
        </div>
    </x-slot>

    <div class="py-10 mx-auto max-w-7xl sm:px-6 lg:px-8">


       {{-- @livewire('mis-productos') --}}
       @livewire('mis-pedidos')

{{--         <div class="container py-8 mx-auto">
            <figure class="mb-4">
            <img class="object-cover object-center w-full h-80" src="{{ Storage::url($category->image) }}" alt="">
            </figure>

            productos de la Empresa

            <hr>

            @foreach ( $products as $product )
            <p> {{ $product->name }} </p>
            @endforeach

        </div> --}}
    </div>

</x-app-layout>
