<div>


        <x-jet-danger-button wire:click="$set('open',true)">
            Crear Nuevo Aviso
        </x-jet-danger-button>


        <x-jet-dialog-modal wire:model="open">

            <x-slot name="title">
                Crear Nuevo Aviso
            </x-slot>

            <x-slot name="content">

               {{--    {{ $content }} --}}

               {{-- <x-jet-label value="Escoja si es Producto o Servicio" />
                <div class="flex mb-4">

                    <label class="mr-6">
                        <input wire:model.defer="tipo" type="radio" name="tipo" value="1">
                        Producto
                    </label>
                    <label class="ml-6">
                        <input wire:model.defer="tipo" type="radio" name="tipo" value="2">
                        Servicio
                    </label>
                </div> --}}


                <div>
                    <x-jet-label value="Ingrese el Titulo del Aviso" />
                    {{-- <x-jet-input type="text" class="w-full" wire:model.defer="title" /> --}}
                    {{-- quita defer para probar el mensaje automatico en title para qiue salga mensaje cuando se pasa de 10 caracteres--}}
                    <x-jet-input type="text" class="w-full" wire:model="name" />
                    <x-jet-input-error for="name"/>

                </div>


            </x-slot>

            <x-slot name="footer">
                <x-jet-secondary-button wire:click="$set('open', false)">
                    Cancelar
                </x-jet-secondary-button>

                <x-jet-danger-button wire:click="save" wire:loading.attr="disabled" wire:target="save" class="disabled:opacity-25">
                    Guardar el Aviso
                </x-jet-danger-button>
                <!--   <span wire:loading wire:target="save">Cargando ..</span> -->
            </x-slot>

        </x-jet-dialog-modal>




</div>
