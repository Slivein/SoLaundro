<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'SoLaundro') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif

    <!-- filemtime is for version-ing the css  -->
    <link href="{{ asset('css/main.css') }}?v={{ filemtime(public_path('css/main.css')) }}" rel="stylesheet">
    <link href="{{ asset('css/styles.css') }}?v={{ filemtime(public_path('css/styles.css')) }}" rel="stylesheet">
</head>

<body class="min-h-screen bg-[radial-gradient(circle_at_top,_#ecfeff,_#f8fafc_42%,_#e2e8f0_100%)] text-slate-900">
    <div class="mx-auto flex min-h-screen w-full max-w-7xl flex-col px-6 py-6 lg:px-8">
        <header class="mb-6 rounded-[2rem] border border-white/70 bg-white/80 px-6 py-5 shadow-sm backdrop-blur">
            <div class="flex flex-wrap items-center justify-between gap-4">
                <div>
                    <a href="{{ route('welcome') }}"
                        class="text-sm font-semibold uppercase tracking-[0.35em] text-cyan-700">SoLaundro</a>
                    <p class="mt-2 text-sm text-slate-500">Laundry pickup, progress tracking, and member billing.</p>
                </div>

                <nav class="flex flex-wrap items-center gap-3 text-sm font-medium text-slate-600">
                    <a href="{{ route('welcome') }}"
                        class="rounded-full px-4 py-2 transition hover:bg-slate-100 hover:text-slate-900">Welcome</a>
                    @auth
                        <a href="{{ route('dashboard.home') }}"
                            class="rounded-full px-4 py-2 transition hover:bg-slate-100 hover:text-slate-900">Dashboard</a>
                        <a href="{{ route('dashboard.orders.index') }}"
                            class="rounded-full px-4 py-2 transition hover:bg-slate-100 hover:text-slate-900">Orders</a>
                        <a href="{{ route('dashboard.invoices.index') }}"
                            class="rounded-full px-4 py-2 transition hover:bg-slate-100 hover:text-slate-900">Invoices</a>
                        <a href="{{ route('dashboard.profile.edit') }}"
                            class="rounded-full px-4 py-2 transition hover:bg-slate-100 hover:text-slate-900">Profile</a>
                    @else
                        <a href="{{ route('dashboard.login') }}"
                            class="rounded-full bg-slate-950 px-4 py-2 text-white transition hover:bg-slate-800">Log in</a>
                    @endauth
                </nav>
            </div>
        </header>

        <main class="flex-1">
            @yield('content')
        </main>

        <div>v0.1.0</div>
    </div>
</body>

</html>
