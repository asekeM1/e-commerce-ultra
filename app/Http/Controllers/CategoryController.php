<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Categories::latest()->get();
        return view('admin.category.allCategories', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.category.addCategory');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_name' => 'required|unique:category'
        ]);

        Categories::insert([
            'category_name' => $request->category_name,
            'slug' => strtolower(str_replace(' ', '-', $request->category_name)),
        ]);

        return redirect()->route('all-categories')->with('message', 'Категория была добавлена успешно!');
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
        $category = Categories::findOrFail($id);
        return view('admin.category.editCategory', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $category_id = $request->category_id;

        $request->validate([
            'category_name' => 'required|unique:category'
        ]);
        Categories::findOrFail($category_id)->update([
            'category_name' => $request->category_name,
            'slug' => strtolower(str_replace(' ', '-', $request->category_name)),
        ]);
        return redirect()->route('all-categories')->with('message', 'Категория была обновлена успешно!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Categories::findOrFail($id)->delete();

        return redirect()->route('all-categories')->with('message', 'Категория была удалена успешно!');
    }
}
