<?php

namespace App\Http\Controllers;

use App\Models\Info;
use App\Models\Post;
use App\Models\Video;
use App\Models\Config;
use App\Models\Slider;
use App\Models\Service;
use App\Models\Category;
use App\Models\Infographic;
use Illuminate\Http\Request;

class ConfigController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $configs = Config::where('id', 1)->get();
        return view('dashboard.config.index', compact('configs'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $configs   = Config::where('id', 1)->get();
        $sliders   = Slider::all();
        $services  = Service::limit('6')->get();
        $videos    = Video::all();
        $infos     = Info::limit('5')->get();
        $infographics = Infographic::all();
        $categories   = Category::where(['parent_id' => 0])->orderBy('sort_order', 'ASC')->get();
        $child_menus  = Category::where('parent_id', '!=', 0)->get();

        $post_kantor  = Post::where('category_id', 1)->limit('4')->get();
        $post_kua     = Post::where('category_id', 2)->limit('4')->get();
        $post_madrasah   = Post::where('category_id', 3)->limit('4')->get();

        return view(
            'welcome',
            compact(
                'configs',
                'sliders',
                'infos',
                'infographics',
                'post_kantor',
                'post_kua',
                'categories',
                'child_menus',
                'post_madrasah',
                'services',
                'videos'
            )
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Config $config)
    {
        if ($request->hasFile('logo')) {
            $file_name = time() . '_' . $request->logo->getClientOriginalName();
            $logo = $request->logo->storeAs('thumbnail', $file_name);

            $config->update([
                'logo'          => $logo,
                'footer_text'   => $request->footer_text,
                'ministry_name' => $request->ministry_name,
                'phone'         => $request->phone,
                'email'         => $request->email,
                'address'       => $request->address,
                'long'          => $request->long,
                'lat'           => $request->lat,
                'copyright'     => $request->copyright,

            ]);
        } else {
            $config->update([
                'footer_text'   => $request->footer_text,
                'ministry_name' => $request->ministry_name,
                'phone'         => $request->phone,
                'email'         => $request->email,
                'address'       => $request->address,
                'long'          => $request->long,
                'lat'           => $request->lat,
                'copyright'     => $request->copyright,

            ]);
        }

        return redirect('dashboard/config')->with('message', 'Data berhasil diubah');
    }

    public function home()
    {
        $configs = Config::where('id', 1)->get();
        return view('view.layouts.front', compact('configs'));
    }
}
