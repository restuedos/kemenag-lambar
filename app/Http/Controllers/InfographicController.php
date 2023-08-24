<?php

namespace App\Http\Controllers;

use App\Models\Infographic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class InfographicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $infographics = Infographic::all();
        $no = 0;
        return view('dashboard.infographic.index', compact('infographics', 'no'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.infographic.create');
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
                'image' => 'required|mimes:png,jpg,jpeg',
            ],
            [
                'title.required' => 'Judul harus di isi',
            ]
        );
        $file_name = time() . '_' . $request->image->getClientOriginalName();
        $image = $request->image->storeAs('thumbnail', $file_name);

        Infographic::create([
            'user_id' => auth()->user()->id,
            'title'   => $request->title,
            'image'   => $image,
        ]);

        return redirect('dashboard/infographic')->with('message', 'Data berhasil ditambahkan');
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
    public function edit(Infographic $infographic)
    {
        return view('dashboard.infographic.update', compact('infographic'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Infographic $infographic)
    {
        $validated = $this->validate(
            $request,
            [
                'title' => 'required|max:255',
                'image' => 'sometimes|nullable|mimes:png,jpg,jpeg',
            ],
            [
                'title.required' => 'Judul harus di isi',
                // 'image.required' => 'format image png/jpg',
            ]
        );

        if ($request->hasFile('image')) {
            $file_name = $infographic->image;
            Storage::delete($file_name);

            $file_name = time() . '_' . $request->image->getClientOriginalName();
            $image = $request->image->storeAs('thumbnail', $file_name);

            $infographic->update([
                'user_id' => auth()->user()->id,
                'title'   => $request->title,
                'image'   => $image,
            ]);
        } else {
            $infographic->update([
                'user_id' => auth()->user()->id,
                'title'   => $request->title,
                'image'   => $infographic->image,
            ]);
        }

        return redirect('dashboard/infographic')->with('message', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Infographic $infographic)
    {
        $file_name = $infographic->image;
        Storage::delete($file_name);

        $infographic->delete();

        return redirect('dashboard/infographic')->with('message', 'Data berhasil dihapus');
    }
}
