<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::all();
        $no = 0;
        return view('dashboard.slider.index', compact('sliders', 'no'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.slider.create');
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
                'title' => 'required|max:15',
                'caption' => 'required|max:25',
                'image' => 'required|mimes:png,jpg,jpeg',
            ],
            [
                'title.required' => 'Judul harus di isi, max. 15 Karakter',
                'caption.required' => 'caption harus di isi, max. 25 karakter',
                'image.required' => 'format image png/jpg',
            ]
        );
        $file_name = time() . '_' . $request->image->getClientOriginalName();
        $image = $request->image->storeAs('slider', $file_name);

        Slider::create([
            'user_id' => auth()->user()->id,
            'title'   => $request->title,
            'caption' => $request->caption,
            'image'   => $image,
            'link'    => $request->link,
        ]);

        return redirect('dashboard/slider')->with('message', 'Data berhasil ditambahkan');
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
    public function edit(Slider $slider)
    {
        return view('dashboard.slider.update', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Slider $slider)
    {
        $validated = $this->validate(
            $request,
            [
                'title' => 'required|max:15',
                'caption' => 'required|max:25',
                'image' => 'sometimes|nullable|mimes:png,jpg,jpeg',
            ],
            [
                'title.required' => 'Judul harus di isi, max. 15 Karakter',
                'caption.required' => 'caption harus di isi, max. 25 karakter',
                // 'image.required' => 'format image png/jpg',
            ]
        );

        if ($request->hasFile('image')) {
            $file_name = $slider->image;
            Storage::delete($file_name);

            $file_name = time() . '_' . $request->image->getClientOriginalName();
            $image = $request->image->storeAs('slider', $file_name);

            $slider->update([
                'user_id' => auth()->user()->id,
                'title'   => $request->title,
                'caption' => $request->caption,
                'image'   => $image,
                'link'    => $request->link,
            ]);
        } else {
            $slider->update([
                'user_id' => auth()->user()->id,
                'title'   => $request->title,
                'caption' => $request->caption,
                'image'   => $slider->image,
                'link'    => $request->link,
            ]);
        }

        return redirect('dashboard/slider')->with('message', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slider $slider)
    {
        $file_name = $slider->image;
        Storage::delete($file_name);

        $slider->delete();

        return redirect('dashboard/slider')->with('message', 'Data berhasil dihapus');
    }
}
