<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $goods = Movie::where('is_good', 1)->orderBy('id', 'desc')->limit(6)->get();
        $smalls = Movie::where('is_small', 1)->orderBy('id', 'desc')->limit(2)->get();
        $banners = Movie::where('is_banner', 1)->orderBy('id', 'desc')->limit(4)->get();

        return view('index.index', compact('goods', 'smalls', 'banners'));
    }
}
