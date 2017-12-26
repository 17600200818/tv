<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class MoviesController extends Controller
{
    public function index()
    {
        $list = Movie::paginate();
        return view('movies.index', compact('list'));
    }

    public function show(Movie $movie)
    {
//        $movie->cast = str_replace('&lt;br /&gt;　　　　　', ',', $movie->cast);
//        $movie->cast = str_replace('&amp;middot;', '·', $movie->cast);
//        $movie->introduction = str_replace('&amp;middot;', '·', $movie->introduction);
//        $movie->director = str_replace('&lt;br /&gt;　　　　　', ',', $movie->director);
//        $movie->director = str_replace('&amp;middot;', '·', $movie->director);
//        $movie->place = trim($movie->place, '　');
        return view('movies.show', compact('movie'));
    }
}
