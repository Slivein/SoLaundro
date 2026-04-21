@extends('layouts.dashboard')

@section('content')
    <section class="w-full rounded-[2rem] bg-white p-8 shadow-sm ring-1 ring-slate-200">
        <p class="text-sm font-semibold uppercase tracking-[0.3em] text-cyan-700">Invoices</p>
        <h1 class="mt-3 text-3xl font-semibold text-slate-900">Billing history</h1>
        <p class="mt-2 text-sm text-slate-600">Review invoice numbers, dates, and payment status.</p>

        <div class="mt-8 overflow-hidden rounded-3xl border border-slate-200">
            <table class="min-w-full divide-y divide-slate-200">
                <thead class="bg-slate-50">
                    <tr class="text-left text-sm font-semibold text-slate-600">
                        <th class="px-5 py-4">Invoice</th>
                        <th class="px-5 py-4">Date</th>
                        <th class="px-5 py-4">Amount</th>
                        <th class="px-5 py-4">Status</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-200 bg-white text-sm text-slate-700">
                    @foreach ($invoices as $invoice)
                        <tr>
                            <td class="px-5 py-4 font-medium text-slate-900">{{ $invoice['number'] }}</td>
                            <td class="px-5 py-4">{{ $invoice['date'] }}</td>
                            <td class="px-5 py-4">{{ $invoice['amount'] }}</td>
                            <td class="px-5 py-4">{{ $invoice['payment'] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
@endsection
