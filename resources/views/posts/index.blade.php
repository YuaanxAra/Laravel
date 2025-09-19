@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Posts List</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Content</th>
                <th>Created At</th>
            </tr>
        </thead>
        <tbody>
            @foreach($posts as $post)
            <tr>
                <td>{{ $post->id }}</td>
                <td>{{ $post->title }}</td>
                <td>{{ Str::limit($post->content, 50) }}</td>
                <td>{{ $post->created_at }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
