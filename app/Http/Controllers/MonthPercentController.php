<?php

namespace App\Http\Controllers;

use App\Models\MonthPercent;
use Illuminate\Http\Request;
use Inertia\Inertia;

class MonthPercentController extends Controller
{
    // Display the list of month percentages
    public function index()
    {
        $monthPercents = MonthPercent::all();
        return Inertia::render('MonthPercent/Index', [
            'monthPercents' => $monthPercents,
        ]);
    }

    // Store a new month percentage
    public function store(Request $request)
    {
        $request->validate([
            'months' => 'required|string|max:255',
            'percent' => 'required|numeric|min:0|max:100',
        ]);

        MonthPercent::create($request->all());

        return redirect()->route('month-percents.index')->with('success', 'Month Percent created successfully.');
    }

    // Update an existing month percentage
    public function update(Request $request, MonthPercent $monthPercent)
    {
        $request->validate([
            'months' => 'required|string|max:255',
            'percent' => 'required|numeric|min:0|max:100',
        ]);

        $monthPercent->update($request->all());

        return redirect()->route('month-percents.index')->with('success', 'Month Percent updated successfully.');
    }

    // Delete a month percentage
    public function destroy(MonthPercent $monthPercent)
    {
        $monthPercent->delete();

        return redirect()->route('month-percents.index')->with('success', 'Month Percent deleted successfully.');
    }
}
