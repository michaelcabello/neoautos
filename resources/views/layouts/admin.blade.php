<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">


        <title>@yield('titleok')</title>

        <META name="title" content="@yield('meta-title','Diseño de Páginas web, Desarrollo de páginas web') ">
        <META charset="utf-8" name="description" content="@yield('meta-description','Este es el Blog de TICOM')">
        <META name="keywords" content="@yield('keywords','Diseño de Páginas web, Desarrollo de páginas web')">



        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
        <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>

            {{-- ckeditor --}}
    <script src="https://cdn.ckeditor.com/ckeditor5/28.0.0/classic/ckeditor.js"></script>
        {{-- ckeditor --}}

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </head>
    <body class="font-sans antialiased">
        <x-jet-banner />

        <div class="min-h-screen bg-gray-100">
            @livewire('admin.navigation')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="px-4 py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        @stack('modals')

        @livewireScripts

        @stack('script')


        <script>
            livewire.on('alert', function(message){
                Swal.fire(
                    'TICOM SRL!',
                    message,
                    'PORTAL EMPRESARIAL'
                    )
            })


        </script>


    </body>
</html>
