<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreGenre;
use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $genres = Genre::paginate(15);
        return view('admin.genres.index', compact('genres'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.genres.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGenre $request)
    {
        Genre::create($request->all());
        return redirect()->route('genres.index')->with('success', 'Жанр добавлен');
    }

    public function edit(string $id)
    {
        $genre = Genre::find($id);
        return view('admin.genres.edit', compact('genre'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name'=>'required',
        ]);
        $genre = Genre::find($id);
        $genre->update(request()->all());
        return redirect()->route('genres.index')->with('success', 'Изменения сохранены');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $genre = Genre::find($id);
        $genre->delete();
        return redirect()->route('genres.index')->with('success', 'Жанр удален');
    }
}
