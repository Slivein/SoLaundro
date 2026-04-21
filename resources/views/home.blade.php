@extends('layouts.dashboard')
@section('content')
    <div class="w-full rounded-[2rem] bg-white p-8 shadow-sm ring-1 ring-slate-200">
        <p class="text-sm font-semibold uppercase tracking-[0.3em] text-cyan-700">Shortcut</p>
        <h1 class="mt-3 text-3xl font-semibold text-slate-900">Laundry member area is ready.</h1>
        <p class="mt-3 max-w-2xl text-sm leading-7 text-slate-600">
            This page acts as a protected shortcut while the fuller laundry flow lives inside your dashboard route group.
        </p>
        <div class="mt-6 flex flex-wrap gap-4">
            <a href="{{ route('dashboard.home') }}" class="rounded-2xl bg-slate-950 px-5 py-3 text-sm font-semibold text-white transition hover:bg-slate-800">
                Open dashboard home
            </a>
            <a href="{{ route('dashboard.orders.index') }}" class="rounded-2xl border border-slate-300 px-5 py-3 text-sm font-semibold text-slate-700 transition hover:bg-slate-50">
                View orders
            </a>
        </div>
    </div>
@endsection
