@extends('layouts.app')

@section('title', 'Edit Grade')

@section('content')
<h2>Edit Grade</h2>

<form action="{{ route('grades.update', $grade->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label class="form-label">Student</label>
        <select name="student_id" class="form-select" required>
            <option value="">Select Student</option>
            @foreach($students as $student)
                <option value="{{ $student->id }}" {{ ($grade->student_id == $student->id) ? 'selected' : '' }}>
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
                <option value="{{ $subject->id }}" {{ ($grade->subject_id == $subject->id) ? 'selected' : '' }}>
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
        <input type="number" class="form-control" name="score" value="{{ $grade->score }}" min="0" max="100" required>
        @error('score')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label class="form-label">Term (optional)</label>
        <input type="text" class="form-control" name="term" value="{{ $grade->term }}">
        @error('term')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <button type="submit" class="btn btn-success">Update</button>
    <a href="{{ route('grades.index') }}" class="btn btn-secondary">Cancel</a>
</form>
@endsection
