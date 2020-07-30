<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $q = $request->input('search');
        $posts = Post::where('title','LIKE','%' .$q. '%')->get();
        // dd($q);
        return view('search.result',['posts' => $posts]);
    }
}
