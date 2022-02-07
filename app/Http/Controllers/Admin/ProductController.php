<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('dashboard.admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.admin.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate user input data
        $productValidated = $request->validate([
            'title' => 'required',
            'description' => 'required|min:20|max:200',
            'stock' => 'numeric',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            //'image' => 'image',
        ]);

        //create new product and view response for user
        $product = Product::create(array_merge($productValidated));
        if($request->has('image')){
            $product->addMedia($request->image)->toMediaCollection();
        }
        if($product){
            return redirect()->route('admin.products.index')->with('success', 'added successfully');
        }else{
            return redirect()->back()->with('fail', 'Something went wrong');
        }
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
    public function edit(Product $product)
    {
        return view('dashboard.admin.products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //validate user input data
        $productValidated = $request->validate([
            'title' => 'required',
            'description' => 'required|min:20|max:200',
            'stock' => 'numeric',
        ]);

        //update product and view response for user
        if($product->update(array_merge($productValidated))){
            return redirect()->route('admin.products.index');
        }else{
            return redirect()->back()->with('fail', 'Something went wrong');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        if($product->delete()){
            return redirect()->back()->with('success', 'deleted successfully');
        }else{
            return redirect()->back()->with('fail', 'Something went wrong');
        }
    }
}
