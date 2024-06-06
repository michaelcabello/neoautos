<x-app-layout>

    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Datos de mi Empresa') }}
        </h2>
    </x-slot>


    <div class="py-10 mx-auto max-w-7xl sm:px-6 lg:px-8">
    
        <div class="py-1">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">  

                    <div class="col-span-6 ml-2 sm:col-span-4">
                        <x-jet-label class="mx-4 my-4">
                            Escoge hasta 5 categorias para tu Empresa
                        </x-jet-label>

                        <x-jet-danger-button wire:click="update" wire:loading.attr="disabled" wire:target="update">
                            Actualizar
                        </x-jet-danger-button>

                        <form method="POST" action="{{ route('miscategoriasupdated', $user )}}">
                            {{csrf_field()}} {{ method_field('PUT') }}

                            <div class="grid grid-cols-1 ml-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
                                @foreach ($categories as $category)
                                    
                                    <x-jet-label>
                                        <x-jet-checkbox
                                    
                                        wire:model.defer="categories"
                                        name="categories[]"
                                        value="{{$category->id}}" />
                                        {{$category->name}}
                                    </x-jet-label>

                                @endforeach
                            </div>
                            <x-jet-input-error for="categories" />

                        </form>
                    </div>


                </div>
            </div>
        </div>


    </div>
    




    
</x-app-layout>
