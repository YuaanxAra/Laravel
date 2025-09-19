@extends('layouts.app')

@section('title', 'Grades List')

@section('content')
    <div class="d-flex justify-content-between mb-3">
        <h2>Grades List</h2>
        <a href="{{ route('grades.create') }}" class="btn btn-primary">Add Grade</a>
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Student</th>
                <th>Subject</th>
                <th>Score</th>
                <th>Term</th>
                {{-- <th>Entered By</th> --}} {{-- hapus --}}
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($grades as $grade)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $grade->student->name ?? '-' }}</td>
                    <td>{{ $grade->subject->name ?? '-' }}</td>
                    <td>{{ $grade->score }}</td>
                    <td>{{ $grade->term ?? '-' }}</td>
                    {{-- <td>{{ $grade->enteredBy->name ?? '-' }}</td> --}} {{-- hapus --}}
                    <td>
                        <a href="{{ route('grades.edit', $grade->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('grades.destroy', $grade->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm"
                                onclick="return confirm('Delete this grade?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">No grades found</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{-- Pagination --}}
    @if ($grades instanceof \Illuminate\Pagination\LengthAwarePaginator)
        {{ $grades->links() }}
    @endif
@endsection
