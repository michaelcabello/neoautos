<x-app-layout>

    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Logo de mi Empresa') }}
        </h2>
    </x-slot>




        <div class="py-10 mx-auto max-w-7xl sm:px-6 lg:px-8">



            <div class="w-1/2 py-4 mt-8 bg-white">
                <div class="ml-4">




                <form action="{{ route('miempresa.logo.update', $empresa )}}" method="POST" enctype="multipart/form-data">

                    {{csrf_field()}} {{ method_field('PUT') }}
                    <div class="py-4">
                        <input type="file" name="file" id="file" accept="image/*">
                    </div>

                    <button type="submit" class="px-4 py-2 mt-5 font-bold text-white bg-blue-500 rounded hover:bg-blue-700">
                        @if($empresa->logo)
                        Actualizar Logo
                        @else
                        Subir Logo
                        @endif
                    </button>

                    @error('file')
                        <small class="mb-5 text-red-600">{{ $message }}</small>
                    @enderror

                </form>


                </div>
            </div>

            <div class="w-1/2 py-4 mt-8 bg-white">

                @if($empresa->logo)
                    <div>
                        <p class= ml-4>Logo Actual de tu Empresa</p>
                    </div>
                    <img class="w-40 mb-4 ml-4" src="{{ Storage::disk("s3")->url($empresa->logo) }}" alt="{{ $empresa->razonsocial }}">

                @endif
            </div>

        </div>

    </x-app-layout>
