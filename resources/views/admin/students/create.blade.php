@extends('layouts.app')

@section('content')
<div class="bg-white p-6 rounded-lg shadow max-w-2xl mx-auto">
    <h2 class="text-2xl font-semibold mb-6">Add New Student</h2>

    <form action="{{ route('admin.students.store') }}" method="POST">
        @csrf
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-gray-700 font-medium mb-2">Name</label>
                <input type="text" name="name" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring focus:ring-blue-300" required>
            </div>

            <div>
                <label class="block text-gray-700 font-medium mb-2">Email</label>
                <input type="email" name="email" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring focus:ring-blue-300" required>
            </div>

            <div>
                <label class="block text-gray-700 font-medium mb-2">Phone</label>
                <input type="text" name="phone" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring focus:ring-blue-300">
            </div>

            <div>
                <label class="block text-gray-700 font-medium mb-2">Date of Birth</label>
                <input type="date" name="dob" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring focus:ring-blue-300" required>
            </div>

            <div class="md:col-span-2">
                <label class="block text-gray-700 font-medium mb-2">Address</label>
                <textarea name="address" rows="3" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring focus:ring-blue-300"></textarea>
            </div>
        </div>

        <div class="mt-6 flex justify-end">
            <a href="{{ route('admin.students.index') }}" class="mr-4 text-gray-600 hover:underline">Cancel</a>
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded">
                Save Student
            </button>
        </div>
    </form>
</div>
@endsection
