<div>


    <div class="py-1">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">

                <div class="col-span-6 ml-2 sm:col-span-4">
                    <x-jet-label class="mx-4 my-4">
                        Escoge hasta 5 categorias para tu Empresa
                    </x-jet-label>


                    {{-- {{ $editForm['categories'] }} --}}
                    {{--  {{ $categories }} --}}
                    <p>tienes {{ $contador }}  categorias escogidas</p>
                    <x-jet-danger-button wire:click="update" wire:loading.attr="disabled" wire:target="update">
                        Actualizar
                    </x-jet-danger-button>



                    <div class="grid grid-cols-1 mt-4 mb-4 ml-2 sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-1">

                        @php
                            $groups = [];
                        @endphp

                        @foreach ($categories as $category)
                            @php
                                $firstLetter = mb_strtoupper(mb_substr($category->name, 0, 1));
                                if ($firstLetter === 'Á') {
                                    $firstLetter = 'A';
                                }

                                if (!isset($groups[$firstLetter])) {
                                    $groups[$firstLetter] = [];
                                }
                                $groups[$firstLetter][] = $category;
                            @endphp
                        @endforeach

                        @foreach ($groups as $letter => $group)
                            <hr class="mt-2"> <!-- Agregar la línea divisoria -->
                            <h2>{{ $letter }}</h2> <!-- Mostrar la letra actual -->
                            <hr class="mb-2"> <!-- Agregar la línea divisoria -->
                            @foreach ($group as $category)
                                <x-jet-label>
                                    <x-jet-checkbox wire:model.defer="editForm.categories" wire:click="contadores"
                                        name="categories[]" value="{{ $category->id }}" />
                                    {{ $category->name }}
                                </x-jet-label>
                            @endforeach
                        @endforeach



                    </div>
                    <x-jet-input-error for="categories" />


                </div>


            </div>
        </div>
    </div>




</div>
