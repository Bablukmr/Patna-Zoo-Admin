<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index()
    {
        $gallery = Gallery::orderBy('id', 'asc')->get();
        return view('gallery.index', compact('gallery'));
    }
    public function showgallery($id)
{
    $gallery = Gallery::findOrFail($id);
    return view('gallery.showgallery', compact('gallery'));
}
}
