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



                        <form action="{{ route('sliderclientes.store')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mt-4 ml-6">
                                    <input type="file" value="{{old('image')}}" name="image" id="image" accept="image/*">
                                </div>

                                @error('image')
                                    <small class="mb-5 ml-4 text-red-600">{{ $message }}</small>
                                @enderror



                            <div class="grid px-4 py-1 mt-6 mb-2 sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-1">
                                <div class="col-span-2 px-4 py-1 mb-2 ">
                                        <x-jet-label value="Título" />
                                        <x-jet-input type="text" class="w-full "
                                        name="title" value="{{old('title')}}"
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
                                            name="description" rows="3">{{old('description')}}</textarea>
                                    </div>
                                    <x-jet-input-error for="description" />
                                </div>

                                {{-- Long Descrición --}}
                            </div>


                            <div class="grid px-4 py-1 mb-2 sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-1 ">
                                <div class="col-span-2 px-4 py-1 mb-2 ">
                                        <x-jet-label value="orden" />
                                        <x-jet-input type="number" class="w-1/4"
                                        name="order" value="{{old('order')}}"/>

                                </div>
                            </div>


                            <div class="flex">

                                <div class="px-6 py-4 text-sm font-medium whitespace-nowrap">
                                        <x-jet-label value="Estado" />
                                        <label>
                                            {{-- <input value="1" type="radio" name="state" checked> --}}
                                            <x-jet-input type="radio" value="1" name="state"
                                                checked />
                                            Activado
                                        </label>

                                        <label class="ml-2">
                                            <x-jet-input type="radio" value="0" name="state"  />
                                            Desactivado
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
