<div>
    <x-slot name="header">
        <div class="flex items-center">
            <h2 class="text-xl font-semibold leading-tight text-gray-600">
                Editando la categoria
            </h2>


        </div>
    </x-slot>


    <div class="container py-12 mx-auto">

        <x-table-responsive>
            {{-- Categoria --}}
            <div class="px-4 py-1 mb-2 ">
                <x-jet-label value="Categoria" />
                <x-jet-input type="text" 
                            class="w-full capitalize"
                            wire:model="name"
                            placeholder="Ingrese la Categoria " />
                <x-jet-input-error for="name" />
            </div>


             {{-- Slug --}}
            <div class="px-4 py-1 mb-2">
                <x-jet-label value="Slug" />
                <x-jet-input type="text"
                    disabled
                    wire:model="slug"
                    class="w-full bg-gray-200" 
                    placeholder="Ingrese el slug de la categoria" />

            <x-jet-input-error for="slug" />
            </div>


            
            {{-- Short Descrición --}}
            <div class="px-4 py-1 mb-2">
                <div wire:ignore>
                    <x-jet-label value="Descripción corta" />
                    <textarea class="w-full border-gray-300 rounded-md shadow-sm form-control focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" rows="4"
                        wire:model="shortdescription">
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
                    <x-jet-input type="number" 
                                wire:model="order"
                                placeholder="Ingrese el order " />
                    <x-jet-input-error for="order" />
                </div>


    

                <div class="px-6 py-4 text-sm font-medium whitespace-nowrap">
                    <x-jet-label value="Estado" />               
                    <label>
                        {{-- <input value="1" type="radio" name="state" checked> --}}
                        {{-- <x-jet-input type="radio" value="1" name="state" wire:model="state" checked/>  --}}

                       
                        
                        <input type="radio" wire:model= "state" name="state" value="1" >
                        Activado
                    </label>

                    <label class="ml-2">
                     
                            <input  type="radio" wire:model= "state" name="state" value="0">
                            Desactivado
                
                    </label>
                </div>
            </div>

            <div class="px-4 py-1 mb-2">
            <div class="border border-indigo-600">
                <div class="px-4 py-1 mb-2">
                    <x-jet-label value="Title (maximo 50 caracteres)" />
                    <x-jet-input type="text" 
                                class="w-full"
                                wire:model="title"
                                placeholder="Title para Google " />
                    <x-jet-input-error for="title" />
                </div>


                {{-- Description de Google --}}
                <div class="px-4 py-1 mb-2">
                    <div wire:ignore>
                        <x-jet-label value="Description para Google" />
                        <textarea class="w-full border-gray-300 rounded-md shadow-sm form-control focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" rows="6"
                            wire:model="description">
                        </textarea>
                    </div>
                    <x-jet-input-error for="description" />
                </div>

                <div class="px-4 py-1 mb-2">
                    <x-jet-label value="Palabras claves" />
                    <x-jet-input type="text" 
                                class="w-full"
                                wire:model="keywords"
                                placeholder="Palabras claves para Google " />
                    <x-jet-input-error for="keywords" />
                </div>
            </div>
            </div>

            <div class="px-4 py-1 mb-2">
                <input type="file" wire:model="image" id="{{$identificador}}">
                <x-jet-input-error for="image"/>
            </div>

            <div wire:loading wire:target="image" class="relative px-4 py-3 text-red-700 bg-red-100 border border-red-400 rounded" role="alert">
                <strong class="font-bold">Cargando imagenn!</strong>
                <span class="block sm:inline">Espero un momento.</span>
            </div>

            @if($image)
                <img class="mb-4" src="{{$image->temporaryUrl()}}" alt="">
                src="{{ Storage::disk("s3")->url($category->image) }}" alt="">
            @else
                <img src="{{ Storage::disk("s3")->url($category->image) }}" alt="">    
            @endif





            <div class="px-4 py-4 mb-2">

                <a href="{{ route('admin.categories.index')}}" class="inline-flex items-center justify-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase transition bg-green-600 border border-transparent rounded-md hover:bg-green-500 focus:border-green-700 focus:ring focus:ring-green-200 active:bg-green-600 disabled:opacity-25">
                    Cancelar
                </a>





                <x-jet-danger-button wire:click="save" wire:loading.attr="disabled" wire:target="save, image" class="disabled:opacity-25">
                    Editar Categoria
                </x-jet-danger-button>

   
            </div>


        </x-table-responsive>
        
    </div>



</div>
