@extends('layouts.app')

@section('title', 'Edit Subject')

@section('content')
<h2>Edit Subject</h2>

<form action="{{ route('subjects.update', $subject->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label class="form-label">Subject Name</label>
        <input type="text" class="form-control" name="name" value="{{ old('name', $subject->name) }}" required>
        @error('name')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    {{-- Hapus bagian Teacher karena belum dipakai --}}

    <button type="submit" class="btn btn-success">Update</button>
    <a href="{{ route('subjects.index') }}" class="btn btn-secondary">Cancel</a>
</form>
@endsection
