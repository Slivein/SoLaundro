@extends('layouts.dashboard')

@section('content')
    <section class="w-full rounded-[2rem] bg-white p-8 shadow-sm ring-1 ring-slate-200">
        <p class="text-sm font-semibold uppercase tracking-[0.3em] text-cyan-700">Orders</p>
        <h1 class="mt-3 text-3xl font-semibold text-slate-900">Your laundry orders</h1>
        <p class="mt-2 text-sm text-slate-600">Follow each order from pickup to finishing.</p>

        <div class="mt-8 grid gap-4">
            @foreach ($orders as $order)
                <article class="rounded-3xl border border-slate-200 p-6">
                    <div class="flex flex-wrap items-start justify-between gap-4">
                        <div>
                            <p class="text-xs font-semibold uppercase tracking-[0.25em] text-slate-500">{{ $order['code'] }}</p>
                            <h2 class="mt-2 text-xl font-semibold text-slate-900">{{ $order['service'] }}</h2>
                            <p class="mt-2 text-sm text-slate-600">Weight: {{ $order['weight'] }}</p>
                            <p class="mt-1 text-sm text-slate-600">Pickup time: {{ $order['pickup'] }}</p>
                        </div>
                        <span class="rounded-full bg-cyan-50 px-4 py-2 text-sm font-semibold text-cyan-700">{{ $order['status'] }}</span>
                    </div>
                </article>
            @endforeach
        </div>
    </section>
@endsection
