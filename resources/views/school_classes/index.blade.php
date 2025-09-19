<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Classes
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <table class="min-w-full table-auto border-collapse border border-gray-300">
                    <thead class="bg-gray-200">
                        <tr>
                            <th class="border px-4 py-2">ID</th>
                            <th class="border px-4 py-2">Level</th>
                            <th class="border px-4 py-2">Major</th>
                            <th class="border px-4 py-2">Name</th>
                            <th class="border px-4 py-2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($classes as $class)
                        <tr>
                            <td class="border px-4 py-2">{{ $class->id }}</td>
                            <td class="border px-4 py-2">{{ $class->level }}</td>
                            <td class="border px-4 py-2">{{ $class->major }}</td>
                            <td class="border px-4 py-2">{{ $class->name }}</td>
                            <td class="border px-4 py-2">
                                <a href="{{ route('classes.edit', $class->id) }}" class="text-blue-600">Edit</a> |
                                <form action="{{ route('classes.destroy', $class->id) }}" method="POST" class="inline">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="text-red-600" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="mt-4">
                    <a href="{{ route('classes.create') }}" class="px-4 py-2 bg-green-500 text-white rounded">+ Add Class</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
