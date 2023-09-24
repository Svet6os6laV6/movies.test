<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class ApiMoviesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Movie::all();
    }

    public function show(string $id)
    {
        return Movie::findOrFail($id);
    }

}
