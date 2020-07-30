<?php

namespace App\Http\Controllers;

use App\Category;
use App\Member;
use App\Post;
use App\Sektor;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Self_;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::orderBy('id','desc')->paginate(3);
        $sektors = Sektor::orderBy('id','desc')->paginate(3);
        $posts = Post::latest()->paginate(5);
        return view('post.index')->withPosts($posts)->withSektors($sektors)->withCategories($categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $posts = Post::paginate(10);
        $sektors = Sektor::all();
        $categories = Category::all();
        $members = Member::all();
        return view('post.create')->withPosts($posts)->withCategories($categories)->withSektors($sektors)->withMembers($members);
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
            'title' => 'required|min:5|unique:posts',
            'content' => 'required',
            'category_id' =>'required',
            'sektors' => 'required',
            'member_id' => 'required',
            'image' => 'required|image|mimes:png,jpg,jpeg,gif,svg|max:2048',
        ]);
        $posts = new Post;
        $posts->title=$request->title;
        $posts->slug= Str::slug($posts->title);
        $posts->content=$request->content;
        $posts->category_id = $request->category_id;
        $posts->member_id = $request->member_id;
        if($request->hasFile('image')){
            $file = $request->file('image');
            $fileName = time().'.'.$file->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $file->move($destinationPath, $fileName);
            $posts->image = $fileName;
        }


        $posts->save();
        $posts->sektors()->sync($request->sektors);
        return back()->withInfo('Berhasil membuat post');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $categories = Category::orderBy('id','desc')->paginate(3);
        $sektors = Sektor::orderBy('id','desc')->paginate(3);
        $posts = Post::where('slug','=',$slug)->first();
        return view ('post.show')->withPosts($posts)->withCategories($categories)->withSektors($sektors);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sektors = Sektor::all();
        $categories = Category::all();
        $posts = Post::find($id);
        return view('post.edit')->withPosts($posts)->withCategories($categories)->withSektors($sektors);
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
        $request->validate([
            'title' => 'required|min:5',
            'content' => 'required',
            'category_id' =>'required',
            'sektors' => 'required',
            'member' => 'required',
            'image' => 'required|image|mimes:png,jpg,jpeg,gif,svg|max:2048',
        ]);
        $posts = Post::find($id);
        $posts->title=$request->title;
        $posts->content=$request->content;
        $posts->category_id = $request->category_id;
        $posts->member_id = $request->member_id;
        if($request->hasFile('image')){
            $file = $request->file('image');
            $fileName = time().'.'.$file->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $file->move($destinationPath, $fileName);

            $oldFilename = $posts->image;
            \Storage::delete($oldFilename);
            $posts->image = $fileName;
        }
        $posts->save();
        $posts->sektors()->sync($request->sektors);
        return back()->withInfo('Berhasil mengubah post');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $posts = Post::find($id);
        Storage::delete([$posts->image]);
        $posts->sektors()->detach();
        $posts->delete();
        return back()->withInfo("Berhasil Dihapus");
    }
}
