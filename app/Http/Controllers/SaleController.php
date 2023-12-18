<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Product;
use DB;
class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transactions = DB::table('transactions')
                        ->join('products', 'transactions.product_id', '=', 'products.id')
                        ->select('transactions.*', 'products.name')
                        ->get();
        return view('sales.index', compact('transactions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $products = Product::all();
        return view('sales.create', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required',
            'product_id' => 'required',
            'qty' => 'required',
            'unit_price' => 'required',
        ]);
        DB::table('transactions')->insert([
            'date' => $request->date,
            'type' => 'sale',
            'product_id' => $request->product_id,
            'quantity' => $request->qty,
            'unit_price' => $request->unit_price,
            'total' => $request->unit_price * $request->qty

        ]);    
        $product = DB::table('products')
                        ->where('id',$request->product_id)
                        ->first();
        DB::table('products')->where('id',$request->product_id)->update([
            'quantity' => $product->quantity - $request->qty
        ]);

        return redirect()->route('sale.index')
                    ->with('success', 'Product sale successfully.');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {   
        $transaction = DB::table('transactions')
                            ->where('id',$id)
                            ->first();
                            
        $product = DB::table('products')
                    ->where('id',$transaction->product_id)
                    ->first();

        DB::table('products')->where('id',$transaction->product_id)->update([
            'quantity' => $product->quantity + $transaction->quantity
        ]);
        DB::table('transactions')->where('id',$id)->delete();
                            
        return redirect()->route('sale.index')->with('success','Sale deleted successfully');
    }
}
