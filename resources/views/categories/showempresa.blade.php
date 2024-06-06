<x-app-layout>

    @section('title'){{ $busine->razonsocial }}@stop

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

                Empresa  :  {{ $busine->razonsocial}}


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

        <h1 class="mb-6 text-3xl text-center text-gray-600">Mis Productos</h1>
        <div class="grid px-4 mx-auto max-w-7xl sm:px-6 lg:px-8 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-6 gap-y-8">

            @foreach ( $busine->products  as $producto)

                <article class="card">

                    @if($producto->photos->count() )
                    @foreach ( $producto->photos->take(1) as $photo)
                        <a href="{{ route('verproducto', $producto )}}">
                            <img class="object-cover w-full h-36" src="{{ Storage::disk("s3")->url($photo->url) }}" alt="{{ $producto->name }}">
                        </a>
                    @endforeach
                @else
                    <a href="{{ route('verproducto', $producto )}}">
                        <img class="object-cover w-full h-36" src="{{asset('img/home/producto-peruano.jpg')}}"  alt="{{ $producto->name }}"">
                    </a>
                @endif




                    <div class="card-body">
                        <h1 class="card-title"><a href="{{ route('verproducto', $producto )}}">{{ Str::limit($producto->name, 40)}}</a></h1>

                        <div class="flex">
                            <ul class="flex text-sm">
                                <li class="mr-1"><i class="text-yellow-400 fas fa-star"></i></li>
                                <li class="mr-1"><i class="text-yellow-400 fas fa-star"></i></li>
                                <li class="mr-1"><i class="text-yellow-400 fas fa-star"></i></li>
                                <li class="mr-1"><i class="text-yellow-400 fas fa-star"></i></li>
                                <li class="mr-1"><i class="text-yellow-400 fas fa-star"></i></li>

                            </ul>

                        </div>

                        <a href="{{ route('verproducto', $producto )}}" class="right-0 mt-2 btn btn-primary btn-block">
                            Mostrar Detalle
                        </a>


                    </div>
                </article>

            @endforeach


        </div>

    </section>






</x-app-layout>
