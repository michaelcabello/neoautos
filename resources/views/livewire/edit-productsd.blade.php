<div>

    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Mis Avisos') }}
        </h2>
    </x-slot>


    <div class="py-10 mx-auto max-w-7xl sm:px-6 lg:px-8">

        <div>
            <div class="py-1">
                <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                    <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">


                        <div class="flex justify-center m-2">
                            <p>Ingrese máximo 10 imagenes por aviso (arrastre sus imagenes en el rectangulo inferior)
                            </p>
                        </div>
                        <div class="grid grid-cols-1 mx-4 bg-gray-200">
                            <form method="POST" action="{{ route('products.photos.store', $product) }}" class="dropzone"
                                id="my-awesome-dropzone">


                            </form>
                        </div>






                        <section class="mt-16">

                            <div
                                class="grid grid-cols-1 px-4 mx-auto max-w-7xl sm:px-6 lg:px-8 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-x-6 gap-y-8">
                                @forelse($product->photos as $photo)
                                    <form method="POST" action="{{ route('products.photos.destroy', $photo) }}">
                                        {{ method_field('DELETE') }} {{ csrf_field() }}
                                        <article class="my-4">
                                            <button
                                                class="px-4 py-2 font-bold text-white bg-red-600 rounded hover:bg-red-700"
                                                style="position:absolute">
                                                <i class="fa-solid fa-trash-can"></i>
                                            </button>

                                            <figure>
                                                <img class="object-cover w-full rounded-xl h-36"
                                                    src="{{ Storage::disk('s3')->url($photo->url) }}" alt="">
                                            </figure>

                                        </article>

                                    </form>

                                @empty
                                    {{-- <div class="flex justify-center col-span-5 my-3 ">
                                        <div class="px-4 py-2 m-2 text-center text-gray-700 bg-gray-400 ">
                                            Aún no tienes imagenes para este producto... <i
                                                class="fa-regular fa-face-frown"></i></div>
                                    </div> --}}
                                @endforelse
                            </div>
                        </section>

                        <div class="px-4 py-4 mb-4 bg-green-200 border border-green-500 rounded-lg">

                            <div class="grid px-4 py-1 mb-2 sm:grid-cols-3 md:grid-cols-3 lg:grid-cols-3 gap-x-1">

                                <div class="col-span-2 px-4 py-1 mb-2 ">
                                    <x-jet-label value="Producto" />
                                    <x-jet-input type="text" class="w-full capitalize" wire:model="name"
                                        placeholder="Ingrese el nombre del producto" />
                                    <x-jet-input-error for="name" />
                                </div>


                            </div>


                            <div class="grid px-4 py-1 mb-2 sm:grid-cols-3 md:grid-cols-3 lg:grid-cols-2 gap-x-1">

                                <div class="px-4 py-1 mb-2 ">
                                    <x-jet-label value="Rubro" />

                                    <select
                                        class="w-full form-control block p-7 py-2.5 mr-3 text-sm text-gray-900 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        wire:model="item_id">

                                        <option value="" disabled selected>Seleccione un Rubro</option>

                                        @foreach ($items as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>

                                    <x-jet-input-error for="item_id" />
                                </div>


                                <div class="px-4 py-1 mb-2 ">
                                    <x-jet-label value="Subcategoria" />

                                    <select
                                        class="w-full form-control block p-7 py-2.5 mr-3 text-sm text-gray-900 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        wire:model="subcategory_id">

                                        <option value="" disabled selected>Seleccione un Categoria</option>

                                        @foreach ($subcategories as $subcategory)
                                            <option value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
                                        @endforeach
                                    </select>

                                    <x-jet-input-error for="subcategory_id" />
                                </div>

                            </div>




                            <div class="grid px-4 py-1 mb-2 sm:grid-cols-3 md:grid-cols-3 lg:grid-cols-2 gap-x-1">

                                <div class="px-4 py-1 mb-2 ">
                                    <x-jet-label value="Marca" />
                                    <select
                                        class="w-full form-control block p-7 py-2.5 mr-3 text-sm text-gray-900 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        wire:model="brand_id">
                                        <option value="" disabled selected>Seleccione una Marca</option>
                                        @foreach ($brands as $brand)
                                            <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                        @endforeach
                                    </select>
                                    <x-jet-input-error for="brand_id" />
                                </div>


                                <div class="px-4 py-1 mb-2 ">
                                    <x-jet-label value="Modelo" />

                                    <select
                                        class="w-full form-control block p-7 py-2.5 mr-3 text-sm text-gray-900 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        wire:model="tipo_id">

                                        <option value="" disabled selected>Seleccione un Modelo</option>

                                        @foreach ($tipos as $tipo)
                                            <option value="{{ $tipo->id }}">{{ $tipo->name }}</option>
                                        @endforeach
                                    </select>

                                    <x-jet-input-error for="tipo_id" />
                                </div>

                            </div>


                            <div class="grid px-4 py-1 mb-2 sm:grid-cols-3 md:grid-cols-3 lg:grid-cols-2 gap-x-1">

                                <div class="px-4 py-1 mb-2 ">
                                    <x-jet-label value="Año de Fabricacion" />

                                    <select
                                        class="w-full form-control block p-7 py-2.5 mr-3 text-sm text-gray-900 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        wire:model="year_id">

                                        <option value="" disabled selected>Seleccione el Año</option>

                                        @foreach ($years as $year)
                                            <option value="{{ $year->id }}">{{ $year->name }}</option>
                                        @endforeach
                                    </select>

                                    <x-jet-input-error for="year_id" />
                                </div>


                                <div class="px-4 py-1 mb-2 ">
                                    <x-jet-label value="Año de Modelo" />

                                    <select
                                        class="w-full form-control block p-7 py-2.5 mr-3 text-sm text-gray-900 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        wire:model="yearmodelo">

                                        <option value="" disabled selected>Seleccione</option>
                                        <option value="{{ $year_name + 1 }}">{{ $year_name + 1 }}</option>
                                        <option value="{{ $year_name }}">{{ $year_name }}</option>

                                    </select>

                                    <x-jet-input-error for="yearmodelo" />
                                </div>

                            </div>






                            <div class="grid px-4 py-1 mb-2 sm:grid-cols-3 md:grid-cols-3 lg:grid-cols-2 gap-x-1">

                                <div class="px-4 py-1 mb-2 ">
                                    <x-jet-label value="Versión" />
                                    <x-jet-input type="text" class="w-full capitalize" wire:model="version"
                                        placeholder="Ingrese la versión" />
                                    <x-jet-input-error for="version" />
                                </div>


                                <div class="px-4 py-1 mb-2 ">
                                    <x-jet-label value="Tipo de Transmisión" />

                                    <select
                                        class="w-full form-control block p-7 py-2.5 mr-3 text-sm text-gray-900 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        wire:model="transmision">

                                        <option value="" disabled selected>Seleccione la transmisión</option>
                                        <option value="automatica">Automática</option>
                                        <option value="mecanica">Mecanica</option>


                                    </select>

                                    <x-jet-input-error for="transmision" />
                                </div>

                            </div>



                            <div class="grid px-4 py-1 mb-2 sm:grid-cols-3 md:grid-cols-3 lg:grid-cols-2 gap-x-1">

                                <div class="px-4 py-1 mb-2 ">
                                    <x-jet-label value="Motor" />
                                    <x-jet-input type="text" class="w-full capitalize" wire:model="motor"
                                        placeholder="Ingrese Motor" />
                                    <x-jet-input-error for="motor" />
                                </div>


                                <div class="px-4 py-1 mb-2 ">
                                    <x-jet-label value="Combustible" />

                                    <select
                                        class="w-full form-control block p-7 py-2.5 mr-3 text-sm text-gray-900 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        wire:model="combustible">

                                        <option value="" disabled selected>Tipo Combustible</option>
                                        <option value="1">gas GNV</option>
                                        <option value="gasglp">gas GLP</option>
                                        <option value="gasolina">gasolina</option>
                                        <option value="petroleo">petroleo</option>
                                        <option value="gas">gas</option>


                                    </select>

                                    <x-jet-input-error for="item_id" />
                                </div>

                            </div>


                            <div class="grid px-4 py-1 mb-2 sm:grid-cols-3 md:grid-cols-3 lg:grid-cols-2 gap-x-1">

                                <div class="px-4 py-1 mb-2 ">
                                    <x-jet-label value="Kilometraje" />
                                    <x-jet-input type="text" class="w-full capitalize" wire:model="kilometraje"
                                        placeholder="Kilometraje" />
                                    <x-jet-input-error for="kilometraje" />
                                </div>


                                <div class="px-4 py-1 mb-2 ">
                                    <x-jet-label value="Numero de Puertas" />

                                    <select
                                        class="w-full form-control block p-7 py-2.5 mr-3 text-sm text-gray-900 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        wire:model="numpuertas">

                                        <option value="" disabled selected>Número de Puertas</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>

                                    </select>

                                    <x-jet-input-error for="numpuertas" />
                                </div>

                            </div>



                            <div class="grid px-4 py-1 mb-2 sm:grid-cols-3 md:grid-cols-3 lg:grid-cols-2 gap-x-1">

                                <div class="px-4 py-1 mb-2 ">
                                    <x-jet-label value="Tracción" />

                                    <select
                                        class="w-full form-control block p-7 py-2.5 mr-3 text-sm text-gray-900 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        wire:model="traccion">

                                        <option value="" disabled selected>Tracción</option>

                                        <option value="aaa">aaaa</option>
                                        <option value="bbb">bbb</option>
                                        <option value="ccc">ccc</option>
                                        <option value="ddd">ddd</option>
                                        <option value="eee">eee</option>
                                        <option value="fff">fff</option>
                                    </select>

                                    <x-jet-input-error for="traccion" />
                                </div>


                                <div class="px-4 py-1 mb-2 ">
                                    <x-jet-label value="Color" />

                                    <select
                                        class="w-full form-control block p-7 py-2.5 mr-3 text-sm text-gray-900 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        wire:model="color_id">

                                        <option value="" disabled selected>Escoja el Color</option>

                                        @foreach ($colors as $color)
                                            <option value="{{ $color->id }}">{{ $color->name }}</option>
                                        @endforeach
                                    </select>

                                    <x-jet-input-error for="color_id" />
                                </div>

                            </div>




                            <div class="grid px-4 py-1 mb-2 sm:grid-cols-3 md:grid-cols-3 lg:grid-cols-2 gap-x-1">


                                <div class="px-4 py-1 mb-2 ">
                                    <x-jet-label value="Numero de Cilindros" />

                                    <select
                                        class="w-full form-control block p-7 py-2.5 mr-3 text-sm text-gray-900 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        wire:model="cilindrada">

                                        <option value="" disabled selected>Seleccione la Cilindrada</option>

                                        <option value="ciliendrada1">ciliendrada1</option>
                                        <option value="ciliendrada2">ciliendrada2</option>
                                        <option value="ciliendrada3">ciliendrada3</option>
                                        <option value="ciliendrada4">ciliendrada4</option>
                                        <option value="ciliendrada5">ciliendrada5</option>
                                        <option value="ciliendrada6">ciliendrada6</option>
                                    </select>

                                    <x-jet-input-error for="cilindrada" />
                                </div>


                                <div class="px-4 py-1 mb-2 ">
                                    <x-jet-label value="Código de Referencia" />
                                    <x-jet-input type="text" class="w-full capitalize"
                                        wire:model="codigoreferencia" placeholder="Ingrese codigo de referencia" />
                                    <x-jet-input-error for="codigoreferencia" />
                                </div>




                            </div>




                            <div class="grid px-4 py-1 mb-2 sm:grid-cols-3 md:grid-cols-3 lg:grid-cols-2 gap-x-1">



                                <div class="px-4 py-1 mb-2 ">
                                    <x-jet-label value="Placa (no se muestra en la página web)" />
                                    <x-jet-input type="text" class="w-full capitalize" wire:model="placa"
                                        placeholder="Ingrese placa" />
                                    <x-jet-input-error for="placa" />
                                </div>




                            </div>

                        </div>

                        <div class="px-4 py-4 mb-4 bg-blue-200 border border-blue-500 rounded-lg">

                            <div class="grid px-6 py-1 mb-2 sm:grid-cols-4 md:grid-cols-4 lg:grid-cols-4 gap-x-1">

                                <div>
                                    <x-jet-label value="Moneda" />
                                    <select
                                        class="w-full form-control block p-7 py-2.5 mr-3 text-sm text-gray-900 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        wire:model="typecurrency">
                                        {{-- <select class="form-control block p-7 py-2.5 ml-3 mr-3 text-sm text-gray-900 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" wire:model="typecurrency"> --}}
                                        {{-- <option value="" disabled selected>Seleccione</option> --}}
                                        {{-- <option value="1">S/ </option> --}}
                                        <option value="2">US$ </option>
                                        {{-- <option value="3">EUR  </option> --}}
                                    </select>
                                    <x-jet-input-error for="typecurrency" />
                                </div>

                                <div>
                                    <x-jet-label value="Precio" />
                                    <x-jet-input type="text" class="w-full capitalize" wire:model="price"
                                        placeholder="Precio" />
                                    <x-jet-input-error for="price" />
                                </div>


                                {{-- <div >
                                    <x-jet-label value="Precio de Oferta" />
                                    <x-jet-input type="text" class="w-full capitalize"
                                        wire:model="priceoffer"
                                        placeholder="Precio de Oferta" />
                                    <x-jet-input-error for="priceoffer" />
                                </div> --}}

                                <div>
                                    <x-jet-label value="Nuevo Usado ?" />
                                    {{-- <select class="form-control p-7 py-2.5 ml-3 mr-3 text-sm text-gray-900 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" wire:model="newused"> --}}
                                    <select
                                        class="w-full form-control block p-7 py-2.5 mr-3 text-sm text-gray-900 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        wire:model="newused">
                                        <option value="" disabled selected>Seleccione</option>
                                        <option value="1">NUEVO</option>
                                        <option value="2">USADO</option>
                                    </select>
                                    <x-jet-input-error for="newused" />
                                </div>

                                {{-- <div >
                                    <x-jet-label value="Stock" />
                                    <x-jet-input type="text" class="w-full capitalize"
                                        wire:model="stock"
                                        placeholder="Stock" />
                                    <x-jet-input-error for="stock" />
                                </div> --}}

                                <div>
                                    <x-jet-label value="Orden" />
                                    <x-jet-input type="number" class="w-full capitalize" wire:model="order"
                                        placeholder="Orden" />
                                    <x-jet-input-error for="order" />
                                </div>


                            </div>
                        </div>


                        <div class="px-4 py-4 mb-4 bg-blue-200 border border-blue-500 rounded-lg">

                            <div class="grid px-4 sm:grid-cols-3 md:grid-cols-3 lg:grid-cols-3 gap-x-6">
                                {{-- Departamentos --}}
                                <div>
                                    <x-jet-label value="Departamento" />

                                    <select
                                        class="w-full form-control block p-7 py-2.5 mr-3 text-sm text-gray-900 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        wire:model="departamento_id">

                                        <option value="" selected>Seleccione un Departamento</option>

                                        @foreach ($departamentos as $department)
                                            <option value="{{ $department->id }}">{{ $department->name }}</option>
                                        @endforeach
                                    </select>

                                    <x-jet-input-error for="departamento_id" />
                                </div>

                                {{-- Provincia --}}
                                <div>
                                    <x-jet-label value="Provincia" />

                                    <select
                                        class="w-full form-control block p-7 py-2.5 mr-3 text-sm text-gray-900 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        wire:model="provincia_id">

                                        <option value="" disabled selected>Seleccione una Provincia</option>

                                        @foreach ($provincias as $provincia)
                                            <option value="{{ $provincia->id }}">{{ $provincia->name }}</option>
                                        @endforeach
                                    </select>

                                    <x-jet-input-error for="provincia_id" />
                                </div>


                                {{-- Distritos --}}
                                <div>
                                    <x-jet-label value="Distrito" />

                                    <select
                                        class="w-full form-control block p-7 py-2.5 mr-3 text-sm text-gray-900 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        wire:model="distrito_id">

                                        <option value="" disabled selected>Seleccione un distrito</option>

                                        @foreach ($distritos as $distrito)
                                            <option value="{{ $distrito->id }}">{{ $distrito->name }}</option>
                                        @endforeach
                                    </select>

                                    <x-jet-input-error for="distrito_id" />
                                </div>

                            </div>

                        </div>


                        {{-- Slug --}}
                        {{-- <div class="px-4 py-1 mb-2">
                                <x-jet-label value="Slug" />
                                <x-jet-input type="text" disabled wire:model="slug" class="w-full bg-gray-200"
                                    placeholder="Ingrese el slug de la categoria" />

                                <x-jet-input-error for="slug" />
                            </div> --}}

                        <div class="px-4 py-4 mb-4 bg-red-200 border border-red-500 rounded-lg">

                            <div class="grid px-4 py-1 mb-2 sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-1 gap-x-1">
                                {{-- Short Descrición --}}
                                <div class="px-4 py-1 mb-2">
                                    <div wire:ignore>
                                        <x-jet-label value="Descripción corta" />
                                        <textarea
                                            class="w-full border-gray-300 rounded-md shadow-sm form-control focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                            rows="3" wire:model="shortdescription">
                                    </textarea>
                                    </div>
                                    <x-jet-input-error for="shortdescription" />
                                </div>

                                {{-- Long Descrición --}}


                                <div class="px-4 py-1 mb-2">
                                    <div wire:ignore>
                                        <x-jet-label value="Descripción Larga" />
                                        <textarea class="w-full form-control" rows="4" wire:model="longdescription" x-data x-init="ClassicEditor.create($refs.miEditor)
                                            .then(function(editor) {
                                                editor.model.document.on('change:data', () => {
                                                    @this.set('longdescription', editor.getData())
                                                })
                                            })
                                            .catch(error => {
                                                console.error(error);
                                            });"
                                            x-ref="miEditor">
                                    </textarea>
                                    </div>
                                    <x-jet-input-error for="longdescription" />
                                </div>

                            </div>
                        </div>


                        {{-- <div class="grid px-4 sm:grid-cols-3 md:grid-cols-3 lg:grid-cols-3 gap-x-6">

                            <div>
                                <x-jet-label value="Departamento" />

                                <select class="w-full form-control" wire:model="departamento_id">

                                    <option value="" selected>Seleccione un Departamento</option>

                                    @foreach ($departamentos as $department)
                                        <option value="{{ $department->id }}">{{ $department->name }}</option>
                                    @endforeach
                                </select>

                                <x-jet-input-error for="departamento_id" />
                            </div>


                            <div>
                                <x-jet-label value="Provincia" />

                                <select class="w-full form-control" wire:model="provincia_id">

                                    <option value="" disabled selected>Seleccione una Provincia</option>

                                    @foreach ($provincias as $provincia)
                                        <option value="{{ $provincia->id }}">{{ $provincia->name }}</option>
                                    @endforeach
                                </select>

                                <x-jet-input-error for="provincia_id" />
                            </div>


                            <div>
                                <x-jet-label value="Distrito" />

                                <select class="w-full form-control" wire:model="distrito_id">

                                    <option value="" disabled selected>Seleccione un distrito</option>

                                    @foreach ($distritos as $distrito)
                                        <option value="{{ $distrito->id }}">{{ $distrito->name }}</option>
                                    @endforeach
                                </select>

                                <x-jet-input-error for="distrito_id" />
                            </div>

                        </div> --}}



                        <div class="flex px-4 py-4 mb-4 bg-red-200 border border-red-500 rounded-lg">

                            <div class="w-full px-6 py-4 text-sm font-medium whitespace-nowrap">
                                <x-jet-label value="Estado" />
                                <label>
                                    {{-- <input value="1" type="radio" name="state" checked> --}}
                                    <x-jet-input type="radio" value="1" name="state" wire:model="state"
                                        checked />
                                    Activado
                                </label>

                                <label class="ml-2">
                                    <x-jet-input type="radio" value="0" name="state" wire:model="state" />
                                    Desactivado
                                </label>
                            </div>

                            <div class="w-full px-4 py-1 mb-2">
                                <x-jet-label value="Ficha Técnica" />
                                <div>
                                    @isset($datasheetback)
                                        <a href="{{ Storage::disk('s3')->url($datasheetback) }}" target="_blank">
                                            <img src="{{ asset('img/logopdf.jpg') }}">
                                        </a>
                                    @else
                                        <a href="#">No hay Brochure o Ficha Técnica</a>
                                        @endif
                                    </div>
                                    <x-jet-input type="file" wire:model="datasheet" placeholder="ficha técnica" />
                                    <x-jet-input-error for="datasheet" />
                                </div>
                            </div>


                            <div class="px-4 py-4 mb-4 bg-red-200 border border-red-500 rounded-lg">

                                {{-- <div class="px-4 py-1 mb-2">

                                <div class="px-4 py-1 mb-2">
                                    <x-jet-label value="Title (maximo 50 caracteres)" />
                                    <x-jet-input type="text" class="w-full" wire:model="title"
                                        placeholder="Title para Google " />
                                    <x-jet-input-error for="title" />
                                </div>

                                <div class="px-4 py-1 mb-2">
                                    <div wire:ignore>
                                        <x-jet-label value="Description para Google" />
                                        <textarea
                                            class="w-full border-gray-300 rounded-md shadow-sm form-control focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                            rows="6" wire:model="description">
                                            </textarea>
                                    </div>
                                    <x-jet-input-error for="description" />
                                </div>

                                <div class="px-4 py-1 mb-2">
                                    <x-jet-label value="Palabras claves" />
                                    <x-jet-input type="text" class="w-full" wire:model="keywords"
                                        placeholder="Palabras claves para Google " />
                                    <x-jet-input-error for="keywords" />
                                </div>

                            </div> --}}



                                <div class="w-full px-4 py-1 mb-2">

                                    <div class="px-4 py-1 mb-2">
                                        <x-jet-label value="Video Youtube" />
                                        <x-jet-input type="text" class="w-full" wire:model="video"
                                            placeholder="video" />
                                        <x-jet-input-error for="video" />
                                    </div>

                                </div>


                                @if ($video)
                                    <div class="w-full px-4 py-1 mb-2">
                                        <iframe width="560" height="315" src="{{ $video }}" frameborder="0"
                                            allowfullscreen></iframe>
                                    </div>
                                @endif


                            </div>

                            <div class="px-4 py-4 mb-4 bg-red-200 border border-red-500 rounded-lg">
                                <div
                                    class="grid w-full px-6 py-1 mb-2 sm:grid-cols-4 md:grid-cols-4 lg:grid-cols-4 gap-x-1">

                                    <div class="flex flex-col">
                                        <h1 class="font-bold">Equipamiento</h1>
                                        <label>
                                            {{-- <input value="1" type="checkbox" name="state" checked> --}}
                                            <x-jet-input type="checkbox" value="1" name="retrovisoreselectricos"
                                                wire:model="retrovisoreselectricos" />
                                            Retrovisores Eléctricos
                                        </label>

                                        <label>
                                            {{-- <input value="1" type="checkbox" name="state" checked> --}}
                                            <x-jet-input type="checkbox" value="1" name="neblineros"
                                                wire:model="neblineros" />
                                            Neblineros
                                        </label>

                                        <label>
                                            {{-- <input value="1" type="checkbox" name="state" checked> --}}
                                            <x-jet-input type="checkbox" value="1" name="aireacondicionado"
                                                wire:model="aireacondicionado" />
                                            Aire Acondicionado
                                        </label>

                                        <label>
                                            {{-- <input value="1" type="checkbox" name="state" checked> --}}
                                            <x-jet-input type="checkbox" value="1" name="fullequipo"
                                                wire:model="fullequipo" />
                                            Full Equipo
                                        </label>
                                        <label>
                                            {{-- <input value="1" type="checkbox" name="state" checked> --}}
                                            <x-jet-input type="checkbox" value="1" name="computadoradeabordo"
                                                wire:model="computadoradeabordo" checked />
                                            Computadora de Abordo
                                        </label>
                                        <label>
                                            {{-- <input value="1" type="checkbox" name="state" checked> --}}
                                            <x-jet-input type="checkbox" value="1" name="parlantesbajos"
                                                wire:model="parlantesbajos" />
                                            Parlantes Bajos
                                        </label>
                                        <label>
                                            {{-- <input value="1" type="radio" name="state"> --}}
                                            <x-jet-input type="checkbox" value="1" name="radiocd"
                                                wire:model="radiocd" />
                                            Radio CD
                                        </label>
                                        <label>
                                            {{-- <input value="1" type="radio" name="state"> --}}
                                            <x-jet-input type="checkbox" value="1" name="radiomp3"
                                                wire:model="radiomp3" />
                                            Radio MP3
                                        </label>


                                    </div>

                                    <div class="flex flex-col">
                                        <h1 class="font-bold">Exterior</h1>
                                        <label>
                                            {{-- <input value="1" type="radio" name="state"> --}}
                                            <x-jet-input type="checkbox" value="1" name="aros"
                                                wire:model="aros" />
                                            Aros
                                        </label>

                                        <label>
                                            {{-- <input value="1" type="checkbox" name="state"> --}}
                                            <x-jet-input type="checkbox" value="1" name="arosdealeacion"
                                                wire:model="arosdealeacion" />
                                            Aros de Aleacion
                                        </label>

                                        <label>
                                            {{-- <input value="1" type="checkbox" name="state"> --}}
                                            <x-jet-input type="checkbox" value="1" name="parrilla"
                                                wire:model="parrilla" />
                                            Parrilla
                                        </label>

                                        <label>
                                            {{-- <input value="1" type="checkbox" name="state"> --}}
                                            <x-jet-input type="checkbox" value="1" name="luceshalogenas"
                                                wire:model="luceshalogenas" />
                                            Luces Halogenas
                                        </label>

                                    </div>

                                    <div class="flex flex-col">
                                        <h1 class="font-bold">Seguridad</h1>
                                        <label>
                                            {{-- <input value="1" type="checkbox" name="state"> --}}
                                            <x-jet-input type="checkbox" value="1" name="localizadorgps"
                                                wire:model="localizadorgps" />
                                            Localizador GPS
                                        </label>

                                        <label>
                                            {{-- <input value="1" type="checkbox" name="state"> --}}
                                            <x-jet-input type="checkbox" value="1" name="airbag"
                                                wire:model="airbag" />
                                            Airbag
                                        </label>

                                        <label>
                                            {{-- <input value="1" type="checkbox" name="state"> --}}
                                            <x-jet-input type="checkbox" value="1" name="laminasdeseguridad"
                                                wire:model="laminasdeseguridad" />
                                            Laminas de Seguridad
                                        </label>

                                        <label>
                                            {{-- <input value="1" type="checkbox" name="state"> --}}
                                            <x-jet-input type="checkbox" value="1" name="blindado"
                                                wire:model="blindado" />
                                            Blindado
                                        </label>

                                        <label>
                                            {{-- <input value="1" type="checkbox" name="state"> --}}
                                            <x-jet-input type="checkbox" value="1" name="farosantiniebladelantero"
                                                wire:model="farosantiniebladelantero" />
                                            Faros Antiniebla Delantero
                                        </label>

                                        <label>
                                            {{-- <input value="1" type="checkbox" name="state"> --}}
                                            <x-jet-input type="checkbox" value="1" name="farosantinieblatraseros"
                                                wire:model="farosantinieblatraseros" />
                                            Faros Antiniebla Traseros
                                        </label>

                                        <label>
                                            {{-- <input value="1" type="checkbox" name="state"> --}}
                                            <x-jet-input type="checkbox" value="1" name="inmovilizadordemotor"
                                                wire:model="inmovilizadordemotor" />
                                            Inmovilizador de Motor
                                        </label>

                                        <label>
                                            {{-- <input value="1" type="checkbox" name="state"> --}}
                                            <x-jet-input type="checkbox" value="1"
                                                name="repartidorelectronicodefrenado"
                                                wire:model="repartidorelectronicodefrenado" />
                                            Repartidor Electronico de Frenado
                                        </label>

                                        <label>
                                            {{-- <input value="1" type="checkbox" name="state"> --}}
                                            <x-jet-input type="checkbox" value="1" name="frenosabs"
                                                wire:model="frenosabs" />
                                            Frenos ABS
                                        </label>

                                        <label>
                                            {{-- <input value="1" type="checkbox" name="state"> --}}
                                            <x-jet-input type="checkbox" value="1" name="alarma"
                                                wire:model="alarma" />
                                            Alarma
                                        </label>

                                    </div>

                                    <div class="flex flex-col">
                                        <h1 class="font-bold">Extras</h1>
                                        <label>
                                            {{-- <input value="1" type="checkbox" name="state"> --}}
                                            <x-jet-input type="checkbox" value="1" name="sunroof"
                                                wire:model="sunroof" checked />
                                            Sunroof
                                        </label>

                                        <label>
                                            {{-- <input value="1" type="checkbox" name="state" checked> --}}
                                            <x-jet-input type="checkbox" value="1" name="asientosdecuero"
                                                wire:model="asientosdecuero" checked />
                                            Asientos de Cuero
                                        </label>

                                        <label>
                                            {{-- <input value="1" type="checkbox" name="state" checked> --}}
                                            <x-jet-input type="checkbox" value="1" name="climatizador"
                                                wire:model="climatizador" checked />
                                            Climatizador
                                        </label>

                                    </div>



                                </div>
                            </div>



                            <div class="px-4 py-4 mb-2">

                                <a href="{{ route('showproductos') }}"
                                    class="inline-block px-4 py-2 text-white bg-blue-500 rounded hover:bg-blue-600">
                                    Cancelar
                                </a>



                                <x-jet-danger-button wire:click="save" wire:loading.attr="disabled"
                                    wire:target="save, image" class="disabled:opacity-25">
                                    Guardar el Aviso
                                </x-jet-danger-button>
                            </div>





                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @push('css')
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.css"
            integrity="sha512-jU/7UFiaW5UBGODEopEqnbIAHOI8fO6T99m7Tsmqs2gkdujByJfkCbbfPSN4Wlqlb9TGnsuC0YgUgWkRBK7B9A=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />
    @endpush

    @push('scripts')
        <script src="https://cdn.ckeditor.com/ckeditor5/28.0.0/classic/ckeditor.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.js"
            integrity="sha512-oQq8uth41D+gIH/NJvSJvVB85MFk1eWpMK6glnkg6I7EdMqC1XVkW7RxLheXwmFdG03qScCM7gKS/Cx3FYt7Tg=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>


        <script>
            Dropzone.options.myAwesomeDropzone = {
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                //paramName: "file",
                maxFilesize: 10,
                dictDefaultMessage: "Click aqui para subir imagenes del  aviso o arrastre sus imagenes aquí",
                acceptedFiles: "image/*",

            };
        </script>
    @endpush
