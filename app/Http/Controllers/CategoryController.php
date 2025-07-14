<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Inertia\Inertia;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return Inertia::render('Categories/Index', ['categories' => $categories]);
    }

    public function create()
    {
        return Inertia::render('Categories/Create');
    }

    public function store(Request $request)
    {
        $category = Category::create($request->all());
        return redirect()->route('categories.index');
    }

    public function show($id)
    {
        $category = Category::findOrFail($id);
        return Inertia::render('Categories/Show', ['category' => $category]);
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return Inertia::render('Categories/Edit', ['category' => $category]);
    }

    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $category->update($request->all());
        return redirect()->route('categories.index');
    }

    public function destroy($id)
    {
        Category::destroy($id);
        return redirect()->route('categories.index');
    }
}