@extends('layouts.dashboard')

@section('content')
    <div class="w-full max-w-md rounded-3xl bg-white ml-auto p-8 shadow-sm ring-1 ring-gray-200">
        <div class="mb-8">
            <p class="text-sm font-semibold uppercase tracking-[0.3em] text-sky-700">SoLaundro</p>
            <h1 class="mt-3 text-3xl font-semibold text-gray-900">Log in</h1>
            <p class="mt-2 text-sm text-gray-600">Use your email and password to continue.</p>
        </div>

        <form method="POST" action="{{ route('dashboard.login.store') }}" class="flex flex-col gap-4 w-full">
            @csrf

            <div>
                <label for="email" class="mb-2 block text-sm font-medium text-gray-700">Email</label>
                <input id="email" name="email" type="email" value="{{ old('email') }}" required autofocus
                    class="w-full rounded-2xl border border-gray-300 px-4 py-3 text-sm text-gray-900 focus:border-blue-300 focus:outline-none focus:ring">
                @error('email')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="password" class="mb-2 block text-sm font-medium text-gray-700">Password</label>
                <input id="password" name="password" type="password" required
                    class="w-full rounded-2xl border border-gray-300 px-4 py-3 text-sm text-gray-900 focus:border-blue-300 focus:outline-none focus:ring">
                @error('password')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <label class="flex items-center gap-3 text-sm text-gray-600">
                <input type="checkbox" name="remember" class="h-4 w-4 rounded border-gray-300 text-sky-600">
                Keep me signed in
            </label>

            <button type="submit"
                class="w-full rounded-2xl bg-sky-700 px-4 py-3 text-sm font-semibold text-white transition hover:bg-sky-800">
                Sign in
            </button>
        </form>
    </div>
@endsection
