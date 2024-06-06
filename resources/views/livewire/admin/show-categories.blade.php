<div>
    
    <x-slot name="header">
        <div class="flex items-center">
            <h2 class="text-xl font-semibold leading-tight text-gray-600">
                Lista de Categorias
            </h2>

            <x-button-enlace class="ml-auto" href="{{route('admin.categories.create')}}">
                Agregar Categoría
            </x-button-enlace>

            <x-button-enlace class="ml-auto" href="{{route('admin.categories.pdf')}}">
                PDF
            </x-button-enlace>

            <div class="ml-auto">
                <x-button-enlace href="{{ route('admin.exportcategories.excel')}}">Exportar Categorias</x-button-enlace>
            </div>
            
            <div class="ml-auto">
                <form action="{{ route('admin.categories.excel')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    
                    <input type="file" name="import_file">
                    <button type="submit">Importar</button>
    
                </form>
            </div>
        </div>




    </x-slot>

    <!-- This example requires Tailwind CSS v2.0+ -->
    <div class="container py-12 mx-auto">

        <x-table-responsive>

            <div class="px-6 py-4">

                <x-jet-input type="text" 
                    wire:model="search" 
                    class="w-full"
                    placeholder="Ingrese el nombre de la Categoria que quiere buscar" />

            </div>

            @if ($categories->count())
                
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                            <tr>
       
                            <th scope="col"
                                class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                Categoria
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                Slug
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                Estado
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                orden
                            </th>
                            <th scope="col" class="relative px-6 py-3">
                                <span class="sr-only">Editar</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">

                        @foreach ($categories as $category)

                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 w-10 h-10">
                                            @if ($category->image)
                                                <img class="object-cover w-10 h-10 rounded-full"
                                                src="{{ Storage::disk("s3")->url($category->image) }}" alt="">
                                                    {{-- src="{{ Storage::url($category->image) }}" alt=""> --}}
                                            @else
                                                <img class="object-cover w-10 h-10 rounded-full"
                                                    src="https://images.pexels.com/photos/4883800/pexels-photo-4883800.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt="">
                                            @endif
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">
                                                {{ $category->name }}
                                            </div>
                                        </div>
                                    </div>
                                </td>

                                <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                                    {{$category->slug}} 
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap">
                                    @switch($category->state)
                                        @case(0)
                                            <span wire:click="activar({{ $category }})" 
                                                class="inline-flex px-2 text-xs font-semibold leading-5 text-red-800 bg-red-100 rounded-full cursor-pointer">
                                                Borrador
                                            </span>
                                        @break
                                        @case(1)
                                            <span wire:click="desactivar({{ $category }})"
                                                class="inline-flex px-2 text-xs font-semibold leading-5 text-green-800 bg-green-100 rounded-full cursor-pointer">
                                                Publicado
                                            </span>
                                        @break
                                        @default

                                    @endswitch

                                </td>
                                <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                                    {{$category->order}} 
                                </td>



                                <td class="px-6 py-4 text-sm font-medium text-right whitespace-nowrap">
                                    <a href="{{route('admin.categories.edit', $category )}}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                </td>
                            </tr>

                        @endforeach
                        <!-- More people... -->
                    </tbody>
                </table>

            @else
                <div class="px-6 py-4">
                    No hay ningún registro coincidente
                </div>
            @endif

            @if ($categories->hasPages()) {{-- existe paginación --}}               
                <div class="px-6 py-4">
                    {{ $categories->links() }}
                </div>
                
            @endif
                

        </x-table-responsive>
    </div>



</div>
