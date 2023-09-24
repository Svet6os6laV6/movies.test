<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMovie;
use App\Models\Genre;
use App\Models\Movie;
use Illuminate\Http\Request;


class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $movies = Movie::with('genres')->paginate(15);
        return view('admin.movies.index', compact('movies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $genres = Genre::pluck('name', 'id')->all();
        return view('admin.movies.create', compact('genres'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMovie $request)
    {

        $data = $request->all();
        $movie = Movie::create($data);
        $movie->genres()->sync($request->genres);
        return redirect()->route('movies.index')->with('success', 'Фильм добавлен');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $movie = Movie::find($id);
        $genres = Genre::pluck('name', 'id')->all();
        return view('admin.movies.edit', compact('movie', 'genres'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'release_date' => 'required|date',
        ]);
        $movie = Movie::find($id);
        $movie->update(request()->all());
        $movie->genres()->sync($request->genres);
        return redirect()->route('movies.index')->with('success', 'Изменения сохранены');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $movie = Movie::find($id);
        $movie->delete();
        return redirect()->route('movies.index')->with('success', 'Фильм удален');
    }
}
