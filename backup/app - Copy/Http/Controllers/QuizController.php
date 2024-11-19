<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\Community;
use App\Models\School;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class QuizController extends Controller
{
    public function index()
    {
        return view('layouts/quiz/home');
    }

    public function create()
    {
        $communities = Community::all();
        $choice = Quiz::with('community')->where('user_id', Auth::user()->id)->get();
        return view('layouts/quiz/choice', compact('communities', 'choice'));
        // return $choice;
    }

    public function store(Request $request)
    {
        $save = new Quiz;
        $save->user_id = Auth::user()->id;
        $save->community_id = $request->community_id;
        $save->school_id = $request->school_id;
        $save->class = $request->class;
        $save->save();
        
        return response()->json('Success', 200);
    }

    function destroy($id){
        Quiz::destroy($id);
        return response()->json('Success', 200);
    }

    public function school()
    {
    $enabledSchools = School::where('status', 1)->get();
    return view('layouts/quiz/school', ['schools' => $enabledSchools]);
    }

    // public function register()
    // {
    //     return view('layouts/quiz/register');
    // }

    /**
     * Menanggapi hasil pilihan pengguna.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function processUserSelection(Request $request)
    {
        $selectedSubsektor = $request->input('subsektor');

        // Lakukan sesuatu dengan hasil pilihan pengguna
        // Misalnya, simpan ke dalam database atau tampilkan di halaman lain

        return response()->json(['message' => 'Pilihan pengguna: ' . $selectedSubsektor]);
    }
}