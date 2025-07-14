<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Inertia\Inertia;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->get();
        return Inertia::render('Products/Index', ['products' => $products]);
    }

    public function create()
    {
        return Inertia::render('Products/Create');
    }

    public function store(Request $request)
    {
        $product = Product::create($request->all());
        return redirect()->route('products.index');
    }

    public function show($id)
    {
        $product = Product::with('category')->findOrFail($id);
        return Inertia::render('Products/Show', ['product' => $product]);
    }

    public function edit($id)
    {
        $product = Product::with('category')->findOrFail($id);
        return Inertia::render('Products/Edit', ['product' => $product]);
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->update($request->all());
        return redirect()->route('products.index');
    }

    public function destroy($id)
    {
        Product::destroy($id);
        return redirect()->route('products.index');
    }
}