<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd(Product::first()->user);
        // dd( Product::where('user_id', Auth::user()->id)->get());
        return view('toko', ['products' => Product::where('user_id', Auth::user()->id)->ready()->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product_create', ['categories' => Category::enabled()->get()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|min:4',
            'description' => 'required|min:8',
            'category_id' => 'required',
            'price' => 'required|max:16',
            'stock' => 'required',
            'image' => 'required'
        ]);

        $image = $request->file('image')->store('product-images');
        $validated['image'] = $image;

        $validated['user_id'] = Auth::user()->id;

        Product::create($validated);
        return redirect('/toko');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        // dd($product);
        return view('product_edit', ['product' => $product, 'categories' => Category::enabled()->get()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name' => 'required|min:4',
            'description' => 'required|min:8',
            'category_id' => 'required',
            'price' => 'required|max:16',
            'stock' => 'required',
        ]);

        $validated['image'] = $product->image;
        if ($request['image']) {
            $image = $request->file('image')->store('product-images');
            $validated['image'] = $image;
        }

        Product::where('id', $product['id'])->update($validated);
        return redirect('/toko');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        Product::where('id',$product->id)->update(['status' => 'archive']);
        return redirect('/toko');
    }
}
