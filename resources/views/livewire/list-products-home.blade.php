<div>
    <section class="mt-3">

        {{-- <h1 class="mb-6 text-3xl text-center text-gray-600">Ultimos Productos</h1> --}}



        <div class="mb-6 bg-white rounded-lg shadow-lg">
            <div class="flex items-center justify-end px-6 py-2">
                {{-- <h1 class="font-semibold text-center text-gray-700 uppercase"> Ultimos Productos </h1> --}}

                <div class="grid grid-cols-2 text-gray-500 border border-gray-200 divide-x divide-gray-200 md:block">
                    <i class="fa fa-border-all p-2 cursor-pointer {{ $view == 'grid' ? 'text-orange-500' : '' }}"
                        wire:click="$set('view', 'grid')"></i>
                    <i class="fas fa-th-list p-2 cursor-pointer {{ $view == 'list' ? 'text-orange-500' : '' }}"
                        wire:click="$set('view', 'list')"></i>
                </div>
            </div>
        </div>


        <h1 class="mb-6 text-3xl text-center text-gray-600">Ultimos Vehiculos Registrados</h1>

        @if ($view == 'grid')
            <div
                class="grid px-4 mx-auto max-w-7xl sm:px-6 lg:px-8 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-6 gap-y-8">

                {{-- @foreach ($productos as $producto)

                    <article class="card">
                        @if ($producto->photos->count())
                            @foreach ($producto->photos->take(1) as $photo)
                            <div class="flex justify-center">
                                <a href="{{ route('verproducto', $producto )}}">
                                    <img class="object-none object-center w-36 h-36" src="{{ Storage::disk("s3")->url($photo->url) }}" alt="{{ $producto->name }}">
                                </a>
                            </div>
                            @endforeach
                        @else
                            <div class="flex justify-center">
                                <a href="{{ route('verproducto', $producto )}}">
                                    <img class="object-none object-center w-36 h-36" src="{{asset('img/home/producto-peruano.jpg')}}"  alt="{{ $producto->name }}"">
                                </a>
                            </div>
                        @endif


                        <div class="card-body">
                            <h1 class="capitalize card-title"><a href="{{ route('verproducto', $producto )}}"> {{ Str::limit($producto->name, 40)}} </a></h1>

                            <div class="flex flex-col">

                                    <ul class="flex mb-2 text-sm">
                                        <li class="mr-1"><i class="text-yellow-400 fas fa-star"></i></li>
                                        <li class="mr-1"><i class="text-yellow-400 fas fa-star"></i></li>
                                        <li class="mr-1"><i class="text-yellow-400 fas fa-star"></i></li>
                                        <li class="mr-1"><i class="text-yellow-400 fas fa-star"></i></li>
                                        <li class="mr-1"><i class="text-yellow-400 fas fa-star"></i></li>

                                    </ul>

                                <p class="text-sm text-gray-500 ">
                                    <i class="fa-sharp fa-solid fa-building"></i>
                                    <a href="{{ route('showempresa', $producto->user )}}"> {{$producto->user->razonsocial}} </a>
                                </p>
                            </div>

                            <a href="{{ route('verproducto', $producto )}}" class="right-0 mt-2 btn btn-primary btn-block">
                                Mostrar Detalle
                            </a>


                        </div>
                    </article>

                @endforeach --}}




                @foreach ($productos as $producto)
                    <article class="card">
                        @if ($producto->photos->count())
                            @foreach ($producto->photos->take(1) as $photo)
                                <div class="flex justify-center">
                                    <a href="{{ route('verproducto', $producto) }}">
                                        <img class="object-cover object-center mx-auto"
                                            src="{{ Storage::disk('s3')->url($photo->url) }}"
                                            alt="{{ $producto->name }}">
                                    </a>
                                </div>
                            @endforeach
                        @else
                            <div class="flex justify-center">
                                <a href="{{ route('verproducto', $producto) }}">
                                    <img class="object-cover object-center mx-auto"
                                        src="{{ asset('img/home/producto-peruano.jpg') }}" alt="{{ $producto->name }}">
                                </a>
                            </div>
                        @endif

                        <div class="card-body">
                            <h1 class="capitalize card-title"><a href="{{ route('verproducto', $producto) }}">
                                    {{ Str::limit($producto->name, 40) }} </a></h1>

                            <div class="flex flex-col">
                                <ul class="flex mb-2 text-sm">
                                    <li class="mr-1"><i class="text-yellow-400 fas fa-star"></i></li>
                                    <li class="mr-1"><i class="text-yellow-400 fas fa-star"></i></li>
                                    <li class="mr-1"><i class="text-yellow-400 fas fa-star"></i></li>
                                    <li class="mr-1"><i class="text-yellow-400 fas fa-star"></i></li>
                                    <li class="mr-1"><i class="text-yellow-400 fas fa-star"></i></li>
                                </ul>
                                <p class="text-sm text-gray-500 ">
                                    <i class="fa-sharp fa-solid fa-building"></i>
                                    <a href="{{ route('showempresa', $producto->user) }}">
                                        {{ $producto->user->razonsocial }} </a>
                                </p>
                            </div>

                            <a href="{{ route('verproducto', $producto) }}"
                                class="right-0 mt-2 btn btn-primary btn-block">
                                Mostrar Detalle
                            </a>
                        </div>
                    </article>
                @endforeach






            </div>

            <div
                class="grid px-4 mx-auto mt-6 text-center w-72 max-w-7xl sm:px-6 lg:px-8 sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-1 gap-x-6 gap-y-8">
                <a href="{{ route('listproducts') }}" class="btn btn-danger"> Ver todo los Avisos</a>
            </div>
        @else
            @foreach ($productos as $product)
                <div class="grid px-4 mx-auto max-w-7xl sm:px-6 lg:px-8 sm:grid-cols-1 md:grid-cols-1">
                    <div class="mb-2 bg-white shadow">
                        <article class="md:flex">
                            <figure>

                                @if ($product->photos->count())
                                    @foreach ($product->photos->take(1) as $photo)
                                        <a href="{{ route('verproducto', $product) }}">
                                            <img class="object-cover object-center w-full h-48 md:w-56"
                                                src="{{ Storage::disk('s3')->url($photo->url) }}"
                                                alt="{{ $product->name }}">
                                        </a>
                                    @endforeach
                                @else
                                    <a href="{{ route('verproducto', $product) }}">
                                        <img class="object-cover w-full h-48 md:w-56"
                                            src="{{ asset('img/home/producto-peruano.jpg') }}"
                                            alt="{{ $product->name }}"">
                                    </a>
                                @endif


                            </figure>

                            <div class="flex flex-col flex-1 px-6 py-4">
                                <div class="justify-between lg:flex">
                                    <div>
                                        <h1 class="text-lg font-semibold text-gray-700 capitalize">{{ $product->name }}
                                        </h1>

                                        <div class="">
                                            <ul class="flex text-sm">
                                                <li>
                                                    <i class="mr-1 text-yellow-400 fas fa-star"></i>
                                                </li>
                                                <li>
                                                    <i class="mr-1 text-yellow-400 fas fa-star"></i>
                                                </li>
                                                <li>
                                                    <i class="mr-1 text-yellow-400 fas fa-star"></i>
                                                </li>
                                                <li>
                                                    <i class="mr-1 text-yellow-400 fas fa-star"></i>
                                                </li>
                                                <li>
                                                    <i class="mr-1 text-yellow-400 fas fa-star"></i>
                                                </li>
                                            </ul>

                                            <span class="text-sm text-gray-700"></span>
                                        </div>





                                        <div class="flex ">
                                            <div>
                                                @if ($product->price)
                                                    <div class="flex mr-4">
                                                        <p class="my-2 text-xl text-neutral-600">
                                                            Precio:

                                                        </p>

                                                        <p class="my-2 ml-3 text-xl font-semibold text-trueGray-700">

                                                            @if ($product->typecurrency == 1)
                                                                S/.
                                                            @elseif($product->typecurrency == 2)
                                                                US$
                                                            @else
                                                                €
                                                            @endif

                                                            @if ($product->priceoffer)
                                                                <span style="text-decoration:line-through;">
                                                                    {{ $product->price }}</span>
                                                            @else
                                                                {{ $product->price }}
                                                            @endif
                                                        </p>
                                                    </div>
                                                @endif

                                                @if ($product->priceoffer)
                                                    <div class="flex">
                                                        <p class="my-2 text-xl text-neutral-600">
                                                            Oferta:


                                                        </p>
                                                        <p class="my-2 ml-3 text-xl font-semibold text-trueGray-700">
                                                            @if ($product->typecurrency == 1)
                                                                S/.
                                                            @elseif($product->typecurrency == 2)
                                                                US$
                                                            @else
                                                                €
                                                            @endif

                                                            {{ $product->priceoffer }}
                                                        </p>
                                                    </div>
                                                @endif
                                            </div>


                                            <div class="ml-3">
                                                @if ($product->user->whatsapp)
                                                    <div class="flex">



                                                        <a href="https://api.whatsapp.com/send?phone=51{{ $product->user->whatsapp }}&text=Hola,%20tengo%20una%20consulta"
                                                            target="_blank">
                                                            <img class="my-2 ml-3 img_wht_avzuno"
                                                                src="/img/whatsapp.png">
                                                        </a>

                                                        <p
                                                            class="flex my-2 ml-3 text-2xl font-semibold text-trueGray-700">
                                                            {{ $product->user->whatsapp }}
                                                        </p>


                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                        <p class="font-bold text-gray-700">
                                            {{ Str::limit($product->shortdescription, 100) }}</p>
                                    </div>
                                </div>


                                <div class="flex">
                                    <div class="w-60">
                                        <a href="{{ route('verproducto', $product) }}"
                                            class="right-0 mt-2 btn btn-primary btn-block">
                                            Mostrar Detalle
                                        </a>

                                    </div>

                                    <div class="ml-3 w-60">
                                        <a href="{{ route('showempresa', $product->user) }}"
                                            class="right-0 mt-2 btn btn-primary btn-block">
                                            Ver Proveedor
                                        </a>
                                    </div>
                                </div>


                            </div>
                        </article>
                    </div>
                </div>
            @endforeach


        @endif



    </section>
</div>
