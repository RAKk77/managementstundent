@extends('layouts.app')

@section('content')
<div class="bg-white p-6 rounded-lg shadow">
    <h2 class="text-2xl font-semibold text-gray-800 mb-6">Students</h2>

    <div class="flex justify-between items-center mb-6">
        <a href="{{ route('admin.students.create') }}" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded">
            Add New Student
        </a>
    </div>

    @if ($students->isEmpty())
        <p class="text-gray-600">No students found.</p>
    @else
        <table class="min-w-full bg-white border border-gray-300 rounded-lg overflow-hidden">
            <thead class="bg-gray-100">
                <tr>
                    <th class="py-3 px-4 text-left text-sm font-bold text-gray-800">Name</th>
                    <th class="py-3 px-4 text-left text-sm font-bold text-gray-800">Email</th>
                    <th class="py-3 px-4 text-left text-sm font-bold text-gray-800">Phone</th>
                    <th class="py-3 px-4 text-left text-sm font-bold text-gray-800">DOB</th>
                    <th class="py-3 px-4 text-left text-sm font-bold text-gray-800">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                    <tr class="border-t hover:bg-gray-50">
                        <td class="py-3 px-4">{{ $student->name }}</td>
                        <td class="py-3 px-4">{{ $student->email }}</td>
                        <td class="py-3 px-4">{{ $student->phone }}</td>
                        <td class="py-3 px-4">{{ $student->dob }}</td>
                        <td class="py-3 px-4 space-x-2">
                            <a href="{{ route('admin.students.edit', $student) }}" class="text-blue-600 hover:underline">Edit</a>
                            <form action="{{ route('admin.students.destroy', $student) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline"
                                    onclick="return confirm('Delete student?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
