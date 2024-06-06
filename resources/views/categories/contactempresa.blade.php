<x-app-layout>

    @section('title'){{ $busine->title }}@stop

    @isset($busine->razonsocial)
        @section('meta-title'){{ $busine->razonsocial }}@stop
    @else
        @section('meta-title'){{ $busine->name }}@stop
    @endisset


    @section('meta-description'){{ $busine->description }}@stop

    @section('keywords'){{ $busine->keywords }}@stop


    <x-slot name="header">
        <div class="flex items-center">
            <h2 class="text-xl font-semibold leading-tight text-gray-600">
                Empresas  :  {{ $busine->razonsocial}}
            </h2>
        </div>
    </x-slot>
    {{-- logo y menu --}}
            @include('categories.menu')
            @include('categories.slidercliente')

    <div class="container py-4 mx-auto mt-8">
        <figure class="mb-4">
           {{--  <img class="object-cover object-center w-full h-80" src="{{ Storage::url($category->image) }}" alt=""> --}}
        </figure>
        <h1 class="mt-5 text-3xl text-center uppercase">{{ $busine->razonsocial}}</h1>
        <hr>
       {{--  @livewire('show-empresasporcategoria', ['category' => $category]) --}}
    </div>




    <section class="mt-8">


            <div class="grid px-4 mx-auto max-w-7xl sm:px-6 lg:px-8 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-2 gap-x-6 gap-y-8">

                <div>
                    <h3 class="mb-1 text-3xl text-center text-gray-600">Contactar a </h3>
                    <h3 class="mb-6 text-3xl text-center text-gray-600">{{ $busine->razonsocial}}</h3>
                    <div class="max-w-sm sm:w-full lg:max-w-full lg:flex">
                        <div class="flex-none h-48 overflow-hidden text-center bg-cover rounded-t lg:h-auto lg:w-48 lg:rounded-t-none lg:rounded-l" style="background-image: url('/img/ticomempresas.jpg')" title="Portal de Empresas">
                        </div>
                        <div class="flex flex-col justify-between p-4 leading-normal bg-white rounded-b sm:w-full lg:rounded-b-none lg:rounded-r">
                          <div class="mb-8">

                            <div class="mb-2 text-xl font-bold text-gray-900">Nuestros Datos: </div>
                            <p class="mb-2 text-base text-gray-700">{{ $busine->razonsocial }}</p>
                            <div class="flex mb-2">
                                <p class="text-base text-gray-900">RUC: </p>
                                <p class="ml-2 text-base text-gray-500">{{ $busine->ruc }}</p>
                            </div>

                            <div class="flex mb-2">
                                <p class="text-base text-gray-900">WEB: </p>
                                <p class="ml-2 text-base text-gray-500">{{ $busine->web }}</p>
                            </div>

                            <div class="flex mb-2">
                                <p class="text-base text-gray-900">EMAIL: </p>
                                <p class="ml-2 text-base text-gray-500">{{ $busine->email }}</p>
                            </div>

                            <div class="flex mb-2">
                                <p class="text-base text-gray-900">EMAIL: </p>
                                <p class="ml-2 text-base text-gray-500">{{ $busine->email2 }}</p>
                            </div>

                            <div class="flex mb-2">
                                <p class="text-base text-gray-900">TELF.: </p>
                                <p class="ml-2 text-base text-gray-500">{{ $busine->phone }}</p>
                            </div>

                            <div class="flex mb-2">
                                <p class="text-base text-gray-900">CEL.: </p>
                                <p class="ml-2 text-base text-gray-500">{{ $busine->movil }}</p>
                            </div>

                            <div class="flex mb-2">
                                <p class="text-base text-gray-900">WHATSAPP: </p>
                                <p class="ml-2 text-base text-gray-500">{{ $busine->whatsapp }}</p>
                            </div>

                            <div class="flex mb-2">
                                <p class="text-base text-gray-900">DIRECCIÓN: </p>
                                <p class="ml-2 text-base text-gray-500">{{ $busine->address }}</p>
                            </div>

                            <div class="flex mb-2">
                                @if($busine->whatsapp)
                                <p class="ml-2 text-base text-gray-500"><a href="https://api.whatsapp.com/send?phone=51{{ $busine->whatsapp }}&text=Hola,%20tengo%20una%20consulta" target="_blank" target="_blank"><i class="text-green-500 fa-brands fa-whatsapp fa-2x" ></i></a></p>
                                @endif

                                @if($busine->facebook)
                                <p class="ml-2 text-base text-gray-500"><a href="{{ $busine->facebook }}" target="_blank"><i class="text-blue-700 fa-brands fa-facebook fa-2x"></i></a></p>
                                @endif

                                @if($busine->instagram )
                                <p class="ml-2 text-base text-gray-500"><a href="{{ $busine->instagram }}" target="_blank"><i class="text-orange-400 fa-brands fa-instagram fa-2x"></i></a></p>
                                @endif

                                @if($busine->youtube )
                                <p class="ml-2 text-base text-gray-500"><a href="{{ $busine->youtube }}" target="_blank"><i class="text-red-700 fa-brands fa-youtube fa-2x"></i></a></p>
                                @endif

                            </div>




                          </div>
                          <div class="flex items-center">


                          </div>
                        </div>
                    </div>
                </div>

                <div>
                    <h3 class="mb-1 text-3xl text-center text-gray-600">Enviar Mensaje a </h3>
                    <h3 class="mb-6 text-3xl text-center text-gray-600">{{ $busine->razonsocial}}</h3>
                    <div class="w-full ">
                        @if(session()->has('flashc'))

                          <div class="flex items-center px-4 py-3 text-sm font-bold text-white bg-red-500" role="alert">
                            <svg class="w-4 h-4 mr-2 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z"/></svg>
                            <p>{{ session('flashc') }}</p>
                          </div>
                         @endif

                        <form method="POST" action="{{ route('contactempresastore', $busine) }}" class="px-8 pt-6 pb-8 mb-4 bg-white rounded shadow-md">
                          @csrf

                         {{--  <input type="hidden" name="user_id" value="{{ $busine->id }}"> --}}
                          <div class="mb-4">
                            <label class="block mb-2 text-sm font-bold text-gray-700" for="name">
                              Nombres y Apellidos
                            </label>

                            <input class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline" value="{{old('name')}}" name="name" id="name" type="text" placeholder="Nombres y Apellidos">
                            <x-jet-input-error for="name"/>
                          </div>

                          <div class="mb-4">
                            <label class="block mb-2 text-sm font-bold text-gray-700" for="email">
                              Correo
                            </label>
                            <input class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline" value="{{old('email')}}" name="email" id="email" type="text" placeholder="Correo electrónico">
                            <x-jet-input-error for="email"/>
                          </div>


                          <div class="mb-4">
                            <label class="block mb-2 text-sm font-bold text-gray-700" for="movil">
                              Celular
                            </label>
                            <input class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline" value="{{old('movil')}}" name="movil" id="movil" type="text" placeholder="Celular">
                            <x-jet-input-error for="movil"/>
                          </div>

                          <div class="mb-4">


                            <label class="block mb-2 text-sm font-bold text-gray-700" for="description">
                                Mensaje
                            </label>
                            <textarea
                                class="w-full border-gray-700 rounded-md shadow-sm form-control focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                name="description"
                                rows="3" >{{old('description')}}</textarea>
                                <x-jet-input-error for="description"/>
                          </div>



                          <div class="flex items-center justify-between">
                            <button class="px-4 py-2 font-bold text-white bg-blue-500 rounded hover:bg-blue-700 focus:outline-none focus:shadow-outline" type="submit">
                              Enviar
                            </button>

                          </div>

                        </form>


                    </div>
                </div>


            </div>

    </section>


    <section class="mt-8">
        <div class="grid px-4 mx-auto max-w-7xl sm:px-6 lg:px-8 sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-1 ">
            {!! $busine->coordenadas !!}
        </div>
    </section>





</x-app-layout>

