<?php

namespace App\Http\Controllers;

use App\Models\Graphics;
use Inertia\Inertia;
use Illuminate\Http\Request;

class GraphicsController extends Controller
{
    public function index()
    {
        $graphics = Graphics::with('order')->get();
        return Inertia::render('Graphics/Index', ['graphics' => $graphics]);
    }

    public function create()
    {
        return Inertia::render('Graphics/Create');
    }

    public function store(Request $request)
    {
        $graphics = Graphics::create($request->all());
        return redirect()->route('graphics.index');
    }

    public function show($id)
    {
        $graphics = Graphics::with('order')->findOrFail($id);
        return Inertia::render('Graphics/Show', ['graphics' => $graphics]);
    }

    public function edit($id)
    {
        $graphics = Graphics::with('order')->findOrFail($id);
        return Inertia::render('Graphics/Edit', ['graphics' => $graphics]);
    }

    public function update(Request $request, $id)
    {
        $graphics = Graphics::findOrFail($id);
        $graphics->update($request->all());
        return redirect()->route('graphics.index');
    }

    public function destroy($id)
    {
        Graphics::destroy($id);
        return redirect()->route('graphics.index');
    }
}