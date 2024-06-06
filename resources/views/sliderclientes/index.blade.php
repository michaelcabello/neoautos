<x-app-layout>

         <x-slot name="header">
            <div class="flex items-center">
                <h2 class="text-xl font-semibold leading-tight text-gray-600">
                    Lista de Sliders  :
                </h2>
            </div>
        </x-slot>





        <div class="py-10 mx-auto max-w-7xl sm:px-6 lg:px-8">



            <div>
                <div class="py-1">
                    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                        <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">

                        <div class="container py-6 mx-auto">

                            @if($sliders->count() <=5 )
                            <a class="inline-flex items-center justify-center px-4 py-2 mb-4 text-xs font-semibold tracking-widest text-white uppercase transition bg-red-600 border border-transparent rounded-md hover:bg-red-500 focus:outline-none focus:border-red-700 focus:ring focus:ring-red-200 active:bg-red-600 disabled:opacity-25" href="{{route('sliderclientes.create')}}" >
                                Crear Slider
                            </a>
                            @endif

                            <x-table-responsive>

                                <div class="px-2 py-1">
                                    {{-- <x-button-enlace class="ml-auto" href="{{route('products.create')}}">
                                        Agregar un Producto
                                    </x-button-enlace> --}}

                                </div>



                                @if ($sliders->count())

                                    <table class="min-w-full divide-y divide-gray-200">
                                        <thead class="bg-gray-50">
                                                <tr>

                                                <th scope="col"
                                                    class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase cursor-pointer"
                                                    >

                                                    Imagen

                                                </th>

                                                <th scope="col"
                                                    class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase cursor-pointer"
                                                    >
                                                   Título

                                                </th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase cursor-pointer"
                                                    >
                                                    Descripción

                                                </th>

                                                <th scope="col"
                                                    class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase cursor-pointer">
                                                    Orden

                                                </th>
                                                <th scope="col"
                                                class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase cursor-pointer">
                                                    Estado

                                                </th>

                                                <th scope="col"  class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase cursor-pointer">

                                                    <span class="sr-only">Opciones</span>

                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-gray-200">

                                            @foreach ($sliders as $slider)

                                                <tr>
                                                    <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">

                                                        @isset($slider->image)

                                                            <img class="w-20 mb-4 ml-4" src="{{ Storage::disk("s3")->url($slider->image) }}" alt="{{ $slider->title }}">
                                                        @else
                                                            <img class="w-20 mb-4 ml-4" src="{{ Storage::disk("s3")->url($slider->image) }}" alt="{{ $slider->title }}">
                                                        @endisset


                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        <div class="flex items-center">

                                                            <div class="ml-4">
                                                                <div class="text-sm font-medium text-gray-900">
                                                                    {{ $slider->title }}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>

                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        <div class="flex items-center">

                                                            <div class="ml-4">
                                                                <div class="text-sm font-medium text-gray-900">
                                                                    {{ Str::limit($slider->description, 20) }}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>

                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        {{ $slider->order }}

                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        @if ($slider->state == 1)
                                                         <div class='px-2 bg-green-400'> Activo</div>
                                                        @else
                                                          <button class='px-2 bg-blue-400'> desactivo</button>
                                                        @endif

                                                    </td>




                                                    <td class="px-6 py-4 text-sm font-medium text-right whitespace-nowrap">
                                                        <div class="flex">
                                                         <a href="{{route('sliderclientes.edit', $slider )}}" class="mr-2 text-indigo-600 hover:text-indigo-900 "><i class="fa-solid fa-pen-to-square btn btn-green"></i></a>
                                                         <form action="{{route('sliderclientes.destroy', $slider )}}" method= "POST" class="formulario-eliminar ">
                                                            {{csrf_field()}} {{ method_field('DELETE') }}
                                                             <button type="submit"><i class="fa-solid fa-trash-can btn btn-danger"></i></button>
                                                         </form>
                                                        </div>
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





                            </x-table-responsive>

                           {{--  @if ($sliders->hasPages())
                            <div class="px-6 py-4">
                                {{ $sliders->links() }}
                            </div>

                            @endif --}}

                        </div>


                        </div>
                    </div>
                </div>

            </div>

        </div>
        @push('scripts')

        @if(session('eliminar')=='ok')
            <script>
                Swal.fire(
                        'Eliminado!',
                        'El Registro fue Eliminado.',
                        'satisfactoriamente'
                )
            </script>
        @endif



        <script>
            $('.formulario-eliminar').submit(function(e){
                e.preventDefault();

                Swal.fire({
                    title: 'Esta Seguro?',
                    text: "Este registro se eliminará definitivamente!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si, Eliminar Ahora!'
                    }).then((result) => {
                    if (result.isConfirmed) {
                         /* Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'

                        ) */
                        this.submit();
                    }
                    })
            })
        </script>
        @endpush

    </x-app-layout>
