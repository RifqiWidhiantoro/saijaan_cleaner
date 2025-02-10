<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ReportController extends Controller
{
    // Menampilkan semua laporan
    public function index()
    {
        $reports = Report::all();
        return view('admin.reports.index', compact('reports'));
    }

    // Menyimpan laporan baru dari masyarakat
    public function store(Request $request) {
        // Validasi input
        $request->validate([
            'judul' => 'required|string|max:30',
            'deskripsi' => 'required|string|max:255',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'photos' => 'nullable|array|max:4', // Maksimal 4 file
            'photos.*' => 'mimes:jpg,jpeg,png|max:5120', // 5MB per file
        ]);

        // Rename dan simpan gambar
        $fileNames = [];
        if ($request->hasFile('photos')) {
            foreach ($request->file('photos') as $file) {
                $timestamp = now()->format('His_d_m_Y');
                $filename = "{$timestamp}_" . uniqid() . '.' . $file->extension();
                
                // Simpan file di direktori 'public/uploads/reports' agar bisa diakses publik
                $file->storeAs('public/uploads/reports', $filename);
                $fileNames[] = $filename;
            }
        }

        // Simpan data ke database
        Report::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'photos' => json_encode($fileNames),
        ]);

        return redirect()->back()->with('success', 'Laporan berhasil dibuat');
    }
    
    // Detail laporan
    public function show($id)
    {
        // Mengambil data laporan beserta relasi cleaningProgress
        $report = Report::with('cleaningProgress')->findOrFail($id);
        return view('admin.reports.show', compact('report'));
    }
}
