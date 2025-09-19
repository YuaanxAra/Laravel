@extends('layouts.app')

@section('title', 'Subjects List')

@section('content')
<div class="d-flex justify-content-between mb-3">
    <h2>Subjects List</h2>
    <a href="{{ route('subjects.create') }}" class="btn btn-primary">Add Subject</a>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th>Subject Name</th>
            <th>Teacher</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($subjects as $subject)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $subject->name }}</td>
            <td>{{ $subject->teacher->name ?? '-' }}</td>
            <td>
                {{-- <a href="{{ route('subjects.show', $subject->id) }}" class="btn btn-info btn-sm">View</a> --}}
                <a href="{{ route('subjects.edit', $subject->id) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('subjects.destroy', $subject->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm" onclick="return confirm('Delete this subject?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $subjects->links() }}
@endsection
