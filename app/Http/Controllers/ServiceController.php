<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::all();
        $no = 0;
        return view('dashboard.service.index', compact('services', 'no'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.service.create');
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
                // 'caption' => 'required|max:35',
                // 'image'   => 'required|mimes:png,jpg,jpeg',
            ],
            [
                'title.required'   => 'Judul harus di isi, max. 15 Karakter',
                // 'caption.required' => 'caption harus di isi, max. 25 karakter',
                // 'image.required'   => 'format image png/jpg',
            ]
        );

        if ($request->hasFile('image')) {
            $file_name = time() . '_' . $request->image->getClientOriginalName();
            $image = $request->image->storeAs('service', $file_name);

            Service::create([
                'user_id' => auth()->user()->id,
                'title'   => $request->title,
                'caption' => $request->caption,
                'image'   => $image,
                'link'    => $request->link,
            ]);
        } else {
            Service::create([
                'user_id' => auth()->user()->id,
                'title'   => $request->title,
                'caption' => $request->caption,
                'image'   => null,
                'link'    => $request->link,
            ]);
        }

        return redirect('dashboard/service')->with('message', 'Data berhasil ditambahkan');
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
    public function edit(Service $service)
    {
        return view('dashboard.service.update', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
        $validated = $this->validate(
            $request,
            [
                'title' => 'required|max:25',
                // 'caption' => 'required|max:35',
                // 'image' => 'sometimes|nullable|mimes:png,jpg,jpeg',
            ],
            [
                'title.required' => 'Judul harus di isi, max. 15 Karakter',
                // 'caption.required' => 'caption harus di isi, max. 25 karakter',
                // 'image.required' => 'format image png/jpg',
            ]
        );

        if ($request->hasFile('image')) {
            $file_name = $service->image;
            Storage::delete($file_name);

            $file_name = time() . '_' . $request->image->getClientOriginalName();
            $image = $request->image->storeAs('service', $file_name);

            $service->update([
                'user_id' => auth()->user()->id,
                'title'   => $request->title,
                'caption' => $request->caption,
                'image'   => $image,
                'link'    => $request->link,
            ]);
        } else {
            $service->update([
                'user_id' => auth()->user()->id,
                'title'   => $request->title,
                'caption' => $request->caption,
                'image'   => $service->image,
                'link'    => $request->link,
            ]);
        }

        return redirect('dashboard/service')->with('message', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        $file_name = $service->image;
        Storage::delete($file_name);

        $service->delete();

        return redirect('dashboard/service')->with('message', 'Data berhasil dihapus');
    }
}
