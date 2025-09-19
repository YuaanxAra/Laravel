<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 flex">
        <!-- Sidebar -->
        <div class="w-64 bg-white dark:bg-gray-800 shadow-md rounded-lg p-4">
            <h3 class="text-lg font-bold mb-4 text-gray-700 dark:text-gray-200">Navigation</h3>
            <ul class="space-y-2">
                <li>
                    <a href="{{ route('books.index') }}" 
                       class="block px-3 py-2 rounded-md hover:bg-gray-200 dark:hover:bg-gray-700">
                       Books
                    </a>
                </li>
                <li>
                    <a href="{{ route('grades.index') }}" 
                       class="block px-3 py-2 rounded-md hover:bg-gray-200 dark:hover:bg-gray-700">
                       Grades
                    </a>
                </li>
                <li>
                    <a href="{{ route('posts.index') }}" 
                       class="block px-3 py-2 rounded-md hover:bg-gray-200 dark:hover:bg-gray-700">
                       Posts
                    </a>
                </li>
                <li>
                    <a href="{{ route('classes.index') }}" 
                       class="block px-3 py-2 rounded-md hover:bg-gray-200 dark:hover:bg-gray-700">
                       Classes
                    </a>
                </li>
                <li>
                    <a href="{{ route('students.index') }}" 
                       class="block px-3 py-2 rounded-md hover:bg-gray-200 dark:hover:bg-gray-700">
                       Students
                    </a>
                </li>
                <li>
                    <a href="{{ route('subjects.index') }}" 
                       class="block px-3 py-2 rounded-md hover:bg-gray-200 dark:hover:bg-gray-700">
                       Subjects
                    </a>
                </li>
            </ul>
        </div>

        <!-- Main Content -->
        <div class="flex-1 ml-6">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h1 class="text-2xl font-bold text-gray-900 dark:text-gray-100">Welcome 🎉</h1>
                <p class="mt-2 text-gray-700 dark:text-gray-300">
                    Choose a menu from the sidebar to manage your data.
                </p>
            </div>
        </div>
    </div>
</x-app-layout>
