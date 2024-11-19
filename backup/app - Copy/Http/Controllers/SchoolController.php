<?php

namespace App\Http\Controllers;

use App\Models\School;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class SchoolController extends Controller
{
    public function index()
    {
        $schools = School::all();
        return view('layouts/idea/sekolah', compact('schools'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'school' => 'required|string|max:255',
        ]);

        School::create([
            'school' => $request->input('school'),
            'status' => 1, // Set default status to 1 (enable)
        ]);

        return response()->json(['status' => 'success', 'message' => 'Sekolah berhasil ditambahkan!']);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'school' => [
                'required',
                'string', 
                'max:255',
                Rule::unique('schools')->ignore($id),
            ],
        ]);

        $school = School::findOrFail($id);
        $school->update([
            'school' => $request->input('school'),
        ]);

        return response()->json(['status' => 'success', 'message' => 'Sekolah berhasil diubah!']);
    }

    public function toggleStatus($id)
    {
        $school = School::findOrFail($id);
        $school->status = $school->status === 0 ? 1 : 0;
        $school->save();

        return response()->json(['status' => $school->status, 'message' => 'Status sekolah diubah!']);
    }

    public function destroy($id)
    {
        $school = School::findOrFail($id);
        $school->delete();
        //if you want refresh id at database devharat | Schools Tabel you just insert this code in your database
        //add this code in your School Tabel
        //SET @num := 0;
        //UPDATE schools SET id = @num := (@num+1);
        //ALTER TABLE schools AUTO_INCREMENT = 1;

        return response()->json(['status' => 'success', 'message' => 'Sekolah berhasil dihapus!']);
    }
}