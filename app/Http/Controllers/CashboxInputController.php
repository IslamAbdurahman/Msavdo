<?php

namespace App\Http\Controllers;

use App\Models\CashboxInput;
use Inertia\Inertia;
use Illuminate\Http\Request;

class CashboxInputController extends Controller
{
    public function index()
    {
        $cashboxInputs = CashboxInput::with(['cashbox', 'graphic', 'order'])->get();
        return Inertia::render('CashboxInputs/Index', ['cashboxInputs' => $cashboxInputs]);
    }

    public function create()
    {
        return Inertia::render('CashboxInputs/Create');
    }

    public function store(Request $request)
    {
        $cashboxInput = CashboxInput::create($request->all());
        return redirect()->route('cashbox-inputs.index');
    }

    public function show($id)
    {
        $cashboxInput = CashboxInput::with(['cashbox', 'graphic', 'order'])->findOrFail($id);
        return Inertia::render('CashboxInputs/Show', ['cashboxInput' => $cashboxInput]);
    }

    public function edit($id)
    {
        $cashboxInput = CashboxInput::with(['cashbox', 'graphic', 'order'])->findOrFail($id);
        return Inertia::render('CashboxInputs/Edit', ['cashboxInput' => $cashboxInput]);
    }

    public function update(Request $request, $id)
    {
        $cashboxInput = CashboxInput::findOrFail($id);
        $cashboxInput->update($request->all());
        return redirect()->route('cashbox-inputs.index');
    }

    public function destroy($id)
    {
        CashboxInput::destroy($id);
        return redirect()->route('cashbox-inputs.index');
    }
}