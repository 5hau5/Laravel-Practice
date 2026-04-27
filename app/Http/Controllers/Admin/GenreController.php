<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Genre;

class GenreController extends Controller
{
    public function index() {

        $genres = Genre::paginate(5);

        return view('admin.genres', compact('genres'));
    }
}
