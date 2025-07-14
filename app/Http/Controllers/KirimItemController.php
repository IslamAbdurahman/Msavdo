<?php

namespace App\Http\Controllers;

use App\Models\KirimItem;
use Illuminate\Http\Request;

class KirimItemController extends Controller
{
    public function index()
    {
        return KirimItem::with(['kirim', 'product'])->get();
    }

    public function store(Request $request)
    {
        $kirimItem = KirimItem::create($request->all());
        return response()->json($kirimItem, 201);
    }

    public function show($id)
    {
        return KirimItem::with(['kirim', 'product'])->findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $kirimItem = KirimItem::findOrFail($id);
        $kirimItem->update($request->all());
        return response()->json($kirimItem, 200);
    }

    public function destroy($id)
    {
        KirimItem::destroy($id);
        return response()->json(null, 204);
    }
}
