<!DOCTYPE html>
<html>
<head>
    <title>Book List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h2>Book List</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th><th>Title</th><th>Author</th><th>Publisher</th><th>Year</th>
            </tr>
        </thead>
        <tbody>
            @foreach($books as $book)
            <tr>
                <td>{{ $book->id }}</td>
                <td>{{ $book->title }}</td>
                <td>{{ $book->author }}</td>
                <td>{{ $book->publisher }}</td>
                <td>{{ $book->year_published }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</body>
</html>
