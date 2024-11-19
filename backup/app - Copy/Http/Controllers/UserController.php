<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function show(Request $request, $id)
    {
        $user = User::find($id);
        return view('layouts.user.data', ['user' => $user]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'phone' => 'required',
        ]);

        $update = User::find($id);
        $update->phone = $request->phone;
        $update->update();

        // $ide = Idea::where('user_id', Auth::user()->id)->get();
        // return view('layouts.idea.data', ['ide' => $ide])->with('success', 'Post created successfully!');
        return redirect('idea');
    }
}
