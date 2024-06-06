<div>

    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5">

        <aside>

            <h2 class="mb-2 font-semibold text-center">Subcategorías</h2>
            <ul class="divide-y divide-gray-200">

            </ul>

            <h2 class="mt-4 mb-2 font-semibold text-center">Marcas</h2>
            <ul class="divide-y divide-gray-200">

            </ul>

            <x-jet-button class="mt-4">
                Eliminar filtros
            </x-jet-button>
        </aside>


        <div class="md:col-span-2 lg:col-span-4">
            @if ($view == 'grid')

                <ul class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-4">
                    @forelse ($business as $busines)
                        <li class="bg-white rounded-lg shadow">

                            <article class="card">
                               {{--  <img class="object-cover w-full h-36" src="{{asset('img/home/1.jpg')}}" alt="Portal de Empresas">
                                <img class="object-cover w-full h-36" src="{{ Storage::disk("s3")->url($busines->logo) }}" alt="{{ $busines->razonsocial }}"> --}}

                                @if ($busines->logo)
                                    <figure>
                                        <a href="{{ route('showempresa', $busines )}}">
                                            <img class="object-center w-full rounded-t-xl h-36" src="{{ Storage::disk("s3")->url($busines->logo) }}" alt="{{ $busines->razonsocial }}">
                                        </a>
                                    </figure>
                                @else
                                    <figure>
                                        <a href="{{ route('showempresa', $busines )}}"><img class="object-cover w-full rounded-t-xl h-36" src="{{asset('img/home/empresaperu.jpg')}}" alt="{{ $busines->razonsocial }}"></a>
                                    </figure>
                                @endif




                                <div class="card-body">
                                    <p class="mb-3 text-xs text-gray-900">{{ Str::limit($busines->razonsocial, 22)}}</p>

                                    <div class="flex">
                                        <ul class="flex text-sm">
                                            <li class="mr-1"><i class="text-yellow-400 fas fa-star"></i></li>
                                            <li class="mr-1"><i class="text-yellow-400 fas fa-star"></i></li>
                                            <li class="mr-1"><i class="text-yellow-400 fas fa-star"></i></li>
                                            <li class="mr-1"><i class="text-yellow-400 fas fa-star"></i></li>
                                            <li class="mr-1"><i class="text-yellow-400 fas fa-star"></i></li>

                                        </ul>

                                    </div>

                                    <a href="{{ route('showempresa', $busines )}}" class="right-0 mt-2 btn btn-primary btn-block">
                                        Mostrar Detalle
                                    </a>


                                </div>
                            </article>


                        </li>

                    @empty
                        <li class="md:col-span-2 lg:col-span-4">
                            <div class="relative px-4 py-3 text-red-700 bg-red-100 border border-red-400 rounded" role="alert">
                                <strong class="font-bold">Upss!</strong>
                                <span class="block sm:inline">No existe ninguna empresa con ese filtro.</span>
                            </div>
                        </li>
                    @endforelse
                </ul>

                @if ($business->hasPages()) {{-- existe paginación --}}
                    <div class="px-6 py-4">
                        {{ $business->links() }}
                    </div>
                @endif


            @else
                <ul>
                    @forelse ($business as $busines)

                      {{--   <x-busines-list :busines="$busines" /> --}}

                    @empty

                        <div class="relative px-4 py-3 text-red-700 bg-red-100 border border-red-400 rounded" role="alert">
                            <strong class="font-bold">Upss!</strong>
                            <span class="block sm:inline">No existe ningún empresa con ese filtro.</span>
                        </div>

                    @endforelse
                </ul>
            @endif

            <div class="mt-4">



            </div>
        </div>

    </div>


</div>

