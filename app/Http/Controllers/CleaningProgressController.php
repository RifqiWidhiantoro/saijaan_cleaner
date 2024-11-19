<?php

namespace App\Http\Controllers;

use App\Models\CleaningProgress;
use App\Models\Report;
use Illuminate\Http\Request;

class CleaningProgressController extends Controller
{
    // Menampilkan status pembersihan
    public function index()
    {
        $cleaningProgresses = CleaningProgress::with('report')->get();
        return view('admin.cleaning_progress.index', compact('cleaningProgresses'));
    }

    // Menyimpan data progress pembersihan
    public function store(Request $request, $reportId)
    {
        $request->validate([
            'before_photo' => 'image|mimes:jpg,jpeg,png|max:5120',
            'during_photo' => 'image|mimes:jpg,jpeg,png|max:5120',
            'after_photo' => 'image|mimes:jpg,jpeg,png|max:5120',
        ]);

        $cleaningProgress = new CleaningProgress();
        $cleaningProgress->report_id = $reportId;

        if ($request->hasFile('before_photo')) {
            $cleaningProgress->before_photo = $request->file('before_photo')->store('cleaning_photos');
        }
        if ($request->hasFile('during_photo')) {
            $cleaningProgress->during_photo = $request->file('during_photo')->store('cleaning_photos');
        }
        if ($request->hasFile('after_photo')) {
            $cleaningProgress->after_photo = $request->file('after_photo')->store('cleaning_photos');
        }

        $cleaningProgress->save();

        return redirect()->back()->with('success', 'Cleaning progress updated successfully.');
    }
}
