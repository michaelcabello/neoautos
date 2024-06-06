<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{--  <title>{{ config('app.name', 'laravel') }}</title> --}}

    <title>@yield('title', 'TICOM el Portal Empresarial')</title>

    <META name="title" content="@yield('meta-title', 'Diseño de Páginas web, Desarrollo de páginas web') ">
    <META charset="utf-8" name="description" content="@yield('meta-description', 'Este es el Blog de TICOM')">
    <META name="keywords" content="@yield('keywords', 'Diseño de Páginas web, Desarrollo de páginas web')">

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="/css/style2.css">


    {{-- FlexSlider --}}
    <link rel="stylesheet" href="{{ asset('vendor/FlexSlider/flexslider.css') }}">

    {{-- <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" /> --}}

    {{--  <script src="https://cdn.ckeditor.com/ckeditor5/28.0.0/classic/ckeditor.js"></script> --}}

    @stack('css')

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('css/style.css') }}"> --}}
    <link rel="icon" href="{{ asset('img/ticom.ico') }}">

    @livewireStyles

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>



    {{-- jquery --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    {{-- FlexSlider --}}
    <script src="{{ asset('vendor/FlexSlider/jquery.flexslider-min.js') }}"></script>



    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="font-sans antialiased">

    <x-jet-banner />

    <div class="min-h-screen bg-white">
        {{-- @livewire('navigation-menu') --}}

        {{-- @livewire('navigation-menupersonal', ['items' => $items]) --}}

       {{--  @if (isset($items)) --}}
            @livewire('navigation-menupersonal')
   {{--      @endif --}}

        <!-- Page Heading -->
        @if (isset($header))
            <header class="mt-4 bg-white shadow">
                <div class="px-4 py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif


        @if (session()->has('flash'))
            <div class="flex items-center px-4 py-3 text-sm font-bold text-white bg-blue-500" role="alert">
                <svg class="w-4 h-4 mr-2 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <path
                        d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z" />
                </svg>
                <p>{{ session('flash') }}</p>
            </div>
        @endif

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>

        <footer class="mt-6 text-center bg-blue-900">
            <hr>
            <h3 class="p-2 text-white"></h3>
        </footer>
    </div>

    @stack('modals')

    @livewireScripts
    @stack('scripts')

    <script>
        livewire.on('alert', function(message) {
            Swal.fire(
                ' EL PORTAL DE AUTOS  ',
                message,
                'success'
            )
        })
    </script>

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="/js/script.js"></script>


</body>

</html>
