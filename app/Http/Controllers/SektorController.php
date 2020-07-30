<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Sektor;
use Illuminate\Http\Request;

class SektorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $sektors = Sektor::orderBy('id','desc')->paginate(3);
        return view('sektors.index')->withSektors($sektors);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sektors = Sektor::all();
        return view('sektors.create')->withSektors($sektors);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' =>'required',
        ]);

        $sektors = new Sektor();
        $sektors->name = $request->name;
        $sektors->save();
        return back()->withInfo('Sektor baru sudah dibuat!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categories = Category::paginate(4);
        $sektors = Sektor::paginate(4);
        $sektors2 = Sektor::find($id);
        $posts = Post::orderBy('id','asc');
        return view('sektors.show')->withSektors($sektors)->withPosts($posts)->withCategories($categories)->withSektors2($sektors2);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        request()->validate([
            'name' => 'required',
        ]);

        $sektors = Sektor::find($id);
        $sektors->name = $request->name;

        $sektors->save();

        return back()->withInfo('Sektor sudah diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Sektors = Sektor::find($id);

        $Sektors->delete();

        return back()->withInfo('Kategori telah dihapus!');
    }
}
