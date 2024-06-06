
    <div class="max-w-screen-xl mx-auto">
        <div class="flex justify-between py-2 border-b items-betwen">
            <a href=""><i class="ml-3 fa-solid fa-envelope" style="color:#0c0455;"></i> <span class="text-xl"> {{ $busine->email }} </span></a>
            @if($busine->phone)
            <a href=""><i class="fa-solid fa-phone" style="color:#0c0455;"></i> <span class="text-xl"> {{ $busine->phone }} </span></a>
            @endif

            <div>
                @if($busine->whatsapp)
                <a href=""><i class="fa-brands fa-whatsapp fa-2x" style="color:#08833f;"></i></a>
                @endif

                @if($busine->facebook)
                <a href="{{ $busine->facebook }}"><i class="fa-brands fa-facebook fa-2x" style="color:#0c0455;"></i></a>
                @endif
                @if($busine->youtube)
                <a href=""><i class="fa-brands fa-youtube fa-2x" style="color:#ff0909;"></i></a>
                @endif
                @if($busine->twitter)
                <a href=""><i class="fa-brands fa-twitter fa-2x" style="color:#09b1ff;"></i></a>
                @endif

                @if($busine->instagram)
                <a href=""><i class="fa-brands fa-instagram fa-2x" style="color:#ffb109;"></i></a>
                @endif
            </div>

        </div>

        <div class="flex items-center justify-center py-2 border-b">
            {{-- <a href="">Email: aa@aaa.com</a>
            <a href="">Telf: 2665470</a>
            <a href="">wathsapp: 996958745</a> --}}
            @if($busine->logo)
                <a href="#" class="px-2 lg:px-0">
                    <img src="{{ Storage::disk("s3")->url($busine->logo) }}" alt="{{ $busine->razonsocial }}" class="h-30 w-60" />
                </a>
            @else
                <h1>{{ $busine->razonsocial }}</h1>
            @endif

         {{--    <a href="">Facebook</a>
            <a href="">Youtube</a>
            <a href="">Twiteer</a> --}}
        </div>

        <div class="flex items-center justify-center py-2 mb-3 border-b">
            <ul class="inline-flex items-center">

                <li class="px-2 md:px-4 {{ request()->routeIs('inicioempresa') ? 'active':''}}">
                    {{-- <a href="{{ route('showempresa', $busine ) }}"  class="font-semibold text-purple-600 hover:text-purple-500"> Inicio </a> --}}
                    <x-jet-nav-link href="{{ route('inicioempresa', $busine) }}" :active="request()->routeIs('inicioempresa')">
                        {{ __('Inicio') }}
                    </x-jet-nav-link>
                </li>
                <li class="px-2 md:px-4 {{ request()->routeIs('aboutempresa') ? 'active':''}}">
                    {{-- <a href="{{ route('aboutempresa', $busine ) }}" class="font-semibold text-gray-500 hover:text-purple-500"> Nosotros</a> --}}
                    <x-jet-nav-link href="{{ route('aboutempresa', $busine) }}" :active="request()->routeIs('aboutempresa')">
                        {{ __('Nosotros') }}
                    </x-jet-nav-link>
                </li>
                <li class="px-2 md:px-4 active:text-indigo-600">
                    {{-- <a href="{{ route('showempresa', $busine ) }}" class="font-semibold text-gray-500 hover:text-purple-500"> Productos </a> --}}
                    <x-jet-nav-link href="{{ route('showempresa', $busine) }}" :active="request()->routeIs('showempresa')">
                        {{ __('Productos') }}
                    </x-jet-nav-link>
                </li>
                <li class="px-2 md:px-4 :active=request()->routeIs('contactempresa') ? text-red-600 ">
                    {{-- <a href="{{ route('contactempresa', $busine ) }}" class="font-semibold text-gray-500 hover:text-purple-500"> Contáctenos </a> --}}
                    <x-jet-nav-link href="{{ route('contactempresa', $busine) }}" :active="request()->routeIs('contactempresa')">
                        {{ __('Contáctenos') }}
                    </x-jet-nav-link>
                </li>

            </ul>

        </div>


    </div>
