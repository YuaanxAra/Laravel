@extends('layouts.app')

@section('title', 'Classes List')

@section('content')
<div class="d-flex justify-content-between mb-3">
    <h2>Classes List</h2>
    <a href="{{ route('classes.create') }}" class="btn btn-primary">Add Class</a>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th>Class Name</th>
            <th>Teacher</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($classes as $class)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $class->name }}</td>
            <td>{{ $class->teacher->name ?? '-' }}</td>
            <td>
                {{-- <a href="{{ route('classes.show', $class->id) }}" class="btn btn-info btn-sm">View</a> --}}
                <a href="{{ route('classes.edit', $class->id) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('classes.destroy', $class->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm" onclick="return confirm('Delete this class?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $classes->links() }}
@endsection
