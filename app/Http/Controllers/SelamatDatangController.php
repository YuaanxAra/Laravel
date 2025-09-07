<?php

// In app/Http/Controllers/SelamatDatangController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class SelamatDatangController extends Controller
{
    public function index(): View
    {
        return view('selamat-datang');
    }
}