<div>
    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5">

        <aside>

            <h2 class="mb-2 font-semibold text-center">Subcategorías</h2>
            <ul class="divide-y divide-gray-200">

            </ul>



            <h2 class="mt-4 mb-2 font-semibold text-center">Marcas</h2>
            <ul class="divide-y divide-gray-200">
                @foreach ($brands as $brand)
                    <li class="py-2 text-sm">
                        <a class="cursor-pointer hover:text-orange-500 capitalize {{ $marca == $brand->name ? 'text-orange-500 font-semibold' : '' }}"
                            wire:click="$set('marca', '{{ $brand->name }}')">
                            {{ $brand->name }}
                        </a>
                    </li>
                @endforeach
            </ul>
            <h2 class="mt-4 mb-2 font-semibold text-center">Precio</h2>
            <ul class="divide-y divide-gray-200">
                <li class="py-2 text-sm">
                    <a class="cursor-pointer hover:text-orange-500 capitalize {{ $precio == '0-5000' ? 'text-orange-500 font-semibold' : '' }}"
                        wire:click="$set('precio', '0-5000')">
                        Hasta US$5,000
                    </a>
                </li>

                <li class="py-2 text-sm">
                    <a class="cursor-pointer hover:text-orange-500 capitalize {{ $precio == '5000-10000' ? 'text-orange-500 font-semibold' : '' }}"
                        wire:click="$set('precio', '5000-10000')">
                        US$5,000 a US$10,000
                    </a>
                </li>


            </ul>



            <h2 class="mt-4 mb-2 font-semibold text-center">Año</h2>
            <ul class="divide-y divide-gray-200">
                <li class="py-2 text-sm">
                    <a class="cursor-pointer hover:text-orange-500 capitalize {{ $ano == '2018-2024' ? 'text-orange-500 font-semibold' : '' }}"
                        wire:click="$set('ano', '2018-2024')">
                        2018 a 2024
                    </a>


                </li>


                <li class="py-2 text-sm">
                    <a class="cursor-pointer hover:text-orange-500 capitalize {{ $ano == '2012-2017' ? 'text-orange-500 font-semibold' : '' }}"
                        wire:click="$set('ano', '2012-2017')">
                        2012 a 2017
                    </a>


                </li>

                <li class="py-2 text-sm">
                    <a class="cursor-pointer hover:text-orange-500 capitalize {{ $ano == '2006-2011' ? 'text-orange-500 font-semibold' : '' }}"
                        wire:click="$set('ano', '2006-2011')">
                        2006 a 2011
                    </a>


                </li>

                <li class="py-2 text-sm">

                    <a class="cursor-pointer hover:text-orange-500 capitalize {{ $ano == '2000-2005' ? 'text-orange-500 font-semibold' : '' }}"
                        wire:click="$set('ano', '2000-2005')">
                        2000 a 2005
                    </a>


                </li>

                <li class="py-2 text-sm">
                    <a class="cursor-pointer hover:text-orange-500 capitalize {{ $ano == '1970-1999' ? 'text-orange-500 font-semibold' : '' }}"
                        wire:click="$set('ano', '1970-1999')">
                        1970 a 1999
                    </a>

                </li>

                <!-- Agrega los otros rangos de años aquí -->
            </ul>


            <h2 class="mt-4 mb-2 font-semibold text-center">Kilometraje</h2>
            <ul class="divide-y divide-gray-200">
                <li class="py-2 text-sm">
                    <a class="cursor-pointer hover:text-orange-500 capitalize {{ $kilometraje == '0-12000' ? 'text-orange-500 font-semibold' : '' }}"
                        wire:click="$set('kilometraje', '0-12000')">
                        Hasta 12,000 Kms
                    </a>
                </li>

                <li class="py-2 text-sm">
                    <a class="cursor-pointer hover:text-orange-500 capitalize {{ $kilometraje == '12000-30000' ? 'text-orange-500 font-semibold' : '' }}"
                        wire:click="$set('kilometraje', '12000-30000')">
                        12,000 a 30,000 Kms
                    </a>
                </li>
                <li class="py-2 text-sm">
                    <a class="cursor-pointer hover:text-orange-500 capitalize {{ $kilometraje == '30000-50000' ? 'text-orange-500 font-semibold' : '' }}"
                        wire:click="$set('kilometraje', '30000-50000')">
                        30,000 a 50,000 Kms
                    </a>
                </li>

                <li class="py-2 text-sm">
                    <a class="cursor-pointer hover:text-orange-500 capitalize {{ $kilometraje == '50000-100000' ? 'text-orange-500 font-semibold' : '' }}"
                        wire:click="$set('kilometraje', '50000-100000')">
                        50,000 a 100,000 Kms
                    </a>
                </li>

                <li class="py-2 text-sm">
                    <a class="cursor-pointer hover:text-orange-500 capitalize {{ $kilometraje == '100000-200000' ? 'text-orange-500 font-semibold' : '' }}"
                        wire:click="$set('kilometraje', '100000-200000')">
                        100,000 a 200,000 Kms
                    </a>
                </li>




            </ul>


            <x-jet-button class="mt-4">
                Eliminar filtros
            </x-jet-button>
        </aside>

        <div class="md:col-span-2 lg:col-span-4">
            @if ($view == 'grid')

                <ul class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-4">
                    @forelse ($products as $product)
                        <li class="bg-white rounded-lg shadow">

                            <article class="card">

                                @if ($product->photos->count())
                                    @foreach ($product->photos->take(1) as $photo)
                                        <a href="{{ route('verproducto', $product) }}">
                                            <img class="object-cover w-full h-36"
                                                src="{{ Storage::disk('s3')->url($photo->url) }}"
                                                alt="{{ $product->name }}">
                                        </a>
                                    @endforeach
                                @else
                                    <a href="{{ route('verproducto', $product) }}">
                                        <img class="object-cover w-full h-36"
                                            src="{{ asset('img/home/producto-peruano.jpg') }}"
                                            alt="{{ $product->name }}"">
                                    </a>
                                @endif






                                <div class="card-body">
                                    <h1 class="card-title"><a
                                            href="{{ route('verproducto', $product) }}">{{ Str::limit($product->name, 15) }}</a>
                                    </h1>
                                    {{-- <p class="mb-2 text-sm text-gray-500">Profe: {{$product->name}}</p> --}}
                                    <div class="flex">
                                        <ul class="flex text-sm">
                                            <li class="mr-1"><i class="text-yellow-400 fas fa-star"></i></li>
                                            <li class="mr-1"><i class="text-yellow-400 fas fa-star"></i></li>
                                            <li class="mr-1"><i class="text-yellow-400 fas fa-star"></i></li>
                                            <li class="mr-1"><i class="text-yellow-400 fas fa-star"></i></li>
                                            <li class="mr-1"><i class="text-yellow-400 fas fa-star"></i></li>

                                        </ul>
                                        {{--                          <p class="ml-auto text-sm text-gray-500">
                                            <i class="fas fa-users"></i>
                                            ({{$product->name}})
                                        </p> --}}
                                    </div>

                                    <a href="{{ route('verproducto', $product) }}"
                                        class="right-0 mt-2 btn btn-primary btn-block">
                                        Mostrar Detalle
                                    </a>


                                </div>
                            </article>







                        </li>

                    @empty
                        <li class="md:col-span-2 lg:col-span-4">
                            <div class="relative px-4 py-3 text-red-700 bg-red-100 border border-red-400 rounded"
                                role="alert">
                                <strong class="font-bold">Upss!</strong>
                                <span class="block sm:inline">No existe ningún producto con ese filtro.</span>
                            </div>
                        </li>
                    @endforelse
                </ul>

                @if ($products->hasPages())
                    {{-- existe paginación --}}
                    <div class="px-6 py-4">
                        {{ $products->links() }}
                    </div>
                @endif
            @else
                <ul>
                    @forelse ($products as $product)
                        {{--   <x-product-list :product="$product" /> --}}

                    @empty

                        <div class="relative px-4 py-3 text-red-700 bg-red-100 border border-red-400 rounded"
                            role="alert">
                            <strong class="font-bold">Upss!</strong>
                            <span class="block sm:inline">No existe ningún producto con ese filtro.</span>
                        </div>
                    @endforelse
                </ul>
            @endif

            <div class="mt-4">



            </div>
        </div>

    </div>


</div>
