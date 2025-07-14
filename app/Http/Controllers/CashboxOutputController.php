<?php

namespace App\Http\Controllers;

use App\Models\CashboxOutput;
use Illuminate\Http\Request;

class CashboxOutputController extends Controller
{
    public function index()
    {
        return CashboxOutput::with('cashbox')->get();
    }

    public function store(Request $request)
    {
        $cashboxOutput = CashboxOutput::create($request->all());
        return response()->json($cashboxOutput, 201);
    }

    public function show($id)
    {
        return CashboxOutput::with('cashbox')->findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $cashboxOutput = CashboxOutput::findOrFail($id);
        $cashboxOutput->update($request->all());
        return response()->json($cashboxOutput, 200);
    }

    public function destroy($id)
    {
        CashboxOutput::destroy($id);
        return response()->json(null, 204);
    }
}
