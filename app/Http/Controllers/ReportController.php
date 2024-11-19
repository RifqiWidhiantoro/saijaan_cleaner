<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    // Menampilkan semua laporan
    public function index()
    {
        $reports = Report::all();
        return view('admin.reports.index', compact('reports'));
    }

    // Menyimpan laporan baru dari masyarakat
    public function store(Request $request)
    {
        $request->validate([
            'address' => 'required|string|max:255',
            'description' => 'required|string',
            'photo' => 'required|image|mimes:jpg,jpeg,png|max:5120', // max 5 MB
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
        ]);

        $photoPath = $request->file('photo')->store('reports');

        Report::create([
            'address' => $request->address,
            'description' => $request->description,
            'photo_path' => $photoPath,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
        ]);

        return redirect()->back()->with('success', 'Report submitted successfully.');
    }

    // Detail laporan
    public function show($id)
    {
        $report = Report::with('cleaningProgress')->findOrFail($id);
        return view('admin.reports.show', compact('report'));
    }
}
