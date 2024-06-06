<x-app-layout>

    <div>

        <x-slot name="header">
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                {{ __('Mis Sliders') }}
            </h2>
        </x-slot>


        <div class="py-10 mx-auto max-w-7xl sm:px-6 lg:px-8">


            <div>

                <div class="py-1">
                    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                        <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">



                            <form action="{{ route('sliderclientes.update', $slidercliente)}}" method="POST" enctype="multipart/form-data">
                                {{csrf_field()}} {{ method_field('PUT') }}

                                    <div class="mt-4 ml-6">
                                        <input type="file" name="image" id="image" accept="image/*">
                                    </div>

                                    @error('image')
                                        <small class="mb-5 text-red-600">{{ $message }}</small>
                                    @enderror



                                    <div class="w-1/2 py-4 mt-8 ml-3 bg-slate-100">

                                        @if($slidercliente->image)
                                            <div>
                                                <p class= ml-4>Slider Actual de tu Empresa</p>
                                            </div>
                                            <img class="w-40 mb-4 ml-4" src="{{ Storage::disk("s3")->url($slidercliente->image) }}" alt="{{ $slidercliente->title }}">

                                        @endif
                                    </div>




                                <div class="grid px-4 py-1 mt-6 mb-2 sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-1">
                                    <div class="col-span-2 px-4 py-1 mb-2 ">
                                            <x-jet-label value="Título" />
                                            <x-jet-input
                                            type="text"
                                            class="w-full "
                                            value="{{old('title', $slidercliente->title)}}"
                                            name="title"
                                                placeholder="Ingrese el titulo del Slider" />
                                            <x-jet-input-error for="title" />
                                    </div>
                                </div>



                                <div class="grid px-4 py-1 mb-2 sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-1 gap-x-1">
                                    {{-- Short Descrición --}}
                                    <div class="px-4 py-1 mb-2">
                                        <div>
                                            <x-jet-label value="Descripción " />
                                            <textarea class="w-full border-gray-300 rounded-md shadow-sm form-control focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                                name="description" rows="3">{{old('description', $slidercliente->description)}}</textarea>
                                        </div>
                                        <x-jet-input-error for="description" />
                                    </div>

                                    {{-- Long Descrición --}}
                                </div>


                                <div class="grid px-4 py-1 mb-2 sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-1 ">
                                    <div class="col-span-2 px-4 py-1 mb-2 ">
                                            <x-jet-label value="orden" />
                                            <x-jet-input type="number"
                                            class="w-1/4"
                                            value="{{old('order', $slidercliente->order)}}"
                                            name="order"
                                                 />
                                            <x-jet-input-error for="order" />
                                    </div>
                                </div>


                                <div class="flex">

                                    <div class="px-6 py-4 text-sm font-medium whitespace-nowrap">
                                            <x-jet-label value="Estado" />


                                            <label>
                                                 {{-- <input value="1" type="radio" name="state" checked> --}}

                                                 <input type="radio"  id="option1" name="state" value="1"  {{ ($slidercliente->state=="1")? "checked" : "" }} > Activo</label>




                                            </label>

                                            <label class="ml-2">

                                                <input type="radio"  id="option1" name="state" value="0"  {{ ($slidercliente->state=="0")? "checked" : "" }} > Desactivo</label>


                                            </label>
                                    </div>
                                </div>



                                <div class="px-4 py-4 mb-2">

                                    <a href="{{ route('sliderclientes.index') }}" class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase transition bg-gray-800 border border-transparent rounded-md hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25">
                                        Cancelar
                                    </a>

                                        <x-jet-danger-button type="submit">
                                            Guardar Slider
                                        </x-jet-danger-button>


                                </div>


                            </form>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
