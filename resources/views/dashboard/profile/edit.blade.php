@extends('layouts.dashboard')

@section('content')
    <section class="w-full max-w-2xl rounded-[2rem] bg-white p-8 shadow-sm ring-1 ring-slate-200">
        <p class="text-sm font-semibold uppercase tracking-[0.3em] text-cyan-700">Profile</p>
        <h1 class="mt-3 text-3xl font-semibold text-slate-900">Update your member profile</h1>
        <p class="mt-2 text-sm text-slate-600">Keep your contact details current so pickups and notifications stay smooth.</p>

        @if (session('status'))
            <div class="mt-6 rounded-2xl bg-emerald-50 px-4 py-3 text-sm font-medium text-emerald-700">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('dashboard.profile.update') }}" class="mt-8 space-y-5">
            @csrf
            @method('PATCH')

            <div>
                <label for="name" class="mb-2 block text-sm font-medium text-slate-700">Full name</label>
                <input
                    id="name"
                    name="name"
                    type="text"
                    value="{{ old('name', $user->name) }}"
                    required
                    class="w-full rounded-2xl border border-slate-300 px-4 py-3 text-sm text-slate-900 focus:border-blue-300 focus:outline-none focus:ring"
                >
                @error('name')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="email" class="mb-2 block text-sm font-medium text-slate-700">Email address</label>
                <input
                    id="email"
                    name="email"
                    type="email"
                    value="{{ old('email', $user->email) }}"
                    required
                    class="w-full rounded-2xl border border-slate-300 px-4 py-3 text-sm text-slate-900 focus:border-blue-300 focus:outline-none focus:ring"
                >
                @error('email')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="rounded-2xl bg-slate-950 px-5 py-3 text-sm font-semibold text-white transition hover:bg-slate-800">
                Save profile
            </button>
        </form>
    </section>
@endsection
