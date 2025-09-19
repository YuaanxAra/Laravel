@extends('layouts.app')

@section('title', isset($student) ? 'Edit Student' : 'Add Student')

@section('content')
    <h2>{{ isset($student) ? 'Edit Student' : 'Add Student' }}</h2>

    <form action="{{ isset($student) ? route('students.update', $student->id) : route('students.store') }}" method="POST">
        @csrf
        @if (isset($student))
            @method('PUT')
        @endif

        {{-- Name --}}
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" name="name" id="name"
                value="{{ old('name', $student->name ?? '') }}" required>
            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        {{-- Student ID / NIS --}}
        <div class="mb-3">
            <label for="nis" class="form-label">Student ID</label>
            <input type="text" class="form-control" name="nis" id="nis"
                value="{{ old('nis', $student->nis ?? '') }}" required>
            @error('nis')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        {{-- Class --}}
        <div class="mb-3">
            <label for="school_class_id" class="form-label">Class</label>
            <select name="school_class_id" id="school_class_id" class="form-select" required>
                <option value="">Select Class</option>
                @foreach ($classes as $class)
                    <option value="{{ $class->id }}"
                        {{ old('school_class_id', $student->school_class_id ?? '') == $class->id ? 'selected' : '' }}>
                        {{ $class->name }}
                    </option>
                @endforeach
            </select>
            @error('school_class_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror

        </div>

        {{-- Buttons --}}
        <button type="submit" class="btn btn-success">{{ isset($student) ? 'Update' : 'Save' }}</button>
        <a href="{{ route('students.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
@endsection
