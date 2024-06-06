<div>

    <div class="py-1">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">




{{-- comentando esta parte porque genera magen con nombres aleatorios  --}}

{{--                      <div class="mt-4 mb-4 ml-4">
                        <x-jet-label value="Logo de tu Empresa" />
                        <input type="file" name="logo" wire:model="logo" id="{{ $identificador }}">
                        <x-jet-input-error for="logo" />
                    </div>


                   <div wire:loading wire:target="logo"
                        class="relative px-4 py-3 text-red-700 bg-red-100 border border-red-400 rounded" role="alert">
                        <strong class="font-bold">Cargando imagen!</strong>
                        <span class="block sm:inline">Espere un momento.</span>

                    </div>

                     @if ($logo)
                        <img class="w-40 mb-4 ml-4" src="{{ $logo->temporaryUrl() }}" alt="{{ $empresa->razonsocial }}">
                    @elseif($empresa->logo)

                        <img class="w-40 mb-4 ml-4" src="{{ Storage::disk("s3")->url($empresa->logo) }}" alt="{{ $empresa->razonsocial }}">
                    @endif --}}






                    <div class="grid px-4 py-4 mb-2 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-x-1">

                        <div class="px-4">
                            <x-jet-label value="Razón Social" />
                            <x-jet-input type="text"
                                        class="w-full capitalize"
                                        wire:model="razonsocial"
                                        placeholder="Ingrese la Razón Social de tu Empresa " />
                            <x-jet-input-error for="razonsocial" />

                        </div>

                        <input type="hidden" wire:model="slug">


                        <div class="px-4">
                            <x-jet-label value="Facebook" />
                            <x-jet-input type="text"
                                        class="w-full"
                                        wire:model="facebook"
                                        placeholder="Ingrese Facebook de tu Empresa " />
                            <x-jet-input-error for="facebook" />

                        </div>


                    </div>


                    <div class="grid px-4 py-1 mb-2 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-x-1">

                        <div class="px-4">
                            <x-jet-label value="Youtube formato inicia con https://" />
                            <x-jet-input type="text"
                                        class="w-full"
                                        wire:model="youtube"
                                        placeholder="Ingrese Youtube de tu Empresa " />
                            <x-jet-input-error for="youtube" />

                        </div>

                        <div class="px-4 ">
                            <x-jet-label value="Twitter formato inicia con https://" />
                            <x-jet-input type="text"
                                        class="w-full"
                                        wire:model="twitter"
                                        placeholder="Ingrese Twitter de tu Empresa " />
                            <x-jet-input-error for="twitter" />

                        </div>

                    </div>


                    <div class="grid px-4 py-1 mb-2 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-x-1">


                        <div class="px-4 py-2 ">
                            <x-jet-label value="instagram formato inicia con https://" />
                            <x-jet-input type="text"
                                        class="w-full"
                                        wire:model="instagram"
                                        placeholder="Ingrese instagram de tu Empresa " />
                            <x-jet-input-error for="instagram" />

                        </div>

                        <div class="px-4 py-2 ">
                            <x-jet-label value="web formato inicia con http://" />
                            <x-jet-input type="text"
                                        class="w-full"
                                        wire:model="web"
                                        placeholder="Ingrese Web de tu Empresa " />
                            <x-jet-input-error for="web" />

                        </div>

                        <div class="px-4 py-2 ">
                            <x-jet-label value="Email2" />
                            <x-jet-input type="text"
                                        class="w-full"
                                        wire:model="email2"
                                        placeholder="Ingrese Email de tu Empresa " />
                            <x-jet-input-error for="email2" />

                        </div>



                    </div>






                    {{-- <div class="px-4 py-2 mb-2">
                        <x-jet-label value="Slug" />
                        <x-jet-input type="text"
                            disabled
                            wire:model="slug"
                            class="w-full bg-gray-200"
                            placeholder="Ingrese el slug de productos" />

                         <x-jet-input-error for="slug" />
                    </div> --}}


                    <div class="grid px-4 py-1 mb-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-4 gap-x-1">

                        <div >
                            <x-jet-label value="RUC" />
                            <x-jet-input type="text" class="w-full"
                                wire:model="ruc"
                                placeholder="RUC" />
                            <x-jet-input-error for="ruc" />
                        </div>

                        <div >
                            <x-jet-label value="Teléfono" />
                            <x-jet-input type="text" class="w-full"
                                wire:model="phone"
                                placeholder="phone" />
                            <x-jet-input-error for="Teléfono" />
                        </div>
                        <div >
                            <x-jet-label value="Celular" />
                            <x-jet-input type="text" class="w-full"
                                wire:model="movil"
                                placeholder="Celular" />
                            <x-jet-input-error for="movil" />
                        </div>

                        <div >
                            <x-jet-label value="whatsapp" />
                            <x-jet-input type="text" class="w-full"
                                wire:model="whatsapp"
                                placeholder="whatsapp" />
                            <x-jet-input-error for="whatsapp" />
                        </div>



{{--                         <div >
                            <x-jet-label value="RUC" />
                            <x-jet-input type="text" class="w-full capitalize"
                                wire:model="ruc"
                                placeholder="RUC" />
                            <x-jet-input-error for="ruc" />
                        </div>

                        <div >
                            <x-jet-label value="RUC" />
                            <x-jet-input type="text" class="w-full capitalize"
                                wire:model="ruc"
                                placeholder="RUC" />
                            <x-jet-input-error for="ruc" />
                        </div> --}}


                    </div>





                        {{-- Nosotros --}}
                    <div class="mx-4 mb-4">
                        <div wire:ignore>
                            <x-jet-label value="Nosotros" />
                            <textarea rows="8" class="w-full form-control"
                                wire:model="aboutus"
                                x-data
                                x-init="ClassicEditor.create($refs.miEditor)
                                .then(function(editor){
                                    editor.model.document.on('change:data', () => {
                                        @this.set('aboutus', editor.getData())
                                    })
                                })
                                .catch( error => {
                                    console.error( error );
                                } );"

                                x-ref="miEditor"
                                >
                            </textarea>
                        </div>
                        <x-jet-input-error for="aboutus" />
                    </div>


                        {{-- Vision --}}
                    <div class="mx-4 mb-4">
                            <div wire:ignore>
                                <x-jet-label value="Visión" />
                                <textarea rows="8" class="w-full form-control"
                                    wire:model="vision"
                                    x-data
                                    x-init="ClassicEditor.create($refs.miEditor)
                                    .then(function(editor){
                                        editor.model.document.on('change:data', () => {
                                            @this.set('vision', editor.getData())
                                        })
                                    })
                                    .catch( error => {
                                        console.error( error );
                                    } );"

                                    x-ref="miEditor"
                                    >
                                </textarea>
                            </div>
                            <x-jet-input-error for="vision" />
                    </div>


                        {{-- Mision --}}
                    <div class="mx-4 mb-4">
                            <div wire:ignore>
                                <x-jet-label value="Misión" />
                                <textarea rows="8" class="w-full form-control"
                                    wire:model="mission"
                                    x-data
                                    x-init="ClassicEditor.create($refs.miEditor)
                                    .then(function(editor){
                                        editor.model.document.on('change:data', () => {
                                            @this.set('mission', editor.getData())
                                        })
                                    })
                                    .catch( error => {
                                        console.error( error );
                                    } );"

                                    x-ref="miEditor"
                                    >
                                </textarea>
                            </div>
                            <x-jet-input-error for="mission" />
                    </div>




                    <div class="px-4 py-4">
                        <x-jet-label value="Dirección" />
                        <x-jet-input type="text"
                                    class="w-full capitalize"
                                    wire:model="address"
                                    placeholder="Ingrese la Dirección de tu Empresa " />
                        <x-jet-input-error for="address" />

                    </div>


                    <div class="grid px-4 sm:grid-cols-3 md:grid-cols-3 lg:grid-cols-3 gap-x-6">
                            {{-- Departamentos --}}
                            <div>
                                <x-jet-label value="Departamento" />

                                <select class="w-full form-control" wire:model="departamento_id">

                                    <option value="" selected>Seleccione un Departamento</option>

                                    @foreach ($departamentos as $department)
                                        <option value="{{$department->id}}">{{$department->name}}</option>
                                    @endforeach
                                </select>

                                <x-jet-input-error for="departamento_id" />
                            </div>

                            {{-- Provincia --}}
                            <div>
                                <x-jet-label value="Provincia" />

                                <select class="w-full form-control" wire:model="provincia_id">

                                    <option value="" disabled selected>Seleccione una Provincia</option>

                                    @foreach ($provincias as $provincia)
                                        <option value="{{$provincia->id}}">{{$provincia->name}}</option>
                                    @endforeach
                                </select>

                                <x-jet-input-error for="provincia_id" />
                            </div>


                            {{-- Distritos --}}
                            <div>
                                <x-jet-label value="Distrito" />

                                <select class="w-full form-control" wire:model="distrito_id">

                                    <option value="" disabled selected>Seleccione un distrito</option>

                                    @foreach ($distritos as $distrito)
                                        <option value="{{$distrito->id}}">{{$distrito->name}}</option>
                                    @endforeach
                                </select>

                                <x-jet-input-error for="distrito_id" />
                            </div>

                    </div>

                    <div class="px-4 py-4 mb-2 ">
                        <x-jet-label value="Mapa Google" />
                        <textarea  class="w-full border-gray-300 rounded-md shadow-sm form-control focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        rows="3" wire:model="coordenadas">
                        </textarea>


                    </div>


                    <div class="px-4 py-4">
                        <x-jet-label value="Title de Google" />
                        <x-jet-input type="text"
                                    class="w-full capitalize"
                                    wire:model="title"
                                    placeholder="Ingrese title para Google " />
                        <x-jet-input-error for="title" />

                    </div>

                    <div class="px-4 py-4 mb-2 ">
                        <x-jet-label value="Description para Google" />
                        <textarea  class="w-full border-gray-300 rounded-md shadow-sm form-control focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        rows="3" wire:model="description">
                        </textarea>
                        <x-jet-input-error for="description" />
                    </div>

                    <div class="px-4 py-4">
                        <x-jet-label value="Keywords, palabras claves de Google" />
                        <x-jet-input type="text"
                                    class="w-full capitalize"
                                    wire:model="keywords"
                                    placeholder="Ingrese palabras claves para Google " />
                        <x-jet-input-error for="keywords" />

                    </div>



                    <x-jet-section-border />


                    <x-jet-danger-button  wire:click="save" wire:loading.attr="disabled" wire:target="save" class="mb-2 ml-2 disabled:opacity-25">
                        Guardar Datos de mi empresa
                    </x-jet-danger-button>


                </div>
        </div>
    </div>

    {{--<script>

            document.addEventListener('livewire:load', function(){
                $('.select2').select2();
                $('.select2').on('change', function(){
                     @this.set('categoriess', this.value);
                    /*@this.set('categoriess', $(this).value());*/
                })
            })

        </script> --}}




    @push('css')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.css"
    integrity="sha512-jU/7UFiaW5UBGODEopEqnbIAHOI8fO6T99m7Tsmqs2gkdujByJfkCbbfPSN4Wlqlb9TGnsuC0YgUgWkRBK7B9A=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />



    @endpush

    @push('scripts')
        <script src="https://cdn.ckeditor.com/ckeditor5/28.0.0/classic/ckeditor.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.js"
        integrity="sha512-oQq8uth41D+gIH/NJvSJvVB85MFk1eWpMK6glnkg6I7EdMqC1XVkW7RxLheXwmFdG03qScCM7gKS/Cx3FYt7Tg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>


        <script>

            Dropzone.options.myAwesomeDropzone = {
                headers:{
                    'X-CSRF-TOKEN' : "{{csrf_token()}}"
                },
                //paramName: "file",
                maxFilesize: 2,
                dictDefaultMessage: "Click aqui para subir el Logo de tu Empresa o arrastre tu Logo aquí",
                acceptedFiles:"image/*",

            };
        </script>
    @endpush





</div>
