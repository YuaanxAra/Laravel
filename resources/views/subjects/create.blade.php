@extends('layouts.app')

@section('title', $subject->id ?? null ? 'Edit Subject' : 'Add Subject')

@section('content')
<h2>{{ $subject->id ?? null ? 'Edit Subject' : 'Add Subject' }}</h2>

<form action="{{ $subject->id ?? null ? route('subjects.update', $subject->id) : route('subjects.store') }}" method="POST">
    @csrf
    @if($subject->id ?? null)
        @method('PUT')
    @endif

    <div class="mb-3">
        <label class="form-label">Subject Name</label>
        <input type="text" class="form-control" name="name" value="{{ $subject->name ?? old('name') }}" required>
    </div>

    {{-- Hapus bagian Teacher karena belum dipakai --}}

    <button type="submit" class="btn btn-success">Save</button>
    <a href="{{ route('subjects.index') }}" class="btn btn-secondary">Cancel</a>
</form>
@endsection
