<?php

namespace App\Http\Controllers;

use App\Models\OrderItem;
use Illuminate\Http\Request;

class OrderItemController extends Controller
{
    public function index()
    {
        return OrderItem::with(['order', 'variant'])->get();
    }

    public function store(Request $request)
    {
        $orderItem = OrderItem::create($request->all());
        return response()->json($orderItem, 201);
    }

    public function show($id)
    {
        return OrderItem::with(['order', 'variant'])->findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $orderItem = OrderItem::findOrFail($id);
        $orderItem->update($request->all());
        return response()->json($orderItem, 200);
    }

    public function destroy($id)
    {
        OrderItem::destroy($id);
        return response()->json(null, 204);
    }
}
