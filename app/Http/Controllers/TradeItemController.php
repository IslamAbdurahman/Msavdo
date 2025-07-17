<?php

namespace App\Http\Controllers;

use App\Models\TradeItem;
use Inertia\Inertia;
use Illuminate\Http\Request;

class TradeItemController extends Controller
{
    public function index()
    {
        $tradeItems = TradeItem::with(['order', 'variant'])->get();
        return Inertia::render('OrderItems/Index', ['orderItems' => $tradeItems]);
    }

    public function create()
    {
        return Inertia::render('OrderItems/Create');
    }

    public function store(Request $request)
    {
        $tradeItem = TradeItem::create($request->all());
        return redirect()->route('order-items.index');
    }

    public function show($id)
    {
        $tradeItem = TradeItem::with(['order', 'variant'])->findOrFail($id);
        return Inertia::render('OrderItems/Show', ['orderItem' => $tradeItem]);
    }

    public function edit($id)
    {
        $tradeItem = TradeItem::with(['order', 'variant'])->findOrFail($id);
        return Inertia::render('OrderItems/Edit', ['orderItem' => $tradeItem]);
    }

    public function update(Request $request, $id)
    {
        $tradeItem = TradeItem::findOrFail($id);
        $tradeItem->update($request->all());
        return redirect()->route('order-items.index');
    }

    public function destroy($id)
    {
        TradeItem::destroy($id);
        return redirect()->route('order-items.index');
    }
}
