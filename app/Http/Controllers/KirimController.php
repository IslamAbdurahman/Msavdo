<?php

namespace App\Http\Controllers;

use App\Models\Kirim;
use Inertia\Inertia;
use Illuminate\Http\Request;

class KirimController extends Controller
{
    public function index()
    {
        $kirims = Kirim::with('items')->get();
        return Inertia::render('Kirims/Index', ['kirims' => $kirims]);
    }

    public function create()
    {
        return Inertia::render('Kirims/Create');
    }

    public function store(Request $request)
    {
        $kirim = Kirim::create($request->all());
        return redirect()->route('kirims.index');
    }

    public function show($id)
    {
        $kirim = Kirim::with('items')->findOrFail($id);
        return Inertia::render('Kirims/Show', ['kirim' => $kirim]);
    }

    public function edit($id)
    {
        $kirim = Kirim::with('items')->findOrFail($id);
        return Inertia::render('Kirims/Edit', ['kirim' => $kirim]);
    }

    public function update(Request $request, $id)
    {
        $kirim = Kirim::findOrFail($id);
        $kirim->update($request->all());
        return redirect()->route('kirims.index');
    }

    public function destroy($id)
    {
        Kirim::destroy($id);
        return redirect()->route('kirims.index');
    }
}