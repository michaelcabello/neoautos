<x-app-layout>

    @section('title'){{ $product->title }}@stop

    @section('meta-title'){{ $product->name }}@stop

    @section('meta-description'){{ $product->shortdescription }}@stop

    @section('keywords'){{ $product->keywords }}@stop


        <x-slot name="header">
            <div class="flex items-center">
                <h2 class="flex text-xl font-semibold leading-tight text-gray-600">
                    @if ($product->tipo == 1)
                        Producto:
                    @else
                        Servicio:
                    @endif

                    <p class="ml-3 uppercase"> {{ $product->name }}</p>

                </h2>


            </div>

        </x-slot>




        <div class="container py-8">
            <div class="grid grid-cols-1 gap-4 md:grid-cols-1 md:gap-6">
                <div>
                    <div class="flexslider">
                        <ul class="slides">
                            @if ($product->photos->count())
                                @foreach ($product->photos as $image)
                                    <li data-thumb=" {{ Storage::disk('s3')->url($image->url) }}">
                                        {{-- <img src=" {{ Storage::url($image->url) }}" /> --}}
                                        <img src=" {{ Storage::disk('s3')->url($image->url) }}" alt="{{ $product->name }}" />
                                    </li>
                                @endforeach
                            @else
                                <li data-thumb="{{ asset('img/home/producto-peruano.jpg') }}">
                                    {{-- <img src=" {{ Storage::url($image->url) }}" /> --}}

                                    <img class="object-cover w-full h-36" src="{{ asset('img/home/producto-peruano.jpg') }}"
                                        alt="{{ $product->name }}" />
                                </li>
                            @endif

                        </ul>
                    </div>


                </div>


            </div>

            <div class="grid grid-cols-1 gap-4 md:grid-cols-3 md:gap-6">

                <div class="md:col-span-2">
                    <h1 class="mb-5 text-2xl font-bold uppercase text-trueGray-700">{{ $product->name }}</h1>
                    <div class="mb-6 bg-white rounded-lg shadow-lg">
                        <div class="flex mb-3">
                            <p class="mx-6 text-trueGray-700"><span class="font-bold">Año Modelo: </span> <a
                                    class="underline capitalize hover:text-orange-500"
                                    href="">{{ $product->yearmodelo }}</a></p>
                            <p class="mx-6 text-trueGray-700"><span class="font-bold">Transmisión:</span>
                                {{ $product->transmision }}</p>
                            <p class="mx-6 text-trueGray-700"><span class="font-bold">Combustible: </span>
                                {{ $product->combustible }}</p>

                            {{-- <a class="text-orange-500 underline hover:text-orange-600" href="">39 reseñas</a> --}}
                        </div>

                        <div class="flex">

                            <p class="mx-6 text-trueGray-700"><span class="font-bold">Cilindrada: </span>
                                {{ $product->cilindrada }}</p>
                            <p class="mx-6 text-trueGray-700"><span class="font-bold">Categoría: </span>
                                {{ $product->subcategory->name }}</p>
                            {{-- <a class="text-orange-500 underline hover:text-orange-600" href="">39 reseñas</a> --}}
                        </div>

                        <div class="mb-6 bg-white rounded-lg shadow-lg">
                            <div class="flex ">
                                {{-- @if ($product->price)
                                    <div class="flex ml-3 mr-4">
                                        <p class="my-2 font-semibold m-x-6 text-neutral-600">
                                            Precio:
                                        </p>
                                        <p class="my-2 ml-3 text-trueGray-700">
                                            US$ {{ $product->price }}
                                        </p>
                                    </div>
                                @endif --}}

                                {{-- @if ($product->priceoffer)
                                    <div class="flex">
                                        <p class="my-2 text-xl text-neutral-600">
                                            Precio Oferta:


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
                                @endif --}}
                            </div>


                            <div class="flex">
                                {{-- @if ($product->newused)
                                    <div class="flex ml-3 mr-3">
                                        <p class="my-2 text-xl text-neutral-600">
                                            Producto:
                                        </p>
                                        <p class="my-2 ml-3 text-xl font-semibold text-trueGray-700">
                                            @if ($product->newused == 1)
                                                Nuevo
                                            @else
                                                Usado
                                            @endif

                                        </p>
                                    </div>
                                @endif --}}


                                    @isset($product->datasheet)
                                    <div class="flex mr-3">
                                        <p class="my-2 text-xl text-neutral-600">
                                            Ficha Técnica:
                                        </p>
                                        <p class="flex my-2 text-xl font-semibold text-trueGray-700">
                                            <a href="{{ Storage::disk('s3')->url($product->datasheet) }}" target="_blank">
                                                <img class="w-8 ml-3" src="{{ asset('img/logopdf.jpg') }}">
                                            </a>
                                        </p>
                                    </div>
                                    @endif


                                    {{-- @isset($product->stock)
                                        <div class="flex">
                                            <p class="my-2 text-xl text-neutral-600">
                                                Stock :
                                            </p>
                                            <p class="flex my-2 ml-3 text-xl font-semibold text-trueGray-700">
                                                {{ $product->stock }}
                                            </p>
                                        </div>
                                    @endif --}}

                            </div>


                                    {{-- @if ($product->name)

                                        <div class="flex ml-3">
                                            <p class="my-2 text-xl text-neutral-600"> Compartir Producto en:</p>
                                            <a class="my-2 ml-2 "
                                                href="https://www.facebook.com/sharer.php?u={{ request()->fullUrl() }} & title={{ $product->name }}"
                                                title="Compartir Facebook" target="_blank">
                                                <img alt="Compartir este Producto en Facebook" src="/img/facebook.jpg">
                                            </a>


                                            <a class="my-2 ml-2 "
                                                href="https://twitter.com/intent/tweet?url={{ request()->fullUrl() }}&text={{ $product->name }}&via=TICOMPERU&hashtags=TICOM"
                                                target="_blank" title="Tweet">
                                                <img alt="Tweet" src="/img/Twitter.jpg">
                                            </a>


                                            <a class="my-2 ml-2 " href="https://plus.google.com/share?url={{ request()->fullUrl() }}"
                                                target="_blank" title="Compartir en Google+">
                                                <img alt="Share on Google+" src="/img/Google+.jpg">
                                            </a>


                                            <a class="my-2 ml-2 "
                                                href="http://pinterest.com/pin/create/button/?url={{ request()->fullUrl() }}&description={{ $product->name }}"
                                                target="_blank" title="Pin it">
                                                <img alt="Pin it" src="/img/Pinterest.jpg">
                                            </a>

                                        </div>

                                    @endif --}}

                        </div>
                    </div>

                            {{-- <p class="my-2 text-xl text-neutral-600">Descripción</p> --}}
                            <p class="mb-5 text-2xl font-bold uppercase text-trueGray-700">Descripción</p>
                            <div class="mb-6 bg-white rounded-lg shadow-lg">
                                <div class="mb-8 ml-3">
                                    <p class="mb-4 text-lg font-semibold text-greenLime-600">{!! $product->longdescription !!} </p>
                                    {{-- <p>Recibelo el {{ Date::now()->addDay(7)->locale('es')->format('l j F') }}</p> --}}
                                </div>
                                {{-- <p class="text-lg font-semibold text-greenLime-600">{!! $product->longdescription !!} </p> --}}
                            </div>






                            <p class="mb-5 text-2xl font-bold uppercase text-trueGray-700">Características</p>
                            <div class="mb-6 bg-white rounded-lg shadow-lg">
                                <div class="flex mb-3">
                                    @if($product->brand)
                                    <p class="mx-6 text-trueGray-700"><span class="font-bold">Marca: </span>
                                        <a class="underline capitalize hover:text-orange-500" href="">{{ $product->brand->name }}</a></p>
                                    @endif

                                    @if($product->tipoo)  {{-- tipo es el modelo --}}
                                    <p class="mx-6 text-trueGray-700"><span class="font-bold">Modelo:</span>
                                        {{ $product->tipoo->name }}</p>
                                    @endif
                                    @if($product->year)
                                    <p class="mx-6 text-trueGray-700"><span class="font-bold">Año de fabricación: </span>
                                        {{ $product->year->name }}</p>
                                    @endif
                                   {{--  <p class="mx-6 text-trueGray-700"><span class="font-bold">Combustible: </span>
                                            {{ $product->combustible }}</p> --}}

                                </div>


                                <div class="flex mb-3">
                                    <p class="mx-6 mb-3 text-trueGray-700"><span class="font-bold">Puertas: </span> <a
                                            class="underline capitalize hover:text-orange-500"
                                            href="">{{ $product->numpuertas }}</a></p>

                                    <p class="mx-6 text-trueGray-700"><span class="font-bold">Tracción:</span>
                                        {{ $product->traccion }}</p>

                                    @if($product->color)
                                    <p class="mx-6 text-trueGray-700"><span class="font-bold">Color: </span>
                                        {{ $product->color->name }}</p>
                                    @endif

                                    <p class="mx-6 text-trueGray-700"><span class="font-bold">Número cilindros: </span>
                                            {{ $product->cilindrada }}</p>
                                </div>


                            </div>


                            <p class="mb-5 text-2xl font-bold uppercase text-trueGray-700">Accesorios</p>
                            <div class="mb-6 mb-8 bg-white rounded-lg shadow-lg">
                                    <p class="mb-4 ml-6 font-bold">Equipamiento</p>
                                        <div class="grid grid-cols-4 gap-4 mb-8">
                                        @if($product->retrovisoreselectricos)
                                        <div>
                                            <p class="mx-6 text-trueGray-700"><i class="fa-solid fa-check"></i> Retrovisores Eléctricos</p>
                                        </div>
                                        @endif

                                        @if($product->neblineros)
                                        <div>
                                            <p class="mx-6 text-trueGray-700"> <i class="fa-solid fa-check"></i> Neblineros</p>
                                        </div>
                                        @endif

                                        @if($product->aireacondicionado)
                                        <div>
                                            <p class="mx-6 text-trueGray-700"> <i class="fa-solid fa-check"></i> Aire Acondicionado</p>
                                        </div>
                                        @endif

                                        @if($product->fullequipo)
                                        <div>
                                            <p class="mx-6 text-trueGray-700"> <i class="fa-solid fa-check"></i> Full Equipo</p>
                                        </div>
                                        @endif


                                        @if($product->computadoradeabordo)
                                        <div>
                                            <p class="mx-6 text-trueGray-700"> <i class="fa-solid fa-check"></i> Computadora de Abordo</p>
                                        </div>
                                        @endif

                                        @if($product->parlantesbajos)
                                        <div>
                                            <p class="mx-6 text-trueGray-700"> <i class="fa-solid fa-check"></i> Parlantes Bajos</p>
                                        </div>
                                        @endif

                                        @if($product->radiocd)
                                        <div>
                                            <p class="mx-6 text-trueGray-700"> <i class="fa-solid fa-check"></i> Radio CD</p>
                                        </div>
                                        @endif

                                        @if($product->radiomp3)
                                        <div>
                                            <p class="mx-6 text-trueGray-700"> <i class="fa-solid fa-check"></i> Radio mp3</p>
                                        </div>
                                        @endif
                                    </div>
                                    <div class="mb-6 mb-8 bg-white rounded-lg shadow-lg">
                                        <p class="mb-4 ml-6 font-bold">Exterior</p>

                                        @if($product->aros)
                                        <div>
                                            <p class="mx-6 text-trueGray-700"> <i class="fa-solid fa-check"></i> Aros</p>
                                        </div>
                                        @endif

                                        @if($product->arosdealeacion)
                                        <div>
                                            <p class="mx-6 text-trueGray-700"> <i class="fa-solid fa-check"></i> Aros de Aleación</p>
                                        </div>
                                        @endif

                                        @if($product->parrilla)
                                        <div>
                                            <p class="mx-6 text-trueGray-700"> <i class="fa-solid fa-check"></i> Parrilla</p>
                                        </div>
                                        @endif

                                        @if($product->luceshalogenas)
                                        <div>
                                            <p class="mx-6 text-trueGray-700"> <i class="fa-solid fa-check"></i> Luces halogenas</p>
                                        </div>
                                        @endif
                                    </div>
                                    <div class="mb-6 mb-8 bg-white rounded-lg shadow-lg">
                                        <p class="mb-4 ml-6 font-bold">Seguridad</p>


                                        @if($product->localizadorgps)
                                        <div>
                                            <p class="mx-6 text-trueGray-700"> <i class="fa-solid fa-check"></i> Localizador gps</p>
                                        </div>
                                        @endif

                                        @if($product->airbag)
                                        <div>
                                            <p class="mx-6 text-trueGray-700"> <i class="fa-solid fa-check"></i> Airbag</p>
                                        </div>
                                        @endif

                                        @if($product->laminasdeseguridad)
                                        <div>
                                            <p class="mx-6 text-trueGray-700"> <i class="fa-solid fa-check"></i> Lamina de seguridad</p>
                                        </div>
                                        @endif

                                        @if($product->blindado)
                                        <div>
                                            <p class="mx-6 text-trueGray-700"> <i class="fa-solid fa-check"></i> Blindado</p>
                                        </div>
                                        @endif



                                        @if($product->farosantiniebladelantero)
                                        <div>
                                            <p class="mx-6 text-trueGray-700"> <i class="fa-solid fa-check"></i> Faros antiniebla delantero</p>
                                        </div>
                                        @endif

                                        @if($product->farosantinieblatraseros)
                                        <div>
                                            <p class="mx-6 text-trueGray-700"> <i class="fa-solid fa-check"></i> Faros antiniebla traseros</p>
                                        </div>
                                        @endif

                                        @if($product->inmovilizadordemotor)
                                        <div>
                                            <p class="mx-6 text-trueGray-700"> <i class="fa-solid fa-check"></i> Inmovilizador de motor</p>
                                        </div>
                                        @endif

                                        @if($product->repartidorelectronicodefrenado)
                                        <div>
                                            <p class="mx-6 text-trueGray-700"> <i class="fa-solid fa-check"></i> repartidor electronico de frenado</p>
                                        </div>
                                        @endif



                                        @if($product->frenosabs)
                                        <div>
                                            <p class="mx-6 text-trueGray-700"> <i class="fa-solid fa-check"></i> frenos ABS</p>
                                        </div>
                                        @endif

                                        <div class="mb-6 mb-8 bg-white rounded-lg shadow-lg">
                                            <p class="mb-4 ml-6 font-bold">Extras</p>


                                        @if($product->alarma)
                                        <div>
                                            <p class="mx-6 text-trueGray-700"> <i class="fa-solid fa-check"></i> Alarma</p>
                                        </div>
                                        @endif

                                        @if($product->sunroof)
                                        <div>
                                            <p class="mx-6 text-trueGray-700"> <i class="fa-solid fa-check"></i> Sunroof</p>
                                        </div>
                                        @endif

                                        @if($product->asientosdecuero)
                                        <div>
                                            <p class="mx-6 text-trueGray-700"> <i class="fa-solid fa-check"></i> Asientos de cuero</p>
                                        </div>
                                        @endif

                                        @if($product->climatizador)
                                        <div>
                                            <p class="mx-6 text-trueGray-700"> <i class="fa-solid fa-check"></i> Climatizador</p>
                                        </div>
                                        @endif

                                        </div>

                                    </div>
                            </div>






                        </div>

                        <div>


                            <div class="grid grid-cols-1 divide-y">
                                <div class="flex justify-between p-4 bg-red-500 rounded">
                                    <p class="text-lg font-bold text-white"> <span class="text-sm">US$</span> {{ $product->price }}</p>
                                </div>
                            </div>




                            <p class="my-2 text-xl text-neutral-600">Datos de la Empresa</p>
                            <div class="mb-6 bg-white rounded-lg shadow-lg">
                                @if ($product->user->id)

                                    <div class="flex ml-3">
                                        <p class="my-2 text-xl text-neutral-600">
                                            Empresa :
                                        </p>
                                        <p class="my-2 ml-3 text-xl font-semibold text-trueGray-700">
                                            <a
                                                href="{{ route('showempresa', $product->user) }}">{{ $product->user->razonsocial }}</a>
                                        </p>
                                    </div>
                                @endif


                                @if ($product->user->address)
                                    <div class="flex ml-3">
                                        <p class="my-2 text-xl text-neutral-600">
                                            Dirección :
                                        </p>
                                        <p class="my-2 ml-3 text-xl font-semibold text-trueGray-700">
                                            {{ $product->user->address }}
                                        </p>
                                    </div>
                                @endif

                                <div class="flex ml-3">
                                    @if ($product->user->phone)
                                        <div class="flex mr-3">
                                            <p class="my-2 text-xl text-neutral-600">
                                                Teléfono :
                                            </p>
                                            <p class="my-2 ml-2 text-2xl font-semibold text-trueGray-700">
                                                {{ $product->user->phone }}
                                            </p>
                                        </div>
                                    @endif

                                    @if ($product->user->whatsapp)
                                        <div class="flex">
                                            <p class="my-2 text-xl text-neutral-600">
                                                WhatsApp :
                                            </p>

                                            <p class="flex my-2 ml-3 text-2xl font-semibold text-trueGray-700">
                                                {{ $product->user->whatsapp }}
                                            </p>

                                            <a href="https://api.whatsapp.com/send?phone=51{{ $product->user->whatsapp }}&text=Hola,%20tengo%20una%20consulta"
                                                target="_blank">
                                                <img class="my-2 ml-3 img_wht_avzuno" src="/img/whatsapp.png">
                                            </a>
                                        </div>

                                        <div class="div_btn_pal">
                                            <div class="palpitar"></div>
                                            <a class="btn_wht_escr"
                                                href="https://api.whatsapp.com/send?phone=51{{ $product->user->whatsapp }}&text=Hola,%20tengo%20una%20consulta"
                                                target="_blank">
                                                <img class="img_wht_avz" src="/img/whatsapp.png">
                                                <div class="info_num">
                                                    <p class="txt_num_hover">{{ $product->user->whatsapp }}</p>
                                                </div>
                                            </a>
                                        </div>

                                    @endif
                                </div>
                            </div>




















                            {{-- aqui pondremos un componente livewire --}}

                            <div class="mb-6 bg-white rounded-lg shadow-lg ">
                                @livewire('contactar', ['product' => $product])
                            </div>
                        </div>

                    </div>






                    @if ($cant)
                        <p class="my-2 ml-3 text-xl text-neutral-600">Productos Relacionados</p>
                    @endif


                    <div
                        class="grid px-4 mx-auto max-w-7xl sm:px-6 lg:px-8 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-6 gap-y-8">

                        @foreach ($productrelacionado->take($cant) as $producto)
                            <article class="card">

                                @if ($producto->photos->count())
                                    @foreach ($producto->photos->take(1) as $photo)
                                        <a href="{{ route('verproducto', $producto) }}">
                                            <img class="object-cover w-full h-36"
                                                src="{{ Storage::disk('s3')->url($photo->url) }}" alt="{{ $producto->name }}">
                                        </a>
                                    @endforeach
                                @else
                                    <a href="{{ route('verproducto', $producto) }}">
                                        <img class="object-cover w-full h-36" src="{{ asset('img/home/producto-peruano.jpg') }}"
                                            alt="{{ $producto->name }}"">
                                    </a>
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



                </div>

                @push('scripts')
                    <script>
                        $(document).ready(function() {
                            $('.flexslider').flexslider({
                                animation: "slide",
                                controlNav: "thumbnails"
                            });
                        });
                    </script>
                @endpush













            </x-app-layout>
