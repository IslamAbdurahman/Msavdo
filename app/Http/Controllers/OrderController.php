<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Inertia\Inertia;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with(['items', 'graphics'])->get();
        return Inertia::render('Orders/Index', ['orders' => $orders]);
    }

    public function create()
    {
        return Inertia::render('Orders/Create');
    }

    public function store(Request $request)
    {
        $order = Order::create($request->all());
        return redirect()->route('orders.index');
    }

    public function show($id)
    {
        $order = Order::with(['items', 'graphics'])->findOrFail($id);
        return Inertia::render('Orders/Show', ['order' => $order]);
    }

    public function edit($id)
    {
        $order = Order::with(['items', 'graphics'])->findOrFail($id);
        return Inertia::render('Orders/Edit', ['order' => $order]);
    }

    public function update(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $order->update($request->all());
        return redirect()->route('orders.index');
    }

    public function destroy($id)
    {
        Order::destroy($id);
        return redirect()->route('orders.index');
    }
}