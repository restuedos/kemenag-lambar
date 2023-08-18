<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Category;
use DB;

class CategoryController extends Controller
{

    public function index(Request $request)
    {
        $info = [
            'categories' => Category::where(['parent_id' => 0])->orderBy('sort_order', 'ASC')->get(),
        ];

        return view('dashboard.category-subcategory.list', $info);
    }

    public function saveNestedCategories(Request $request)
    {

        $json = $request->nested_category_array;
        $decoded_json = json_decode($json, TRUE);

        $simplified_list = [];
        $this->recur1($decoded_json, $simplified_list);

        DB::beginTransaction();
        try {
            $info = [
                "success" => FALSE,
            ];

            foreach ($simplified_list as $k => $v) {
                $category = Category::find($v['category_id']);
                $category->fill([
                    "parent_id" => $v['parent_id'],
                    "sort_order" => $v['sort_order'],
                ]);

                $category->save();
            }

            DB::commit();
            $info['success'] = TRUE;
        } catch (\Exception $e) {
            DB::rollback();
            $info['success'] = FALSE;
        }

        if ($info['success']) {
            $request->session()->flash('success', "All Menus updated.");
        } else {
            $request->session()->flash('error', "Something went wrong while updating...");
        }

        return redirect(route('category-subcategory.list'));
    }

    public function recur1($nested_array = [], &$simplified_list = [])
    {

        static $counter = 0;

        foreach ($nested_array as $k => $v) {

            $sort_order = $k + 1;
            $simplified_list[] = [
                "category_id" => $v['id'],
                "parent_id" => 0,
                "sort_order" => $sort_order
            ];

            if (!empty($v["children"])) {
                $counter += 1;
                $this->recur2($v['children'], $simplified_list, $v['id']);
            }
        }
    }

    public function recur2($sub_nested_array = [], &$simplified_list = [], $parent_id = NULL)
    {

        static $counter = 0;

        foreach ($sub_nested_array as $k => $v) {

            $sort_order = $k + 1;
            $simplified_list[] = [
                "category_id" => $v['id'],
                "parent_id" => $parent_id,
                "sort_order" => $sort_order
            ];

            if (!empty($v["children"])) {
                $counter += 1;
                return $this->recur2($v['children'], $simplified_list, $v['id']);
            }
        }
    }

    public function create(Request $request)
    {
        $info = [
            'categories' => Category::orderBy('name', 'ASC')->get(),
        ];

        return view('dashboard.category-subcategory.create', $info);
    }

    public function store(Request $request)
    {
        $rules = [
            'name' => 'required',
            'parent_id' => 'nullable',
        ];

        $messages = [
            "name.required" => "Nama menu wajib di isi",
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        } else {
            DB::beginTransaction();
            try {
                $info = [
                    "success" => FALSE,
                ];
                $query = [
                    'name' => $request->name,
                    'parent_id' => (!empty($request->parent_id)) ? $request->parent_id : 0,
                    'url' => (!empty($request->url)) ? $request->url : "#",
                ];

                $category = Category::updateOrCreate(['category_id' => $request->category_id], $query);

                DB::commit();
                $info['success'] = TRUE;
            } catch (\Exception $e) {
                DB::rollback();
                $info['success'] = FALSE;
            }

            if (!$info['success']) {
                return redirect(route('category-subcategory.create'))->with('error', "Failed to save.");
            }

            return redirect(route('category-subcategory.list', ['category_id' => $category->category_id]))->with('success', "Successfully saved.");
        }
    }

    public function edit(Request $request)
    {
        $info = [
            'categories' => Category::orderBy('name', 'ASC')->get(),
            'category'   => Category::find($request->category_id),
        ];

        return view('dashboard.category-subcategory.create', $info);
    }

    public function remove(Request $request)
    {
        $category = Category::find($request->category_id);
        $category->delete();

        return redirect(route('category-subcategory.list'))->with('success', "Menu removed successfully.");
    }
}
