<?php

namespace App\Http\Controllers\Admin;

use Devrabiul\ToastMagic\Facades\ToastMagic;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Genre;

class GenreController extends Controller
{
    public function list(request $request) {
        $request->validate([
            'search' => 'nullable|string|max:255'
        ]);

        if ($request->has('search')) {
            $search = $request->input('search');
            $genres = Genre::where('name', 'like', '%' . $search . '%')
                ->paginate(5);
        } else {
            $genres = Genre::paginate(5);
        }

        return view('admin.genres.list', compact('genres'));
    }

    public function create() {
        return view('admin.genres.create');
    }

    public function store(Request $request) {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string'
        ]);

        Genre::createGenre($data);

        ToastMagic::success('Genre created successfully.'); 

        return redirect()->route('genres.index')->with('success', 'Genre created successfully.');
    }

    public function show($id) {
        $genre = Genre::findOrFail($id);
        return view('admin.genres.show', compact('genre'));
    }

    public function edit($id) {
        $genre = Genre::findOrFail($id);
        return view('admin.genres.edit', compact('genre'));
    }

    public function update(Request $request, $id) {
        $genre = Genre::findOrFail($id);

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string'
        ]);

        $genre->updateGenre($genre, $data);

        ToastMagic::success('Genre ' . $genre->name . ' updated successfully.');

        return redirect()->route('genres.index')->with('success', 'Genre updated successfully.');
    }

    public function destroy(Request $request, $id) {
        $request->validate([
            'id' => 'required|integer|exists:genres,id'
        ]);
        
        $genre = Genre::findOrFail($id);
        $genre->delete();

        ToastMagic::success('Genre ' . $genre->name . ' deleted successfully.');

        return redirect()->route('genres.index')->with('success', 'Genre deleted successfully.');
    }
}
