@extends('layouts.dashboard')

@section('content')
    <div class="w-full max-w-md rounded-3xl bg-white p-8 shadow-sm ring-1 ring-gray-200 ml-auto">
        <div class="mb-8">
            <p class="text-sm font-semibold uppercase tracking-[0.3em] text-cyan-700">SoLaundro</p>
            <h1 class="mt-3 text-3xl font-semibold text-gray-900">
                {{ Auth::check() ? 'Register New User' : 'Create Account' }}
            </h1>
            <p class="mt-2 text-sm text-gray-600">
                {{ Auth::check() ? 'Fill in the details to add a new member to the system.' : 'Join us to track your laundry and manage your profile.' }}
            </p>
        </div>

        <form method="POST" action="{{ Auth::check() ? route('dashboard.users.store') : route('dashboard.register.store') }}" class="space-y-5">
            @csrf

            <div>
                <label for="name" class="mb-2 block text-sm font-medium text-gray-700">Full Name</label>
                <input id="name" name="name" type="text" value="{{ old('name') }}" required autofocus
                    class="w-full rounded-2xl border border-gray-300 px-4 py-3 text-sm text-gray-900 focus:border-blue-300 focus:outline-none focus:ring">
                @error('name')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="email" class="mb-2 block text-sm font-medium text-gray-700">Email Address</label>
                <input id="email" name="email" type="email" value="{{ old('email') }}" required
                    class="w-full rounded-2xl border border-gray-300 px-4 py-3 text-sm text-gray-900 focus:border-blue-300 focus:outline-none focus:ring">
                @error('email')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            @if(Auth::check() && count($roles) > 0)
                <div>
                    <label for="role_id" class="mb-2 block text-sm font-medium text-gray-700">Assign Role</label>
                    <select id="role_id" name="role_id" required
                        class="w-full rounded-2xl border border-gray-300 px-4 py-3 text-sm text-gray-900 focus:border-blue-300 focus:outline-none focus:ring bg-white">
                        @foreach($roles as $role)
                            <option value="{{ $role->id }}" {{ old('role_id') == $role->id ? 'selected' : '' }}>
                                {{ $role->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('role_id')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            @endif

            <div>
                <label for="password" class="mb-2 block text-sm font-medium text-gray-700">Password</label>
                <input id="password" name="password" type="password" required
                    class="w-full rounded-2xl border border-gray-300 px-4 py-3 text-sm text-gray-900 focus:border-blue-300 focus:outline-none focus:ring">
                @error('password')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="password_confirmation" class="mb-2 block text-sm font-medium text-gray-700">Confirm Password</label>
                <input id="password_confirmation" name="password_confirmation" type="password" required
                    class="w-full rounded-2xl border border-gray-300 px-4 py-3 text-sm text-gray-900 focus:border-blue-300 focus:outline-none focus:ring">
            </div>

            <button type="submit"
                class="w-full rounded-2xl bg-sky-700 px-4 py-3 text-sm font-semibold text-white transition hover:bg-sky-800">
                {{ Auth::check() ? 'Register User' : 'Create Account' }}
            </button>

            @if(!Auth::check())
                <p class="text-center text-sm text-gray-600 mt-4">
                    Already have an account? <a href="{{ route('dashboard.login') }}" class="font-semibold text-sky-700 hover:underline">Log in</a>
                </p>
            @endif
        </form>
    </div>
@endsection
