<div>
    <div class="grid grid-cols-1 bg-white border rounded-lg shadow-lg border-b-neutral-400">

        <div class="grid grid-cols-1 ml-4 divide-y">
            {{-- <p>Contáctese con el Vendedor</p> --}}
            <p class="my-2 text-xl text-neutral-600">Contáctese con el Vendedor</p>
        </div>

        <div class="flex-1 mt-3">
            <div class="col-span-2 px-4 py-1 mb-2 ">
                <x-jet-label value="Nombres y Apellidos" />
                <x-jet-input type="text" class="w-full capitalize"
                    wire:model="name"
                    placeholder="Ingrese nombres y apellidos" />
                <x-jet-input-error for="name" />
            </div>
        </div>

        <div class="flex-1">
            <div class="col-span-2 px-4 py-1 mb-2 ">
                <x-jet-label value="Correo" />
                <x-jet-input type="text" class="w-full"
                    wire:model="email"
                    placeholder="Ingrese el correo" />
                <x-jet-input-error for="email" />
            </div>
        </div>

        <div class="flex-1">
            <div class="col-span-2 px-4 py-1 mb-2 ">
                <x-jet-label value="Celular" />
                <x-jet-input type="text" class="w-full capitalize"
                    wire:model="movil"
                    placeholder="Ingrese el Celular" />
                <x-jet-input-error for="movil" />
            </div>
        </div>

        <div class="flex-1">
            <div class="px-4 py-1 mb-2">
                <div >
                    <x-jet-label value="Descripción " />
                    <textarea
                        class="w-full border-gray-300 rounded-md shadow-sm form-control focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        rows="3" wire:model="description">
                    </textarea>
                </div>
                <x-jet-input-error for="description" />
            </div>
        </div>

        {{--    <div class="mt-1 ml-3 mb1">
            {!! NoCaptcha::renderJs() !!}
            {!! NoCaptcha::display() !!}
        </div> --}}

        <div class="flex-1 mx-2 mb-2">
            <x-jet-danger-button class="w-full mb-2"
            wire:click="save"
            wire:loading.attr="disabled"
            wire:target="save">
                Contactar con el Anunciante
            </x-jet-danger-button>
        </div>

    </div>
</div>
