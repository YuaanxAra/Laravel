<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Books List') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if($books->isEmpty())
                        <p class="text-gray-600 dark:text-gray-400">No books available.</p>
                    @else
                        <table class="min-w-full border border-gray-300 dark:border-gray-700">
                            <thead class="bg-gray-100 dark:bg-gray-700">
                                <tr>
                                    <th class="px-4 py-2 border-b text-left">ID</th>
                                    <th class="px-4 py-2 border-b text-left">Title</th>
                                    <th class="px-4 py-2 border-b text-left">Author</th>
                                    <th class="px-4 py-2 border-b text-left">Published At</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($books as $book)
                                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-900">
                                        <td class="px-4 py-2 border-b">{{ $book->id }}</td>
                                        <td class="px-4 py-2 border-b">{{ $book->title }}</td>
                                        <td class="px-4 py-2 border-b">{{ $book->author }}</td>
                                        <td class="px-4 py-2 border-b">{{ $book->published_at }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
