<?php

namespace App\Http\Controllers;

use App\Models\Graphics;
use Illuminate\Http\Request;

class GraphicsController extends Controller
{
    public function index()
    {
        return Graphics::with('order')->get();
    }

    public function store(Request $request)
    {
        $graphics = Graphics::create($request->all());
        return response()->json($graphics, 201);
    }

    public function show($id)
    {
        return Graphics::with('order')->findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $graphics = Graphics::findOrFail($id);
        $graphics->update($request->all());
        return response()->json($graphics, 200);
    }

    public function destroy($id)
    {
        Graphics::destroy($id);
        return response()->json(null, 204);
    }
}
