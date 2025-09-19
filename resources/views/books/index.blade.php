<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Books
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <table class="min-w-full table-auto border-collapse border border-gray-300">
                    <thead class="bg-gray-200">
                        <tr>
                            <th class="border border-gray-300 px-4 py-2">ID</th>
                            <th class="border border-gray-300 px-4 py-2">Title</th>
                            <th class="border border-gray-300 px-4 py-2">Author</th>
                            <th class="border border-gray-300 px-4 py-2">Published Year</th>
                            <th class="border border-gray-300 px-4 py-2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($books as $book)
                        <tr>
                            <td class="border px-4 py-2">{{ $book->id }}</td>
                            <td class="border px-4 py-2">{{ $book->title }}</td>
                            <td class="border px-4 py-2">{{ $book->author }}</td>
                            <td class="border px-4 py-2">{{ $book->published_year }}</td>
                            <td class="border px-4 py-2">
                                <a href="{{ route('books.edit', $book->id) }}" class="text-blue-600">Edit</a> |
                                <form action="{{ route('books.destroy', $book->id) }}" method="POST" class="inline">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="text-red-600" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="mt-4">
                    <a href="{{ route('books.create') }}" class="px-4 py-2 bg-green-500 text-white rounded">+ Add Book</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
