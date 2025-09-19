@extends('layouts.app')

@section('title', 'Edit Class')

@section('content')
<h2>Edit Class</h2>

<form action="{{ route('classes.update', $class->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label class="form-label">Class Name</label>
        <input type="text" class="form-control" name="name" 
               value="{{ old('name', $class->name) }}" required>
        @error('name')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <button type="submit" class="btn btn-success">Update</button>
    <a href="{{ route('classes.index') }}" class="btn btn-secondary">Cancel</a>
</form>
@endsection
