<?php

namespace App\Http\Controllers;

use App\Models\Kirim;
use Illuminate\Http\Request;

class KirimController extends Controller
{
    public function index()
    {
        return Kirim::with('items')->get();
    }

    public function store(Request $request)
    {
        $kirim = Kirim::create($request->all());
        return response()->json($kirim, 201);
    }

    public function show($id)
    {
        return Kirim::with('items')->findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $kirim = Kirim::findOrFail($id);
        $kirim->update($request->all());
        return response()->json($kirim, 200);
    }

    public function destroy($id)
    {
        Kirim::destroy($id);
        return response()->json(null, 204);
    }
}
