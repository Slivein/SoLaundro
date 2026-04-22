@extends('layouts.dashboard')

@section('content')
    <div class="grid w-full gap-6 lg:grid-cols-[1.3fr_0.9fr]">
        <section class="rounded-[2rem] bg-slate-950 p-8 text-white shadow-xl">
            <p class="text-sm font-semibold uppercase tracking-[0.35em] text-cyan-300">Laundry made simple</p>
            <h1 class="mt-4 text-4xl font-semibold leading-tight">Keep your clothes moving without chasing the queue.</h1>
            <p class="mt-4 max-w-2xl text-base leading-7 text-slate-300">
                Book pickups, track washing progress, and review invoices from one member dashboard.
            </p>

            <div class="mt-8 flex flex-wrap gap-4">
                <a href="{{ route('dashboard.login') }}"
                    class="rounded-2xl bg-cyan-400 px-5 py-3 text-sm font-semibold text-slate-950 transition hover:bg-cyan-300">
                    Member Login
                </a>
                <a href="{{ route('dashboard.home') }}"
                    class="rounded-2xl border border-white/20 px-5 py-3 text-sm font-semibold text-white transition hover:bg-white/10">
                    Open Dashboard
                </a>
            </div>
        </section>

        <section class="rounded-[2rem] bg-white p-8 shadow-sm ring-1 ring-slate-200">
            <p class="text-sm font-semibold uppercase tracking-[0.3em] text-cyan-700">Services</p>
            <div class="mt-6 space-y-4">
                @foreach ($services as $service)
                    <div class="rounded-2xl border border-slate-200 p-5">
                        <div class="flex items-start justify-between gap-3">
                            <div>
                                <h2 class="text-lg font-semibold text-slate-900">{{ $service['name'] }}</h2>
                                <p class="mt-1 text-sm text-slate-500">{{ $service['eta'] }}</p>
                            </div>
                            <span class="text-sm font-semibold text-cyan-700">{{ $service['price'] }}</span>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    </div>
@endsection
