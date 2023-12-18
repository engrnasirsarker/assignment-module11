<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'name' => 'required',
            'qty' => 'required',
            'price' => 'required',
        ]);
        Product::insert([
            'name' => $request->name,
            'quantity' => $request->qty,
            'price' => $request->price
        ]);        
        return redirect()->route('product.index')
                    ->with('success', 'Product added successfully.');
    }

   
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product, $id)
    {
        $product = Product::find($id);
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product, $id)
    {
        $request->validate([
            'name' => 'required',
            'qty' => 'required',
            'price' => 'required',
        ]);
        DB::table('products')->where('id',$id)->update([
            'name' => $request->name,
            'quantity' => $request->qty,
            'price' => $request->price
        ]);
        return redirect()->route('product.index')
                    ->with('success', 'Product update successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product, $id)
    {
        Product::find($id)->delete();
        return redirect()->route('product.index')
                    ->with('success', 'Product delete successfully.');
    }
}
