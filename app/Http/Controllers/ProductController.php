<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $products = Product::All();
        return view('products.index')->with(['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        $product = new Product;
        $product -> name = $request -> name;
        $product -> price = $request -> price;
        $product -> description = $request -> description;
        $product -> available = $request -> available;

        if ($product -> save()){
            return redirect('products')->with('messages', 'El producto: ' . $product->name . '¡Fue creado!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return ['product' => $product];
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, Product $product)
    {
        $product -> name = $request -> name;
        $product -> price = $request -> price;
        $product -> description = $request -> description;
        $product -> available = $request -> available;

        if ($product -> save()){
            return redirect('products')->with('messages', 'El prducto: ' . $product->name . '¡Fue actualizado!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        if ($product->delete()) {
            return redirect('products')->with('messages', 'El producto: ' . $product->name . '¡Fue eliminado!');
        }
    }
}
