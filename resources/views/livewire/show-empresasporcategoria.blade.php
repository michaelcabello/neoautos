<div>

    <x-slot name="header">
        <div class="flex items-center">
            <h2 class="text-xl font-semibold leading-tight text-gray-600">
                Empresas de la categoria : {{ $name}}
            </h2>


        </div>




    </x-slot>

    <section class="mt-16">

        <div class="grid grid-cols-1 px-4 mx-auto max-w-7xl sm:px-6 lg:px-8 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-6 gap-y-8">
            @foreach ($business as $busine)
                <article>
                    <figure>
                        <img class="object-cover w-full rounded-xl h-36" src="{{asset('img/home/1.jpg')}}" alt="">
                    </figure>
                    <header class="mt-2">

                        <a href="{{route('showempresa', $busine)}} "> {{ $busine->razonsocial}} </a>

                    </header>
                    {{-- <p class="text-sm text-gray-500">Lorem ipsum dolor sit amet consectetur adipisicing adipisicing adipisicing elit.</p> --}}
                </article>
            @endforeach




        </div>

    </section>




</div>
