<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();
        return view('admin.students.index', compact('students'));
    }

    public function create()
    {
        return view('admin.students.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:students,email',
            'phone' => 'nullable',
            'address' => 'nullable',
            'dob' => 'required|date',
        ]);

        Student::create($request->all());

        return redirect()->route('admin.students.index')->with('success', 'Student added!');
    }

    public function edit(Student $student)
    {
        return view('admin.students.edit', compact('student'));
    }

    public function update(Request $request, Student $student)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:students,email,' . $student->id,
            'phone' => 'nullable',
            'address' => 'nullable',
            'dob' => 'required|date',
        ]);

        $student->update($request->all());

        return redirect()->route('admin.students.index')->with('success', 'Student updated!');
    }

    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('admin.students.index')->with('success', 'Student deleted!');
    }
}
