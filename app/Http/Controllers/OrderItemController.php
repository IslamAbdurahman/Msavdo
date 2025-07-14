<?php

namespace App\Http\Controllers;

use App\Models\OrderItem;
use Inertia\Inertia;
use Illuminate\Http\Request;

class OrderItemController extends Controller
{
    public function index()
    {
        $orderItems = OrderItem::with(['order', 'variant'])->get();
        return Inertia::render('OrderItems/Index', ['orderItems' => $orderItems]);
    }

    public function create()
    {
        return Inertia::render('OrderItems/Create');
    }

    public function store(Request $request)
    {
        $orderItem = OrderItem::create($request->all());
        return redirect()->route('order-items.index');
    }

    public function show($id)
    {
        $orderItem = OrderItem::with(['order', 'variant'])->findOrFail($id);
        return Inertia::render('OrderItems/Show', ['orderItem' => $orderItem]);
    }

    public function edit($id)
    {
        $orderItem = OrderItem::with(['order', 'variant'])->findOrFail($id);
        return Inertia::render('OrderItems/Edit', ['orderItem' => $orderItem]);
    }

    public function update(Request $request, $id)
    {
        $orderItem = OrderItem::findOrFail($id);
        $orderItem->update($request->all());
        return redirect()->route('order-items.index');
    }

    public function destroy($id)
    {
        OrderItem::destroy($id);
        return redirect()->route('order-items.index');
    }
}