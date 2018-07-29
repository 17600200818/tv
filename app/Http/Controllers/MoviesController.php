<?php

namespace App\Http\Controllers;

use App\Models\Movie;

class MoviesController extends Controller
{
    public function index()
    {
        $list = Movie::paginate();
        return view('movies.index', compact('list'));
    }

    public function show(Movie $movie)
    {
        $smallMovies = Movie::where('is_small', 1)->limit(3)->orderBy('id', 'desc')->get();
        return view('movies.show', compact('movie', 'smallMovies'));
    }
}
