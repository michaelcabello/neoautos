<div>
    
    


    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Mis productos') }}
        </h2>
    </x-slot>


    <div class="py-10 mx-auto max-w-7xl sm:px-6 lg:px-8">


        <div>

            <div class="py-1">
                <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                    <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">

                        <x-table-responsive>
                            {{-- Categoria --}}
                            <div class="px-4 py-1 mb-2 ">
                                <x-jet-label value="Producto" />
                                <x-jet-input type="text" class="w-full capitalize" 
                                    wire:model="name"
                                    placeholder="Ingrese el nombre del producto" />
                                <x-jet-input-error for="name" />
                            </div>


                            {{-- Slug --}}
                            <div class="px-4 py-1 mb-2">
                                <x-jet-label value="Slug" />
                                <x-jet-input type="text" disabled wire:model="slug" class="w-full bg-gray-200"
                                    placeholder="Ingrese el slug de la categoria" />

                                <x-jet-input-error for="slug" />
                            </div>



                            {{-- Short Descrición --}}
                            <div class="px-4 py-1 mb-2">
                                <div wire:ignore>
                                    <x-jet-label value="Descripción corta" />
                                    <textarea
                                        class="w-full border-gray-300 rounded-md shadow-sm form-control focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                        rows="4" wire:model="shortdescription">
                                    </textarea>
                                </div>
                                <x-jet-input-error for="shortdescription" />
                            </div>

                            {{-- Long Descrición --}}


                            <div class="px-4 py-1 mb-2">
                                <div wire:ignore>
                                    <x-jet-label value="Descripción Larga" />
                                    <textarea class="w-full form-control" rows="4"
                                        wire:model="longdescription"
                                        x-data 
                                        x-init="ClassicEditor.create($refs.miEditor)
                                        .then(function(editor){
                                            editor.model.document.on('change:data', () => {
                                                @this.set('longdescription', editor.getData())
                                            })
                                        })
                                        .catch( error => {
                                            console.error( error );
                                        } );"
                                        x-ref="miEditor">
                                    </textarea>
                                </div>
                                <x-jet-input-error for="longdescription" />
                            </div>



                            <div class="flex">
                                <div class="px-4 py-1 mb-2">
                                    <x-jet-label value="order" />
                                    <x-jet-input type="number" wire:model="order" placeholder="Ingrese el order " />
                                    <x-jet-input-error for="order" />
                                </div>



                                <div class="px-6 py-4 text-sm font-medium whitespace-nowrap">
                                    <x-jet-label value="Estado" />
                                    <label>
                                        {{-- <input value="1" type="radio" name="state" checked> --}}
                                        <x-jet-input type="radio" value="1" name="state" wire:model="state"
                                            checked />
                                        Activado
                                    </label>

                                    <label class="ml-2">
                                        <x-jet-input type="radio" value="0" name="state" wire:model="state" />
                                        Desactivado
                                    </label>
                                </div>

                            </div>

                            <div class="px-4 py-1 mb-2">
                                <div class="border border-indigo-600">
                                    <div class="px-4 py-1 mb-2">
                                        <x-jet-label value="Title (maximo 50 caracteres)" />
                                        <x-jet-input type="text" class="w-full" wire:model="title"
                                            placeholder="Title para Google " />
                                        <x-jet-input-error for="title" />
                                    </div>


                                    {{-- Description de Google --}}
                                    <div class="px-4 py-1 mb-2">
                                        <div wire:ignore>
                                            <x-jet-label value="Description para Google" />
                                            <textarea
                                                class="w-full border-gray-300 rounded-md shadow-sm form-control focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                                rows="6" wire:model="description">
                        </textarea>
                                        </div>
                                        <x-jet-input-error for="description" />
                                    </div>

                                    <div class="px-4 py-1 mb-2">
                                        <x-jet-label value="Palabras claves" />
                                        <x-jet-input type="text" class="w-full" wire:model="keywords"
                                            placeholder="Palabras claves para Google " />
                                        <x-jet-input-error for="keywords" />
                                    </div>
                                </div>
                            </div>





                            <div class="px-4 py-4 mb-2">

                                <a href="{{ route('showproductos') }}" class="btn btn-xs btn-info">
                                    Cancelar
                                </a>

                                <x-jet-danger-button wire:click="save" wire:loading.attr="disabled"
                                    wire:target="save, image" class="disabled:opacity-25">
                                    Modificar Producto
                                </x-jet-danger-button>
                            </div>


                        </x-table-responsive>


                    </div>
                </div>
            </div>



        </div>




        @push('scripts')
            
            <script src="https://cdn.ckeditor.com/ckeditor5/28.0.0/classic/ckeditor.js"></script>
        @endpush

    </div>
    



</div>
