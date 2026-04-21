<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ config('app.name', 'SoLaundro') }} - Maintenance</title>
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @endif
    </head>
    <body class="min-h-screen bg-slate-950 px-6 py-12 text-white">
        <main class="mx-auto flex min-h-[80vh] max-w-3xl items-center justify-center">
            <section class="w-full rounded-[2rem] border border-white/10 bg-white/5 p-10 backdrop-blur">
                <p class="text-sm font-semibold uppercase tracking-[0.35em] text-cyan-300">SoLaundro</p>
                <h1 class="mt-4 text-4xl font-semibold">Laundry service is temporarily paused.</h1>
                <p class="mt-4 max-w-2xl text-base leading-7 text-slate-300">
                    We are doing a quick maintenance pass so orders and invoices stay accurate. Please check back shortly.
                </p>
            </section>
        </main>
    </body>
</html>
