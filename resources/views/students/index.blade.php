@extends('layouts.app')

@section('title', 'Students List')

@section('content')
<div class="d-flex justify-content-between mb-3">
    <h2>Students List</h2>
    <a href="{{ route('students.create') }}" class="btn btn-primary">Add Student</a>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Student ID</th>
            <th>Class</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($students as $student)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $student->name }}</td>
            <td>{{ $student->nis }}</td>
            <td>{{ $student->schoolClass->name ?? '-' }}</td>
            <td>
                {{-- <a href="{{ route('students.show', $student->id) }}" class="btn btn-info btn-sm">View</a> --}}
                <a href="{{ route('students.edit', $student->id) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('students.destroy', $student->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm" onclick="return confirm('Delete this student?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $students->links() }}
@endsection
