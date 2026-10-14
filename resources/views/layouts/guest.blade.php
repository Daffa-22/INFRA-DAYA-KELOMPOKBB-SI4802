<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-[#EEF3F6]">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'INFRA-DAYA') }} - Kota Bandung</title>

        <!-- Favicon Resmi INFRA-DAYA -->
        <link rel="icon" type="image/png" href="{{ asset('images/logo-icon.png') }}">

        <!-- Fonts Inter -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="h-full font-sans text-slate-800 antialiased flex flex-col justify-center py-12 sm:px-6 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-md text-center">
            <a href="/" class="inline-block transition-transform hover:scale-105 duration-200">
                <x-application-logo variant="full" class="h-24 w-auto max-w-[280px] mx-auto drop-shadow-sm" />
            </a>
            <div class="mt-2 text-xs font-semibold text-slate-500 uppercase tracking-widest">
                DSDABM Pemerintah Kota Bandung
            </div>
        </div>

        <div class="mt-6 sm:mx-auto sm:w-full sm:max-w-md px-4">
            <div class="bg-white py-8 px-6 sm:px-10 shadow-xl shadow-slate-200/50 rounded-3xl border border-slate-200/80">
                {{ $slot }}
            </div>

            <div class="mt-6 text-center text-xs text-slate-400">
                &copy; {{ date('Y') }} INFRA-DAYA &bull; Sistem Pelaporan Kerusakan Infrastruktur Kota Bandung
            </div>
        </div>
    </body>
</html>
