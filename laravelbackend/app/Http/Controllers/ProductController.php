<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ProductController;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return Product::all(); 
    }
    public function productPage(Request $request)
    {
       $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'required|string',
        ]);

        $product = Product::create($validated);
        return response()->json(['message' => 'Product created successfully!', 'product' => $product], 201);
    }
    // public function show($id)
    // {
    //     return Product::findOrFail($id);
    // }
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'required|string',
        ]);
      
        $product->update([
            'name' => $request->input('name'),
            'price' => $request->input('price'),
            'description' => $request->input('description'),
        ]);
        // dd($product);
        return response()->json(['message' => 'Product updated Successful', 'product'=>$product], 201);
    
    }
    
    public function destroy($id)
    {
        Product::destroy($id);
        return response()->json(['message' => 'Product are delete']);
    }
    
}
