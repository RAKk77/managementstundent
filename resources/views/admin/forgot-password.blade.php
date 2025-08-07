@extends('layouts.app')

@section('content')
<div class="flex items-center justify-center min-h-screen">
    <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md">
        <h2 class="text-2xl font-bold mb-6 text-center">Forgot Password?</h2>
        <p class="text-gray-600 mb-6 text-center">Enter your email to reset your password.</p>

        @if (session('status'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                {!! session('status') !!}
            </div>
        @endif

        <form method="POST" action="{{ route('admin.forgot.password.post') }}">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="email">Email</label>
                <input type="email" name="email" id="email"
                       class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring focus:ring-blue-300"
                       value="{{ old('email') }}" required>
            </div>

            <div class="flex items-center justify-between">
                <a href="{{ route('admin.login') }}" class="text-sm text-blue-600 hover:underline">Back to Login</a>
                <button type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Send Reset Link
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
