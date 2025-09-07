<?php

namespace App\Http\Controllers;

use App\Models\SchoolClass;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
/**
 * @method void middleware(string|array $middleware, array $options = [])
 */
class SchoolClassController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $classes = SchoolClass::withCount('students')->paginate(20);
        return view('classes.index', compact('classes'));
    }

    public function create() {
        return view('classes.create');
    }

    public function store(Request $request) {
        $data = $request->validate([
            'name' => 'required|string|max:191',
            'description' => 'nullable|string'
        ]);

        SchoolClass::create($data);

        return redirect()->route('classes.index')->with('success', 'Class added');
    }

    public function edit(SchoolClass $class) {
        return view('classes.edit', compact('class'));
    }

    public function update(Request $request, SchoolClass $class) {
        $data = $request->validate([
            'name' => 'required|string|max:191',
            'description' => 'nullable|string'
        ]);

        $class->update($data);

        return redirect()->route('classes.index')->with('success', 'Class updated');
    }

    public function destroy(SchoolClass $class) {
        $class->delete();
        return redirect()->route('classes.index')->with('success', 'Class deleted');
    }
}
