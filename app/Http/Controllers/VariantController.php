<?php

namespace App\Http\Controllers;

use App\Models\Variant;
use Illuminate\Http\Request;

class VariantController extends Controller
{
    public function index()
    {
        return Variant::with('kirimItem')->get();
    }

    public function store(Request $request)
    {
        $variant = Variant::create($request->all());
        return response()->json($variant, 201);
    }

    public function show($id)
    {
        return Variant::with('kirimItem')->findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $variant = Variant::findOrFail($id);
        $variant->update($request->all());
        return response()->json($variant, 200);
    }

    public function destroy($id)
    {
        Variant::destroy($id);
        return response()->json(null, 204);
    }
}
