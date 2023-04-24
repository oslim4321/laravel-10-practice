<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AvatarController extends Controller
{
    public function update(Request $request)
    {
        $request->validate([
            'avatar' => 'image',
        ]);
        dd($request->all());
        return response()->redirectTo(route('profile.edit'));
        // return back()->with('message', 'success');
    }
}
