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
}