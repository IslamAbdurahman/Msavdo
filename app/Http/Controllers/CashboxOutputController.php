<?php

namespace App\Http\Controllers;

use App\Models\CashboxOutput;
use Inertia\Inertia;
use Illuminate\Http\Request;

class CashboxOutputController extends Controller
{
    public function index()
    {
        $cashboxOutputs = CashboxOutput::with('cashbox')->get();
        return Inertia::render('CashboxOutputs/Index', ['cashboxOutputs' => $cashboxOutputs]);
    }

    public function create()
    {
        return Inertia::render('CashboxOutputs/Create');
    }

    public function store(Request $request)
    {
        $cashboxOutput = CashboxOutput::create($request->all());
        return redirect()->route('cashbox-outputs.index');
    }

    public function show($id)
    {
        $cashboxOutput = CashboxOutput::with('cashbox')->findOrFail($id);
        return Inertia::render('CashboxOutputs/Show', ['cashboxOutput' => $cashboxOutput]);
    }

    public function edit($id)
    {
        $cashboxOutput = CashboxOutput::with('cashbox')->findOrFail($id);
        return Inertia::render('CashboxOutputs/Edit', ['cashboxOutput' => $cashboxOutput]);
    }

    public function update(Request $request, $id)
    {
        $cashboxOutput = CashboxOutput::findOrFail($id);
        $cashboxOutput->update($request->all());
        return redirect()->route('cashbox-outputs.index');
    }

    public function destroy($id)
    {
        CashboxOutput::destroy($id);
        return redirect()->route('cashbox-outputs.index');
    }
}