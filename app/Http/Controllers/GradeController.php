<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use App\Models\Student;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GradeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // Ambil semua grades + relasi student & subject
        $grades = Grade::with(['student', 'subject'])->paginate(30);

        return view('grades.index', compact('grades'));
    }

    public function create()
    {
        $students = Student::all();
        $subjects = Subject::all();
        return view('grades.create', compact('students', 'subjects'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'student_id' => 'required|exists:students,id',
            'subject_id' => 'required|exists:subjects,id',
            'score'     => 'required|numeric|min:0|max:100',
            'term'      => 'nullable|string',
        ]);

        Grade::updateOrCreate(
            [
                'student_id' => $data['student_id'],
                'subject_id' => $data['subject_id'],
                'term'       => $data['term'] ?? 'default',
            ],
            $data
        );

        return redirect()->route('grades.index')->with('success', 'Grade saved');
    }

    public function edit(Grade $grade)
    {
        $students = Student::all();
        $subjects = Subject::all();
        return view('grades.edit', compact('grade', 'students', 'subjects'));
    }

    public function update(Request $request, Grade $grade)
    {
        $data = $request->validate([
            'student_id' => 'required|exists:students,id',
            'subject_id' => 'required|exists:subjects,id',
            'score'     => 'required|numeric|min:0|max:100',
            'term'      => 'nullable|string',
        ]);

        $data['entered_by'] = Auth::id();
        $grade->update($data);

        return redirect()->route('grades.index')->with('success', 'Grade updated');
    }

    public function destroy(Grade $grade)
    {
        $grade->delete();
        return redirect()->route('grades.index')->with('success', 'Grade deleted');
    }
}
