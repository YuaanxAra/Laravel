@extends('layouts.app')

@section('title', $class->id ?? null ? 'Edit Class' : 'Add Class')

@section('content')
<h2>{{ $class->id ?? null ? 'Edit Class' : 'Add Class' }}</h2>

<form action="{{ $class->id ?? null ? route('classes.update', $class->id) : route('classes.store') }}" method="POST">
    @csrf
    @if($class->id ?? null)
        @method('PUT')
    @endif

    <div class="mb-3">
        <label class="form-label">Class Name</label>
        <input type="text" class="form-control" name="name" value="{{ $class->name ?? old('name') }}" required>
    </div>

    {{-- Hapus bagian Teacher karena belum dipakai --}}

    <button type="submit" class="btn btn-success">Save</button>
    <a href="{{ route('classes.index') }}" class="btn btn-secondary">Cancel</a>
</form>
@endsection
