<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $files = File::all();
        $no = 0;
        return view('dashboard.file.index', compact('files', 'no'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.file.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate(
            [
                'title' => 'required|max:255',
                'file_name' => 'required|file|max:2000',
            ],
            [
                'title.required' => 'Judul harus di isi',
                'file_name.required' => 'format pdf, max size 1MB',
            ]
        );
        $file_name = time() . '_' . $request->file_name->getClientOriginalName();
        $file = $request->file_name->storeAs('file', $file_name);

        File::create([
            'user_id' => auth()->user()->id,
            'title'   => $request->title,
            'file_name'   => $file,
        ]);

        return redirect('dashboard/file')->with('message', 'Data berhasil ditambahkan');
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
    public function edit(File $file)
    {
        return view('dashboard.file.update', compact('file'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, File $file)
    {
        $validated = $request->validate(
            [
                'title' => 'required|max:255',
                'file_name' => 'sometimes|nullable|file|max:2000',
            ],
            [
                'title.required' => 'Judul harus di isi',
                // 'file_name.required' => 'format pdf, max size 1MB',
            ]
        );

        if ($request->hasFile('file_name')) {

            $file_name = $file->file_name;
            Storage::delete($file_name);

            $file_name = time() . '_' . $request->file_name->getClientOriginalName();
            $filename = $request->file_name->storeAs('file', $file_name);

            $file->update([
                'user_id' => auth()->user()->id,
                'title'   => $request->title,
                'file_name'   => $filename,
            ]);
        } else {
            $file->update([
                'user_id' => auth()->user()->id,
                'title'   => $request->title,
                'file_name'   => $file->file_name,
            ]);
        }

        return redirect('dashboard/file')->with('message', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(File $file)
    {
        $file_name = $file->file_name;
        Storage::delete($file_name);

        $file->delete();

        return redirect('dashboard/file')->with('message', 'Data berhasil dihapus');
    }
}
