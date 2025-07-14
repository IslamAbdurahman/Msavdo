<?php

namespace App\Http\Controllers;

use App\Models\Cashbox;
use Inertia\Inertia;
use Illuminate\Http\Request;

class CashboxController extends Controller
{
    public function index()
    {
        $cashboxes = Cashbox::with(['inputs', 'outputs'])->get();
        return Inertia::render('Cashboxes/Index', ['cashboxes' => $cashboxes]);
    }

    public function create()
    {
        return Inertia::render('Cashboxes/Create');
    }

    public function store(Request $request)
    {
        $cashbox = Cashbox::create($request->all());
        return redirect()->route('cashboxes.index');
    }

    public function show($id)
    {
        $cashbox = Cashbox::with(['inputs', 'outputs'])->findOrFail($id);
        return Inertia::render('Cashboxes/Show', ['cashbox' => $cashbox]);
    }

    public function edit($id)
    {
        $cashbox = Cashbox::with(['inputs', 'outputs'])->findOrFail($id);
        return Inertia::render('Cashboxes/Edit', ['cashbox' => $cashbox]);
    }

    public function update(Request $request, $id)
    {
        $cashbox = Cashbox::findOrFail($id);
        $cashbox->update($request->all());
        return redirect()->route('cashboxes.index');
    }

    public function destroy($id)
    {
        Cashbox::destroy($id);
        return redirect()->route('cashboxes.index');
    }
}
