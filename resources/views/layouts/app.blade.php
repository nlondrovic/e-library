<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    </head>
    <body class="overflow-hidden small:bg-gradient-to-r small:from-green-400 small:to-blue-500">

        @include('components/header')

        <main class="flex flex-row small:hidden">

            @include('components/sidebar')

            <section class="w-screen h-screen py-4 pl-[60px] text-[#212121]">
                @yield('main')
            </section>

        </main>

        <script src="{{ asset('assets/js/jquery.min.js') }}" defer=""></script>
        <script src="{{ asset('assets/js/app.js') }}" defer=""></script>
        <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>

        <!-- File upload -->
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
        <script src="https://unpkg.com/create-file-list"></script>
    </body>
</html>
