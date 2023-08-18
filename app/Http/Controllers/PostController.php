<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Config;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('id', 'DESC')->get();
        $no = 0;
        return view('dashboard.post.index', compact('posts', 'no'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('dashboard.post.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $this->validate(
            $request,
            [
                'title' => 'required|max:255',
                'body' => 'required',
                'image' => 'required|mimes:png,jpg,jpeg|max:500',
            ],
            [
                'title.required' => 'Judul harus di isi',
                'body.required' => 'Deskripsi harus di isi',
                'image.required' => 'format image png/jpg, max size 500 Kb',
            ]
        );
        $file_name = time() . '_' . $request->image->getClientOriginalName();
        $image = $request->image->storeAs('thumbnail', $file_name);

        Post::create([
            'user_id' => auth()->user()->id,
            'category_id'   => $request->category_id,
            'title'   => $request->title,
            'slug'   => str_slug($request->title),
            'body'   => $request->body,
            'image'   => $image,
            'status'   => $request->status,
        ]);

        return redirect('dashboard/post')->with('message', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $configs      = Config::where('id', 1)->get();
        $categories   = Category::where(['parent_id' => 0])->orderBy('sort_order', 'ASC')->get();
        $child_menus  = Category::where('parent_id', '!=', 0)->get();
        $posts        = Post::where('id', '!=', $post)->limit('3')->get();
        return view('detail', compact('post', 'posts', 'configs', 'categories', 'child_menus'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::all();
        return view('dashboard.post.update', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $validated = $this->validate(
            $request,
            [
                'title' => 'required|max:255',
                'body' => 'required',
                'image' => 'sometimes|nullable|mimes:png,jpg,jpeg|max:500',
            ],
            [
                'title.required' => 'Judul harus di isi',
                'body.required' => 'Deskripsi harus di isi',
                // 'image.required' => 'format image png/jpg, max size 500 Kb',
            ]
        );

        if ($request->hasFile('image')) {
            $file_name = time() . '_' . $request->image->getClientOriginalName();
            $image = $request->image->storeAs('thumbnail', $file_name);

            $post->update([
                'user_id'      => auth()->user()->id,
                'category_id'  => $request->category_id,
                'title'        => $request->title,
                'slug'         => str_slug($request->title),
                'body'         => $request->body,
                'image'        => $image,
                'status'       => $request->status,
            ]);
        } else {
            $post->update([
                'user_id'      => auth()->user()->id,
                'category_id'  => $request->category_id,
                'title'        => $request->title,
                'slug'         => str_slug($request->title),
                'body'         => $request->body,
                'image'        => $post->image,
                'status'       => $request->status,
            ]);
        }

        return redirect('dashboard/post')->with('message', 'Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(POST $post)
    {
        $file_name = $post->image;
        Storage::delete($file_name);

        $post->delete();

        return redirect('dashboard/post')->with('message', 'Data berhasil dihapus');
    }

    public function all(Request $request)
    {
        $posts          = Post::paginate(8);
        $configs        = Config::where('id', 1)->get();
        $categories     = Category::where(['parent_id' => 0])->orderBy('sort_order', 'ASC')->get();
        $child_menus    = Category::where('parent_id', '!=', 0)->get();

        return view('dashboard.post.all', compact('posts', 'configs', 'categories', 'child_menus'));
    }
}
