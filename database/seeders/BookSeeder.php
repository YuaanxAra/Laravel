<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Book;

class BookSeeder extends Seeder
{
    public function run(): void
    {
        Book::create([
            'title' => 'Learning Laravel',
            'author' => 'John Doe',
            'publisher' => 'Anu',
            'year_published' => 2025,
    ]);
    }
}
