<div>
    @php
    $nav_links = [
        [
            'name' => 'Inicio',
            'route' => route('home'),
            'active' => request()->routeIs('home'),
        ],
        [
            'name' => 'Categorias',
            'route' => route('showcategories'),
            'active' => request()->routeIs('showcategories'),
        ],
        [
            'name' => 'Productos',
            'route' => route('listproducts'),
            'active' => request()->routeIs('listproducts'),
        ],
        [
            'name' => 'Empresas',
            'route' => route('listbusiness'),
            'active' => request()->routeIs('listbusiness'),
        ],
    ];
@endphp


<nav x-data="{ open: false }" class="z-50 bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="z-50 px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">

                <div class="flex items-center shrink-0">
                    <a href="{{ route('home') }}">
                        <x-jet-application-mark class="block w-auto h-9" />
                    </a>
                </div>


                <div class="z-50 hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-jet-nav-link href="{{ route('home') }}" :active="request()->routeIs('home')">
                        {{ __('Inicio') }}
                    </x-jet-nav-link>

                    <div class="relative top-5" x-data="{ open: false }">
                        <x-jet-nav-link @click="open = !open" href="#">
                            {{ __('Nuevos') }}
                        </x-jet-nav-link>

                        <div class="absolute left-0 w-32 mt-2 bg-white rounded-md shadow-lg top-12" x-show="open"
                            @click.away="open = false">
                            @foreach ($items as $item )
                            <x-jet-dropdown-link href="{{ route('listproductsnuevos', $item) }}">
                                {{ $item->name }}
                            </x-jet-dropdown-link>
                            @endforeach
                        </div>
                    </div>


                    <div class="relative top-5" x-data="{ open: false }">
                        <x-jet-nav-link @click="open = !open" href="#">
                            {{ __('Usados') }}
                        </x-jet-nav-link>

                        <div class="absolute left-0 w-32 mt-2 bg-white rounded-md shadow-lg top-12" x-show="open"
                            @click.away="open = false">

                            @foreach ($items as $item )
                            <x-jet-dropdown-link href="{{ route('listproductsusados', $item) }}">
                                {{ $item->name }}
                            </x-jet-dropdown-link>
                            @endforeach


                        </div>
                    </div>

                    <x-jet-nav-link href="{{ route('home') }}" :active="request()->routeIs('home')">
                        {{ __('Servicios') }}
                    </x-jet-nav-link>

                    <x-jet-nav-link href="{{ route('home') }}" :active="request()->routeIs('home')">
                        {{ __('Noticias') }}
                    </x-jet-nav-link>

                </div>



                {{-- @foreach ($nav_links as $nav_link)
                    <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                        <x-jet-nav-link href="{{ $nav_link['route'] }}" :active="$nav_link['active']">
                            {{ $nav_link['name'] }}
                        </x-jet-nav-link>
                    </div>
                @endforeach --}}



            </div>

            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <!-- Teams Dropdown -->
                @auth
                    @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                        <div class="relative ml-3">
                            <x-jet-dropdown align="right" width="60">
                                <x-slot name="trigger">
                                    <span class="inline-flex rounded-md">
                                        <button type="button"
                                            class="inline-flex items-center px-3 py-2 text-sm font-medium leading-4 text-gray-500 transition bg-white border border-transparent rounded-md hover:bg-gray-50 hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50">
                                            {{ Auth::user()->currentTeam->name }}

                                            <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                    </span>
                                </x-slot>

                                <x-slot name="content">
                                    <div class="w-60">
                                        <!-- Team Management -->
                                        <div class="block px-4 py-2 text-xs text-gray-400">
                                            {{ __('Manage Team') }}
                                        </div>

                                        <!-- Team Settings -->
                                        <x-jet-dropdown-link
                                            href="{{ route('teams.show', Auth::user()->currentTeam->id) }}">
                                            {{ __('Team Settings') }}
                                        </x-jet-dropdown-link>

                                        @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                                            <x-jet-dropdown-link href="{{ route('teams.create') }}">
                                                {{ __('Create New Team') }}
                                            </x-jet-dropdown-link>
                                        @endcan

                                        <div class="border-t border-gray-100"></div>

                                        <!-- Team Switcher -->
                                        <div class="block px-4 py-2 text-xs text-gray-400">
                                            {{ __('Switch Teams') }}
                                        </div>

                                        @foreach (Auth::user()->allTeams() as $team)
                                            <x-jet-switchable-team :team="$team" />
                                        @endforeach
                                    </div>
                                </x-slot>
                            </x-jet-dropdown>
                        </div>
                    @endif
                @endauth
                <!-- Settings Dropdown -->

                <div class="relative ml-3">
                    @auth
                        <x-jet-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                    <button
                                        class="flex text-sm transition border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300">
                                        <img class="object-cover w-8 h-8 rounded-full"
                                            src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                    </button>
                                @else
                                    <span class="inline-flex rounded-md">
                                        <button type="button"
                                            class="inline-flex items-center px-3 py-2 text-sm font-medium leading-4 text-gray-500 transition bg-white border border-transparent rounded-md hover:text-gray-700 focus:outline-none">
                                            {{ Auth::user()->name }}

                                            <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                    </span>
                                @endif
                            </x-slot>

                            <x-slot name="content">
                                <!-- Account Management -->
                                <div class="block px-4 py-2 text-xs text-gray-400">
                                    {{ __('Manage Account') }}
                                </div>

                                @role('admin')
                                    <x-jet-dropdown-link href="{{ route('admin.categories.index') }}">
                                        {{ __('Adminsitrador') }}
                                    </x-jet-dropdown-link>
                                @endrole

                                <x-jet-dropdown-link href="{{ route('showproductos') }}">
                                    {{ __('Mis Avisos') }}
                                </x-jet-dropdown-link>


                                <x-jet-dropdown-link href="{{ route('miempresa') }}">
                                    {{ __('Mi Empresa') }}
                                </x-jet-dropdown-link>

                                <x-jet-dropdown-link href="{{ route('miempresa.logo.edit', Auth::user()) }}">
                                    {{ __('Mi Logo') }}
                                </x-jet-dropdown-link>

                                <x-jet-dropdown-link href="{{ route('sliderclientes.index') }}">
                                    {{ __('Mi Slider') }}
                                </x-jet-dropdown-link>

                                <x-jet-dropdown-link href="{{ route('profile.show') }}">
                                    {{ __('Mis Datos') }}
                                </x-jet-dropdown-link>

                                <x-jet-dropdown-link href="{{ route('miscategorias') }}">
                                    {{ __('Mis Categorias1') }}
                                </x-jet-dropdown-link>

                                <x-jet-dropdown-link href="{{ route('showpedidos') }}">
                                    {{ __('Mis Pedidos') }}
                                </x-jet-dropdown-link>


                                {{-- lo comentamos porque generar error al pasar parametros luego de la suscripcion --}}
                                {{-- <x-jet-dropdown-link href="{{ route('miscategoriasa', Auth::user()) }}">
                            {{ __('Mis Categorias2') }}
                        </x-jet-dropdown-link> --}}

                                @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                    <x-jet-dropdown-link href="{{ route('api-tokens.index') }}">
                                        {{ __('API Tokens') }}
                                    </x-jet-dropdown-link>
                                @endif

                                <div class="border-t border-gray-100"></div>

                                <!-- Authentication -->
                                <form method="POST" action="{{ route('logout') }}" x-data>
                                    @csrf

                                    <x-jet-dropdown-link href="{{ route('logout') }}" @click.prevent="$root.submit();">
                                        {{ __('Log Out') }}
                                    </x-jet-dropdown-link>
                                </form>
                            </x-slot>
                        </x-jet-dropdown>
                    @else
                        <div class="hidden space-x-4 divide-x-2 sm:-my-px sm:ml-10 sm:flex">

                            <div>
                                <a href="{{ route('login') }}" class="text-sm text-red-700 underline ">Ingresar</a>
                            </div>
                            <div>
                                <a href="{{ route('register') }}"
                                    class="ml-3 text-sm text-red-700 underline">Regístrate</a>
                            </div>

                        </div>
                    @endauth

                </div>
            </div>

            <!-- Hamburger -->
            <div class="flex items-center -mr-2 sm:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 text-gray-400 transition rounded-md hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500">
                    <svg class="w-6 h-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">




            @foreach ($nav_links as $nav_link)
                <x-jet-responsive-nav-link href="{{ $nav_link['route'] }}" :active="$nav_link['active']">
                    {{ $nav_link['name'] }}
                </x-jet-responsive-nav-link>
            @endforeach


        </div>




        <!-- Responsive Settings Options -->
        @auth
            <div class="pt-4 pb-1 border-t border-gray-200">
                <div class="flex items-center px-4">
                    @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                        <div class="mr-3 shrink-0">
                            <img class="object-cover w-10 h-10 rounded-full" src="{{ Auth::user()->profile_photo_url }}"
                                alt="{{ Auth::user()->name }}" />
                        </div>
                    @endif

                    <div>
                        <div class="text-base font-medium text-gray-800">{{ Auth::user()->name }}</div>
                        <div class="text-sm font-medium text-gray-500">{{ Auth::user()->email }}</div>
                    </div>
                </div>

                <div class="mt-3 space-y-1">
                    <!-- Account Management -->
                    <x-jet-responsive-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
                        {{ __('Profile') }}
                    </x-jet-responsive-nav-link>

                    @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                        <x-jet-responsive-nav-link href="{{ route('api-tokens.index') }}" :active="request()->routeIs('api-tokens.index')">
                            {{ __('API Tokens') }}
                        </x-jet-responsive-nav-link>
                    @endif

                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}" x-data>
                        @csrf

                        <x-jet-responsive-nav-link href="{{ route('logout') }}" @click.prevent="$root.submit();">
                            {{ __('Log Out') }}
                        </x-jet-responsive-nav-link>
                    </form>

                    <!-- Team Management -->
                    @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                        <div class="border-t border-gray-200"></div>

                        <div class="block px-4 py-2 text-xs text-gray-400">
                            {{ __('administrador de equipos') }}
                        </div>

                        <!-- Team Settings -->
                        <x-jet-responsive-nav-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}"
                            :active="request()->routeIs('teams.show')">
                            {{ __('Team Settings') }}
                        </x-jet-responsive-nav-link>

                        @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                            <x-jet-responsive-nav-link href="{{ route('teams.create') }}" :active="request()->routeIs('teams.create')">
                                {{ __('Create New Team') }}
                            </x-jet-responsive-nav-link>
                        @endcan

                        <div class="border-t border-gray-200"></div>

                        <!-- Team Switcher -->
                        <div class="block px-4 py-2 text-xs text-gray-400">
                            {{ __('Switch Teams') }}
                        </div>

                        @foreach (Auth::user()->allTeams() as $team)
                            <x-jet-switchable-team :team="$team" component="jet-responsive-nav-link" />
                        @endforeach
                    @endif
                </div>
            </div>
        @else
            <div class="border-t border-gray-200">
                <x-jet-nav-link href="{{ route('login') }}" :active="request()->routeIs('login')">
                    Ingresar
                </x-jet-nav-link>

                <a href="">bbbbb</a>
                <a href="">ccccc</a>


                <x-jet-responsive-nav-link href="{{ route('register') }}" :active="request()->routeIs('register')">
                    Regístrate
                </x-jet-responsive-nav-link>

            </div>
        @endauth
    </div>
</nav>

</div>
