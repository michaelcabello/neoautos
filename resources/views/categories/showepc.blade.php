<x-app-layout>

    @section('title'){{ $category->name}}@stop

    @section('meta-title'){{ $category->title}}@stop

    @section('meta-description'){{ $category->description }}@stop

    @section('keywords'){{ $category->keywords }}@stop



    <div class="container py-8 mx-auto">
        <figure class="mb-4">
           {{--  <img class="object-cover object-center w-full h-80" src="{{ Storage::url($category->image) }}" alt=""> --}}
        </figure>

        @livewire('show-empresasporcategoria', ['category' => $category])

    </div>

</x-app-layout>
