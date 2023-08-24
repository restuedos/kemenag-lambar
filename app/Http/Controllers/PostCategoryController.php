<?php

namespace App\Http\Controllers;

use App\Models\PostCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = PostCategory::orderBy('category_id', 'DESC')->get();
        $no = 0;
        return view('dashboard.category.index', compact('categories', 'no'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.category.create');
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
                'name' => 'required|max:255',
            ],
            [
                'name.required' => 'Kategori harus di isi',
            ]
        );

        PostCategory::create([
            'name' => $request->name,
        ]);

        return redirect('dashboard/category')->with('message', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(PostCategory $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(PostCategory $category)
    {
        return view('dashboard.category.update', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PostCategory $category)
    {
        $validated = $this->validate(
            $request,
            [
                'name' => 'required|max:255',
            ],
            [
                'name.required' => 'Kategori harus di isi',
            ]
        );

        $category->update([
            'name' => $request->name,
        ]);

        return redirect('dashboard/category')->with('message', 'Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(PostCategory $category)
    {
        $category->delete();

        return redirect('dashboard/category')->with('message', 'Data berhasil dihapus');
    }
}
