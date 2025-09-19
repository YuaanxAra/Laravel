@extends('layouts.app')

@section('title', 'Add Grade')

@section('content')
<h2>Add Grade</h2>

<form action="{{ route('grades.store') }}" method="POST">
    @csrf

    <div class="mb-3">
        <label class="form-label">Student</label>
        <select name="student_id" class="form-select" required>
            <option value="">Select Student</option>
            @foreach($students as $student)
                <option value="{{ $student->id }}" {{ old('student_id') == $student->id ? 'selected' : '' }}>
                    {{ $student->name }}
                </option>
            @endforeach
        </select>
        @error('student_id')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label class="form-label">Subject</label>
        <select name="subject_id" class="form-select" required>
            <option value="">Select Subject</option>
            @foreach($subjects as $subject)
                <option value="{{ $subject->id }}" {{ old('subject_id') == $subject->id ? 'selected' : '' }}>
                    {{ $subject->name }}
                </option>
            @endforeach
        </select>
        @error('subject_id')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label class="form-label">Score</label>
        <input type="number" class="form-control" name="score" value="{{ old('score') }}" min="0" max="100" required>
        @error('score')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label class="form-label">Term (optional)</label>
        <input type="text" class="form-control" name="term" value="{{ old('term') }}">
        @error('term')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <button type="submit" class="btn btn-success">Save</button>
    <a href="{{ route('grades.index') }}" class="btn btn-secondary">Cancel</a>
</form>
@endsection
