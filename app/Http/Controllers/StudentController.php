<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\SchoolClass;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
/**
 * @method void middleware(string|array $middleware, array $options = [])
 */
class StudentController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $students = Student::with('schoolClass')->paginate(20);
        return view('students.index', compact('students'));
    }

    public function create() {
        $classes = SchoolClass::all();
        return view('students.create', compact('classes'));
    }

    public function store(Request $request) {
        $data = $request->validate([
            'nis' => 'required|unique:students,nis',
            'name' => 'required|string',
            'school_class_id' => 'required|exists:school_classes,id',
            'email' => 'nullable|email'
        ]);

        Student::create($data);
        return redirect()->route('students.index')->with('success', 'Student added');
    }

    public function edit(Student $student) {
        $classes = SchoolClass::all();
        return view('students.edit', compact('student', 'classes'));
    }

    public function update(Request $request, Student $student) {
        $data = $request->validate([
            'nis' => 'required|unique:students,nis,' . $student->id,
            'name' => 'required|string',
            'school_class_id' => 'required|exists:school_classes,id',
            'email' => 'nullable|email'
        ]);

        $student->update($data);
        return redirect()->route('students.index')->with('success', 'Student updated');
    }

    public function destroy(Student $student) {
        $student->delete();
        return redirect()->route('students.index')->with('success', 'Student deleted');
    }
}
