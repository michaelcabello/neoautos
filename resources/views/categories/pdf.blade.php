<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lista de categorias</title>


    <style>
        body {
          background-image: url('img/banerticom.jpg');
        }
    </style>
</head>




<body>


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

                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">

                    @foreach ($categories as $category)

                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 w-10 h-10">
                                        @if ($category->image)
                                            <img width="100px" class="object-cover w-10 h-10 rounded-full"
                                                src="{{ Storage::url($category->image) }}" alt="">
                                        @else
                                            <img width="100px" class="object-cover w-10 h-10 rounded-full"
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



                        </tr>

                    @endforeach
                    <!-- More people... -->
                </tbody>
            </table>

        @else
            <div class="px-6 py-4">
                No hay Categorias
            </div>
        @endif




</body>
</html>
