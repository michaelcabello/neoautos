<div>

    <x-slot name="header">
        <div class="flex items-center">
            <h2 class="text-xl font-semibold leading-tight text-gray-600">
                Lista de Categorias
            </h2>


        </div>


    </x-slot>

    <!-- This example requires Tailwind CSS v2.0+ -->

    <div class="grid grid-cols-1 gap-6 ">
        {{-- <aside>

            <h2 class="mb-2 font-semibold text-center">Subcategorías</h2>

            <h2 class="mt-4 mb-2 font-semibold text-center">Marcas</h2>


            <x-jet-button class="mt-4" wire:click="limpiar">
                Eliminar filtros
            </x-jet-button>
        </aside> --}}


            <x-table-responsive>

                <div class="flex items-center px-6 py-4">


                    <div class="flex items-center">
                        <span>Mostrar </span>
                        <select wire:model="cant" class="ml-3 mr-3 form-control">
                            <option value="10">10</option>
                            <option value="25">25</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                        </select>
                        <span>entradas</span>
                    </div>


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
                                    class="w-24 px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase cursor-pointer"
                                    wire:click="order('id')">
                                    ID


                                        @if ($sort == 'id')
                                            @if ($direction == 'asc')
                                             <i class="float-right mt-1 fas fa-sort-alpha-up-alt"></i>
                                            @else
                                              <i class="float-right mt-1 fas fa-sort-alpha-down-alt"></i>
                                            @endif
                                        @else
                                             <i class="float-right mt-1 fas fa-sort"></i>
                                        @endif


                                </th>


                                <th scope="col"
                                    class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase cursor-pointer"
                                    wire:click="order('name')">
                                    Categoría


                                        @if ($sort == 'name')
                                            @if ($direction == 'asc')
                                            <i class="float-right mt-1 fas fa-sort-alpha-up-alt"></i>
                                            @else
                                            <i class="float-right mt-1 fas fa-sort-alpha-down-alt"></i>
                                            @endif
                                        @else
                                            <i class="float-right mt-1 fas fa-sort"></i>
                                        @endif

                                </th>

                                <th scope="col"
                                    class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                    Numero de Empresas
                                </th>

                                <th scope="col" class="relative px-6 py-3">
                                    <span class="sr-only">Ver Empresas</span>

                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">

                            @foreach ($categories as $category)

                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 w-10 h-10">
                                                {{-- @if ($category->image)
                                                    <img class="object-cover w-10 h-10 rounded-full"
                                                    src="{{ Storage::disk("s3")->url($category->image) }}" alt="">
                                                         src="{{ Storage::url($category->image) }}" alt="">
                                                @else
                                                    <img class="object-cover w-10 h-10 rounded-full"
                                                        src="https://images.pexels.com/photos/4883800/pexels-photo-4883800.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt="">
                                                @endif  --}}
                                                {{ $category->id }}
                                            </div>

                                        </div>
                                    </td>

                                    <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                                        <a href="{{route('showepc', $category)}}"> {{ $category->name }} </a>
                                    </td>


                                    <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                                        <a href="{{route('showepc', $category)}}"> {{ $category->business_count }} </a>
                                    </td>



                                    <td class="px-6 py-4 text-sm font-medium text-right whitespace-nowrap">

                                        <a href="{{route('showepc', $category)}}" class="ml-2 font-semibold text-orange-500 hover:text-orange-400 hover:underline">Ver empresas</a>
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
