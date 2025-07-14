<?php

namespace App\Http\Controllers;

use App\Models\Variant;
use Inertia\Inertia;
use Illuminate\Http\Request;

class VariantController extends Controller
{
    public function index()
    {
        $variants = Variant::with('kirimItem')->get();
        return Inertia::render('Variants/Index', ['variants' => $variants]);
    }

    public function create()
    {
        return Inertia::render('Variants/Create');
    }

    public function store(Request $request)
    {
        $variant = Variant::create($request->all());
        return redirect()->route('variants.index');
    }

    public function show($id)
    {
        $variant = Variant::with('kirimItem')->findOrFail($id);
        return Inertia::render('Variants/Show', ['variant' => $variant]);
    }

    public function edit($id)
    {
        $variant = Variant::with('kirimItem')->findOrFail($id);
        return Inertia::render('Variants/Edit', ['variant' => $variant]);
    }

    public function update(Request $request, $id)
    {
        $variant = Variant::findOrFail($id);
        $variant->update($request->all());
        return redirect()->route('variants.index');
    }

    public function destroy($id)
    {
        Variant::destroy($id);
        return redirect()->route('variants.index');
    }
}