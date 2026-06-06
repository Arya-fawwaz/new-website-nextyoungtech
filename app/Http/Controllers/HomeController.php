<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $ulasan = \App\Models\Ulasan::latest()->get();
        return view('home', compact('ulasan'));
    }

    public function services()
    {
        $services = \App\Models\Layanan::where('is_active', true)->orderBy('urutan')->get();
        return view('services', compact('services'));
    }

    public function features()
    {
        return view('features');
    }

    public function about()
    {
        return view('about');
    }

    public function portfolio()
    {
        return view('portfolio');
    }
}
