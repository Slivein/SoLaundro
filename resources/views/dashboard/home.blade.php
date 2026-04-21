@extends('layouts.dashboard')

@section('content')
    <div class="w-full space-y-6">
        <section class="rounded-[2rem] bg-white p-8 shadow-sm ring-1 ring-slate-200">
            <div class="flex flex-wrap items-start justify-between gap-4">
                <div>
                    <p class="text-sm font-semibold uppercase tracking-[0.3em] text-cyan-700">Member dashboard</p>
                    <h1 class="mt-3 text-3xl font-semibold text-slate-900">Welcome back, {{ auth()->user()->name }}</h1>
                    <p class="mt-2 text-sm text-slate-600">Track active orders, check invoice status, and manage your laundry profile.</p>
                </div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="rounded-2xl border border-slate-300 px-4 py-3 text-sm font-semibold text-slate-700 transition hover:bg-slate-50">
                        Log out
                    </button>
                </form>
            </div>
        </section>

        <section class="grid gap-4 md:grid-cols-3">
            @foreach ($stats as $stat)
                <article class="rounded-[1.5rem] bg-slate-950 p-6 text-white shadow-lg">
                    <p class="text-sm text-slate-400">{{ $stat['label'] }}</p>
                    <p class="mt-3 text-3xl font-semibold">{{ $stat['value'] }}</p>
                </article>
            @endforeach
        </section>

        <section class="rounded-[2rem] bg-white p-8 shadow-sm ring-1 ring-slate-200">
            <div class="flex items-center justify-between gap-4">
                <div>
                    <p class="text-sm font-semibold uppercase tracking-[0.3em] text-cyan-700">Recent orders</p>
                    <h2 class="mt-2 text-2xl font-semibold text-slate-900">Current laundry activity</h2>
                </div>
                <a href="{{ route('dashboard.orders.index') }}" class="text-sm font-semibold text-cyan-700 hover:text-cyan-800">View all orders</a>
            </div>

            <div class="mt-6 overflow-hidden rounded-3xl border border-slate-200">
                <table class="min-w-full divide-y divide-slate-200">
                    <thead class="bg-slate-50">
                        <tr class="text-left text-sm font-semibold text-slate-600">
                            <th class="px-5 py-4">Invoice</th>
                            <th class="px-5 py-4">Service</th>
                            <th class="px-5 py-4">Status</th>
                            <th class="px-5 py-4">Total</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-200 bg-white text-sm text-slate-700">
                        @foreach ($recentOrders as $order)
                            <tr>
                                <td class="px-5 py-4 font-medium text-slate-900">{{ $order['code'] }}</td>
                                <td class="px-5 py-4">{{ $order['service'] }}</td>
                                <td class="px-5 py-4">{{ $order['status'] }}</td>
                                <td class="px-5 py-4">{{ $order['total'] }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </section>
    </div>
@endsection
