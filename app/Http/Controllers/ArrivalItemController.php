<?php

namespace App\Http\Controllers;

use App\Models\ArrivalItem;
use Inertia\Inertia;
use Illuminate\Http\Request;

class ArrivalItemController extends Controller
{
    public function index()
    {
        $arrivalItems = ArrivalItem::with(['arrival', 'product'])->get();
        return Inertia::render('ArrivalItems/Index', ['arrivalItems' => $arrivalItems]);
    }

    public function create()
    {
        return Inertia::render('ArrivalItems/Create');
    }

    public function store(Request $request)
    {
        $arrivalItem = ArrivalItem::create($request->all());
        return redirect()->route('arrival-items.index');
    }

    public function show($id)
    {
        $arrivalItem = ArrivalItem::with(['arrival', 'product'])->findOrFail($id);
        return Inertia::render('ArrivalItems/Show', ['arrivalItem' => $arrivalItem]);
    }

    public function edit($id)
    {
        $arrivalItem = ArrivalItem::with(['arrival', 'product'])->findOrFail($id);
        return Inertia::render('ArrivalItems/Edit', ['arrivalItem' => $arrivalItem]);
    }

    public function update(Request $request, $id)
    {
        $arrivalItem = ArrivalItem::findOrFail($id);
        $arrivalItem->update($request->all());
        return redirect()->route('arrival-items.index');
    }

    public function destroy($id)
    {
        ArrivalItem::destroy($id);
        return redirect()->route('arrival-items.index');
    }
}
