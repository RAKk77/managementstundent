@extends('layouts.app')

@section('content')
<div class="bg-white p-6 rounded-lg shadow">
    <h2 class="text-2xl font-semibold text-gray-800 mb-4">Admin Dashboard</h2>
    <p class="text-gray-600">Welcome! You can manage students from the sidebar or below.</p>

    <div class="mt-6">
        <a href="{{ route('admin.students.index') }}" class="inline-block bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
            Manage Students
        </a>
    </div>
</div>
@endsection
