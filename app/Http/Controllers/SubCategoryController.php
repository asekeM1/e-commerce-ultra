<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subcategory = SubCategory::latest()->get();
        return view('admin.categories.allSubCategories', compact('subcategory'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Categories::latest()->get();
        return view('admin.categories.addSubCategory', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'subcategory_name' => 'required|unique:sub_category',
            'category_id' => 'required'
        ]);

        $category_id = $request->category_id;

        $category_name = Categories::where('id', $category_id)->value('category_name');

        SubCategory::insert([
            'subcategory_name' => $request->subcategory_name,
            'slug' => strtolower(str_replace(' ', '-', $request->subcategory_name)),
            'category_id' => $category_id,
            'category_name' => $category_name,
        ]);

        Categories::where('id', $category_id)->increment('subcategory_count', 1);
        return redirect()->route('all-sub-categories')->with('message', 'Подкатегория была добавлена успешно!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $subcategory = SubCategory::findOrFail($id);
        return view('admin.categories.editSubCategory', compact('subcategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $request->validate([
            'subcategory_name' => 'required|unique:sub_category'
        ]);
        $subcategory_id = $request->subcategory_id;

        SubCategory::findOrFail($subcategory_id)->update([
            'subcategory_name' => $request->subcategory_name,
            'slug' => strtolower(str_replace(' ', '-', $request->subcategory_name)),
        ]);
        return redirect()->route('all-sub-categories')->with('message', 'Подкатегория была обновлена успешно!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        SubCategory::findOrFail($id)->delete();

        return redirect()->route('all-sub-categories')->with('message', 'Подкатегория была удалена успешно!');
    }
}
