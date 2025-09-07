{{-- Di dalam resources/views/selamat-datang.blade.php --}}

@extends('layouts.app')

@section('content')
  {{-- Container untuk menengahkan konten dan memberikan padding, dengan latar belakang abu-abu muda --}}
  <div class="bg-gray-100 min-h-screen flex items-center justify-center">
    
    {{-- Kartu utama dengan background putih, padding, sudut membulat, dan bayangan --}}
    <div class="bg-white p-8 rounded-lg shadow-lg max-w-md w-full text-center">
      
      {{-- Judul dengan teks besar, tebal, dan warna gelap --}}
      <h1 class="text-3xl font-bold text-gray-800 mb-4">
        Selamat Datang di Pertemuan 2!
      </h1>
      
      {{-- Paragraf dengan teks ukuran normal dan warna abu-abu sedang --}}
      <p class="text-gray-600">
        Anda sekarang berhasil mengintegrasikan Tailwind CSS via CDN ke dalam view Laravel Blade Anda.
      </p>

      {{-- Tombol dengan styling --}}
      <div class="mt-6">
        <a href="#" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full transition duration-300 ease-in-out">
            Mulai Belajar
        </a>
      </div>

    </div>
  </div>
@endsection