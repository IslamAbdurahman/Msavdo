<?php

namespace App\Http\Controllers;

use App\Models\Trade;
use Inertia\Inertia;
use Illuminate\Http\Request;

class TradeController extends Controller
{
    public function index()
    {
        $trades = Trade::with(['items', 'graphics'])->get();
        return Inertia::render('Orders/Index', ['orders' => $trades]);
    }

    public function create()
    {
        return Inertia::render('Orders/Create');
    }

    public function store(Request $request)
    {
        $trade = Trade::create($request->all());
        return redirect()->route('orders.index');
    }

    public function show($id)
    {
        $trade = Trade::with(['items', 'graphics'])->findOrFail($id);
        return Inertia::render('Orders/Show', ['order' => $trade]);
    }

    public function edit($id)
    {
        $trade = Trade::with(['items', 'graphics'])->findOrFail($id);
        return Inertia::render('Orders/Edit', ['order' => $trade]);
    }

    public function update(Request $request, $id)
    {
        $trade = Trade::findOrFail($id);
        $trade->update($request->all());
        return redirect()->route('orders.index');
    }

    public function destroy($id)
    {
        Trade::destroy($id);
        return redirect()->route('orders.index');
    }
}
