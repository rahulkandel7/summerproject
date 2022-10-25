<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = DB::table('blogs')->select('*')->paginate(20);
        return view('admin.blogs.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.blogs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string',
            'image' => ['required', 'image', 'mimes:jpeg,png,jpg', 'max:3048'],
            'body' => 'required',
            'isPublished' => ['required', 'boolean'],
        ]);

        $data['isPublished'] = $request->isPublished == "0" ? false : true;

        if($request->has('image')){
            $fname = Str::random(20);
            $fexe = $request->file('image')->extension();
            $fpath = "$fname.$fexe";

            $request->file('image')->storeAs('blogs', $fpath, ['disk' => 'my']); 

            $data['image'] = 'blogs/'.$fpath;
        }

        Blog::create($data);

        return redirect(route('admin.blogs.index'))->with('sucess', 'Blog Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        return view('admin.blogs.show', compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        return view('admin.blogs.edit', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
        $data = $request->validate([
            'title' => 'nullable|string',
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg', 'max:3048'],
            'body' => 'nullable',
            'isPublished' => ['nullable', 'boolean'],
        ]);

        $data['isPublished'] = $request->isPublished == "0" ? false : true;

        if($request->has('image')){
            $fname = Str::random(20);
            $fexe = $request->file('image')->extension();
            $fpath = "$fname.$fexe";

            $request->file('image')->storeAs('blogs', $fpath, ['disk' => 'my']); 

            if($blog->image){
                Storage::disk('my')->delete('blogs/'.$blog->image);
            }

            $data['image'] = 'blogs/'.$fpath;
        }

        $blog->update($data);

        return redirect(route('admin.blogs.index'))->with('sucess', 'Blog Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        Storage::disk('my')->delete('blogs/'.$blog->image);
        $blog->delete();

        return redirect(route('admin.blogs.index'))->with('delete', 'Blog has been Deleted');
    }
}
