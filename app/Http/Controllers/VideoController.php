<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $videos = Video::all();
        $no = 0;
        return view('dashboard.video.index', compact('videos', 'no'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.video.create');
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
                'title'   => 'required|max:25',
                'caption' => 'required|max:35',
                'image'   => 'required|mimes:png,jpg,jpeg|max:1000',
            ],
            [
                'title.required'   => 'Judul harus di isi, max. 15 Karakter',
                'caption.required' => 'caption harus di isi, max. 25 karakter',
                'image.required'   => 'format image png/jpg, max size 1 Mb',
            ]
        );
        $file_name = time() . '_' . $request->image->getClientOriginalName();
        $image = $request->image->storeAs('video', $file_name);

        Video::create([
            'user_id' => auth()->user()->id,
            'title'   => $request->title,
            'caption' => $request->caption,
            'image'   => $image,
            'link'    => $request->link,
        ]);

        return redirect('dashboard/video')->with('message', 'Data berhasil ditambahkan');
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
    public function edit(Video $video)
    {
        return view('dashboard.video.update', compact('video'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Video $video)
    {
        $validated = $this->validate(
            $request,
            [
                'title' => 'required|max:25',
                'caption' => 'required|max:35',
                'image' => 'sometimes|nullable|mimes:png,jpg,jpeg|max:1000',
            ],
            [
                'title.required' => 'Judul harus di isi, max. 15 Karakter',
                'caption.required' => 'caption harus di isi, max. 25 karakter',
                // 'image.required' => 'format image png/jpg, max size 1 Mb',
            ]
        );

        if ($request->hasFile('image')) {

            $file_name = $video->image;
            Storage::delete($file_name);

            $file_name = time() . '_' . $request->image->getClientOriginalName();
            $image = $request->image->storeAs('video', $file_name);
            
            $video->update([
                'user_id' => auth()->user()->id,
                'title'   => $request->title,
                'caption' => $request->caption,
                'image'   => $image,
                'link'    => $request->link,
            ]);
        } else {
            $video->update([
                'user_id' => auth()->user()->id,
                'title'   => $request->title,
                'caption' => $request->caption,
                'image'   => $video->image,
                'link'    => $request->link,
            ]);
        }

        

        return redirect('dashboard/video')->with('message', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Video $video)
    {
        $file_name = $video->image;
        Storage::delete($file_name);

        $video->delete();

        return redirect('dashboard/video')->with('message', 'Data berhasil dihapus');
    }
}
