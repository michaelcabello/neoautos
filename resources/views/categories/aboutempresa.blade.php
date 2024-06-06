<x-app-layout>

    @section('title'){{ $busine->title }}@stop

    @isset($busine->razonsocial)
        @section('meta-title'){{ $busine->razonsocial }}@stop
    @else
        @section('meta-title'){{ $busine->name }}@stop
    @endisset



    @section('meta-description'){{ $busine->description }}@stop

    @section('keywords'){{ $busine->keywords }}@stop


    <x-slot name="header">
        <div class="flex items-center">
            <h2 class="text-xl font-semibold leading-tight text-gray-600">
                Empresas  :  {{ $busine->razonsocial}}
            </h2>


        </div>

    </x-slot>

    {{-- logo y menu --}}
    @include('categories.menu')

    @include('categories.slidercliente')








    <div class="container py-4 mx-auto mt-8">
        <figure class="mb-4">
           {{--  <img class="object-cover object-center w-full h-80" src="{{ Storage::url($category->image) }}" alt=""> --}}
        </figure>

        <h1 class="mt-5 text-3xl text-center uppercase">{{ $busine->razonsocial}}</h1>
        <h1>{!! $busine->aboutus !!}</h1>
        <hr>
       {{--  @livewire('show-empresasporcategoria', ['category' => $category]) --}}
    </div>




    <section class="mt-8">


            <div class="grid px-4 mx-auto max-w-7xl sm:px-6 lg:px-8 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-2 gap-x-6 gap-y-8">

                <div>
                    <h3 class="mb-6 text-3xl text-center text-gray-600">Visión</h3>
                    <p>{!! $busine->vision !!}</p>
                </div>

                <div>
                    <h3 class="mb-6 text-3xl text-center text-gray-600">Misión</h3>
                    <p>{!! $busine->mission !!}</p>
                </div>


            </div>

    </section>


    <section class="py-12 mt-2 bg-red-500">
        <h1 class ="text-3xl text-center text-white">Contacte Con Nosotros Ahora !</h1>
        <p class="text-center text-white">Escríbenos y le responderemos a la brevedad</p>
        <div class="flex justify-center mt-4">
            <a href="{{ route('contactempresa', $busine) }}" class="px-4 py-2 font-bold text-white bg-green-500 hover:bg-green-700">
                Contactar
            </a>
        </div>

    </section>



</x-app-layout>

