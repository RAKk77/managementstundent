@extends('layouts.app')

@section('content')
<div class="flex items-center justify-center min-h-screen">
    <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md">
        <h2 class="text-2xl font-bold mb-6 text-center">Admin Login</h2>

        <form method="POST" action="{{ route('admin.login') }}">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="email">Email</label>
                <input type="email" name="email" id="email"
                       class="shadow-sm w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring focus:ring-blue-300"
                       value="{{ old('email') }}" required>
                @error('email')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="password">Password</label>
                <input type="password" name="password" id="password"
                       class="shadow-sm w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring focus:ring-blue-300"
                       required>
                @error('password')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit"
                    class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:ring focus:ring-blue-300">
                Login
            </button>
            <div class="text-center mt-4">
    <a href="{{ route('admin.forgot.password') }}" class="text-sm text-blue-600 hover:underline">
        Forgot password?
    </a>
</div>
        </form>
    </div>
</div>
@endsection
