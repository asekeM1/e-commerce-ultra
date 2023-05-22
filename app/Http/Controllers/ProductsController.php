<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::latest()->get();
        return view('admin.products.allProducts', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Categories::latest()->get();
        $subcategories = SubCategory::latest()->get();
        return view('admin.products.addProduct', compact('categories', 'subcategories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
//        Validation
        $request->validate([
            'product_name' => 'required|unique:products',
            'product_price' => 'required',
            'product_qty' => 'required|',
            'product_short_desc' => 'required',
            'product_category_id' => 'required|',
            'product_subcategory_id' => 'required',
        ]);

        if(isset($request->product_img)){
            $image = $request->file('product_img');
            $img_name = hexdec(uniqid()).'.'. $image->getClientOriginalExtension();
            $request->product_img->move(public_path('upload'), $img_name);
            $img_url = 'upload/' . $img_name;
        }
        $img_url = 'none';

        $category_id = $request->product_category_id;
        $subcategory_id = $request->product_subcategory_id;

        $category_name = Categories::where('id', $category_id)->value('category_name');
        $subcategory_name = SubCategory::where('id', $subcategory_id)->value('subcategory_name');

        Product::insert([
            'product_name' => $request->product_name,
            'product_short_desc' => $request->product_short_desc,
            'product_long_desc' => $request->product_long_desc,
            'product_price' => $request->product_price,
            'product_qty' => $request->product_qty,
            'product_category_name' => $category_name,
            'product_subcategory_name' => $subcategory_name,
            'product_category_id' => $request->product_category_id,
            'product_subcategory_id' => $request->product_subcategory_id,
            'product_img' => $img_url,
            'slug' => strtolower(str_replace(' ', '-', $request->subcategory_name)),
        ]);

        Categories::where('id', $category_id)->increment('product_count', 1);
        SubCategory::where('id', $subcategory_id)->increment('product_count', 1);

        return redirect()->route('all-products')->with('message', 'Продукт был успешно добавлен!');
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
        $product = Product::findOrFail($id);

        return view('admin.products.editProduct', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $productId = $request->id;

        $request->validate([
            'product_name' => 'required|unique:products',
        ]);

        Product::findOrFail($productId)->update([
            'product_name' => $request->product_name,
            'product_short_desc' => $request->product_short_desc,
            'product_long_desc' => $request->product_long_desc,
            'product_price' => $request->product_price,
            'product_qty' => $request->product_qty,
            'slug' => strtolower(str_replace(' ', '-', $request->subcategory_name)),
        ]);
        return redirect()->route('all-products')->with('message', 'Продукт был успешно обновлен!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Product::findOrFail($id)->delete();

        $cat_id = Product::where('id', $id)->value('product_category_id');
        $subcat_id = Product::where('id', $id)->value('product_subcategory_id');

        Categories::where('id', $cat_id)->decrement('product_count', 1);
        SubCategory::where('id', $subcat_id)->decrement('product_count', 1);

        return redirect()->route('all-products')->with('message', 'Продукт был успешно удален!');
    }
}
