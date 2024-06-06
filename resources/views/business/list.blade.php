<x-app-layout>

    {{--     <x-slot name="header">
            <div class="flex items-center">
                <h2 class="text-xl font-semibold leading-tight text-gray-600">
                    Lista de Productos  :
                </h2>
            </div>
        </x-slot> --}}


        <section class="bg-cover" style="background-image:url({{asset('img/banerticom.jpg')}})">
            <div class="px-4 py-20 mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="w-full md:w-3/4 lg:w-1/2">
                    <h1 class="text-4xl text-white font-fold">Busca una Empresa</h1>
                    <p class="mt-2 mb-4 text-lg text-white">Aqui encontraras las emprsas más Exitosas.</p>
                    {{-- <p class="mt-2 mb-4 text-lg text-white">Si deseas vender registrate</p> --}}

                    {{-- <div class="relative pt-2 mx-auto text-gray-600" autocomplete="off">
                        <input class="w-full h-10 px-5 pr-16 text-sm bg-white border-2 border-gray-300 rounded-lg focus:outline-none"
                        type="search" name="search" placeholder="Search">

                        <button type="submit" class="absolute top-0 right-0 px-4 py-2 mt-2 font-bold text-white bg-blue-500 rounded hover:bg-blue-700">
                            Buscar
                        </button>
                    </div> --}}
                    @livewire('search')
                </div>
            </div>
        </section>


        <div class="py-10 mx-auto max-w-7xl sm:px-6 lg:px-8">

           @livewire('lista-empresas')


        </div>

    </x-app-layout>
