<?php

namespace App\Http\Controllers;

use App\Models\Cashbox;
use Illuminate\Http\Request;

class CashboxController extends Controller
{
    public function index()
    {
        return Cashbox::with(['inputs', 'outputs'])->get();
    }

    public function store(Request $request)
    {
        $cashbox = Cashbox::create($request->all());
        return response()->json($cashbox, 201);
    }

    public function show($id)
    {
        return Cashbox::with(['inputs', 'outputs'])->findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $cashbox = Cashbox::findOrFail($id);
        $cashbox->update($request->all());
        return response()->json($cashbox, 200);
    }

    public function destroy($id)
    {
        Cashbox::destroy($id);
        return response()->json(null, 204);
    }
}
