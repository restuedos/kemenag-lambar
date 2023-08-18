<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Post;
use App\Models\Config;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = Page::orderBy('id', 'DESC')->get();
        $no = 0;
        return view('dashboard.page.index', compact('pages', 'no'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.page.create');
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

        Page::create([
            'user_id' => auth()->user()->id,
            'title'   => $request->title,
            'slug'   => str_slug($request->title),
            'body'   => $request->body,
            'image'   => $image,
        ]);

        return redirect('dashboard/page')->with('message', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Page $page)
    {
        $configs      = Config::where('id', 1)->get();
        $categories   = Category::where(['parent_id' => 0])->orderBy('sort_order', 'ASC')->get();
        $child_menus  = Category::where('parent_id', '!=', 0)->get();
        $posts        = Post::limit('3')->get();

        return view('detail_page', compact('page', 'posts', 'configs', 'categories', 'child_menus'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Page $page)
    {
        return view('dashboard.page.update', compact('page'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Page $page)
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

            $page->update([
                'user_id' => auth()->user()->id,
                'title'   => $request->title,
                'slug'   => str_slug($request->title),
                'body'   => $request->body,
                'image'   => $image,
            ]);
        } else {
            $page->update([
                'user_id' => auth()->user()->id,
                'title'   => $request->title,
                'slug'   => str_slug($request->title),
                'body'   => $request->body,
                'image'   => $page->image,
            ]);
        }

        return redirect('dashboard/page')->with('message', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Page $page)
    {
        $file_name = $page->image;
        Storage::delete($file_name);

        $page->delete();

        return redirect('dashboard/page')->with('message', 'Data berhasil dihapus');
    }
}
