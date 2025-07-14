<?php

namespace App\Http\Controllers;

use App\Models\KirimItem;
use Inertia\Inertia;
use Illuminate\Http\Request;

class KirimItemController extends Controller
{
    public function index()
    {
        $kirimItems = KirimItem::with(['kirim', 'product'])->get();
        return Inertia::render('KirimItems/Index', ['kirimItems' => $kirimItems]);
    }

    public function create()
    {
        return Inertia::render('KirimItems/Create');
    }

    public function store(Request $request)
    {
        $kirimItem = KirimItem::create($request->all());
        return redirect()->route('kirim-items.index');
    }

    public function show($id)
    {
        $kirimItem = KirimItem::with(['kirim', 'product'])->findOrFail($id);
        return Inertia::render('KirimItems/Show', ['kirimItem' => $kirimItem]);
    }

    public function edit($id)
    {
        $kirimItem = KirimItem::with(['kirim', 'product'])->findOrFail($id);
        return Inertia::render('KirimItems/Edit', ['kirimItem' => $kirimItem]);
    }

    public function update(Request $request, $id)
    {
        $kirimItem = KirimItem::findOrFail($id);
        $kirimItem->update($request->all());
        return redirect()->route('kirim-items.index');
    }

    public function destroy($id)
    {
        KirimItem::destroy($id);
        return redirect()->route('kirim-items.index');
    }
}