<?php

namespace App\Http\Controllers;

use App\Models\Info;
use Illuminate\Http\Request;

class InfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $infos = Info::all();
        $no = 0;
        return view('dashboard.info.index', compact('infos', 'no'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.info.create');
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
                'link' => 'required|max:2000',
            ],
            [
                'title.required' => 'Judul harus di isi',
                'file_name.required' => 'Link harus di isi',
            ]
        );

        Info::create([
            'user_id' => auth()->user()->id,
            'title'   => $request->title,
            'link'    => $request->link,
        ]);

        return redirect('dashboard/info')->with('message', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Info $info)
    {
        return view('dashboard.info.update', compact('info'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Info $info)
    {
        $validated = $this->validate(
            $request,
            [
                'title' => 'required|max:255',
                'link'  => 'required|max:2000',
            ],
            [
                'title.required'     => 'Judul harus di isi',
                'file_name.required' => 'Link harus di isi',
            ]
        );
        $info->update([
            'user_id' => auth()->user()->id,
            'title'   => $request->title,
            'link'    => $request->link,
        ]);

        return redirect('dashboard/info')->with('message', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Info $info)
    {
        $info->delete();
        return redirect('dashboard/info')->with('message', 'Data berhasil dihapus');
    }
}
