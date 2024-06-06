<x-app-layout>

    @section('title')
    Empresas Peruanas ordenadas por categoria
    @stop

    @section('meta-title')
    Empresas Peruanas ordenadas por categoria
    @stop

    @section('meta-description')
    Empresas Peruanas ordenadas por categoria
    @stop

    @section('keywords')
    Empresas Peruanas ordenadas por categoria
    @stop

    <div class="container py-8 mx-auto">
        <figure class="mb-4">
           {{--  <img class="object-cover object-center w-full h-80" src="{{ Storage::url($category->image) }}" alt=""> --}}
        </figure>

        @livewire('show-categories', ['categories' => $categories])

    </div>

</x-app-layout>
