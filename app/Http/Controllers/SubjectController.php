<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
/**
 * @method void middleware(string|array $middleware, array $options = [])
 */
class SubjectController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $subjects = Subject::paginate(20);
        return view('subjects.index', compact('subjects'));
    }

    public function create() {
        return view('subjects.create');
    }

    public function store(Request $request) {
        $data = $request->validate([
            'name' => 'required|string|max:191',
            'code' => 'nullable|string|max:50'
        ]);

        Subject::create($data);
        return redirect()->route('subjects.index')->with('success', 'Subject saved');
    }

    public function edit(Subject $subject) {
        return view('subjects.edit', compact('subject'));
    }

    public function update(Request $request, Subject $subject) {
        $data = $request->validate([
            'name' => 'required|string|max:191',
            'code' => 'nullable|string|max:50'
        ]);

        $subject->update($data);
        return redirect()->route('subjects.index')->with('success', 'Subject updated');
    }

    public function destroy(Subject $subject) {
        $subject->delete();
        return redirect()->route('subjects.index')->with('success', 'Subject deleted');
    }
}
