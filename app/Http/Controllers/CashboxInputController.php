<?php

namespace App\Http\Controllers;

use App\Models\CashboxInput;
use Illuminate\Http\Request;

class CashboxInputController extends Controller
{
    public function index()
    {
        return CashboxInput::with(['cashbox', 'graphic', 'order'])->get();
    }

    public function store(Request $request)
    {
        $cashboxInput = CashboxInput::create($request->all());
        return response()->json($cashboxInput, 201);
    }

    public function show($id)
    {
        return CashboxInput::with(['cashbox', 'graphic', 'order'])->findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $cashboxInput = CashboxInput::findOrFail($id);
        $cashboxInput->update($request->all());
        return response()->json($cashboxInput, 200);
    }

    public function destroy($id)
    {
        CashboxInput::destroy($id);
        return response()->json(null, 204);
    }
}
