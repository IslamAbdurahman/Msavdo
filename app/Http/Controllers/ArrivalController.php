<?php

namespace App\Http\Controllers;

use App\Models\Arrival;
use Inertia\Inertia;
use Illuminate\Http\Request;

class ArrivalController extends Controller
{
    public function index()
    {
        $arrivals = Arrival::with('items')->get();
        return Inertia::render('Arrivals/Index', ['arrivals' => $arrivals]);
    }

    public function create()
    {
        return Inertia::render('Arrivals/Create');
    }

    public function store(Request $request)
    {
        $arrival = Arrival::create($request->all());
        return redirect()->route('arrivals.index');
    }

    public function show($id)
    {
        $arrival = Arrival::with('items')->findOrFail($id);
        return Inertia::render('Arrivals/Show', ['arrival' => $arrival]);
    }

    public function edit($id)
    {
        $arrival = Arrival::with('items')->findOrFail($id);
        return Inertia::render('Arrivals/Edit', ['arrival' => $arrival]);
    }

    public function update(Request $request, $id)
    {
        $arrival = Arrival::findOrFail($id);
        $arrival->update($request->all());
        return redirect()->route('arrivals.index');
    }

    public function destroy($id)
    {
        Arrival::destroy($id);
        return redirect()->route('arrivals.index');
    }
}
