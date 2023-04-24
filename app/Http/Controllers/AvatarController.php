<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateAvatarRequest;
use Illuminate\Http\Request;

class AvatarController extends Controller
{
    public function update(UpdateAvatarRequest  $request)
    {
        dd($request->all());
        return response()->redirectTo(route('profile.edit'));
        // return back()->with('message', 'success');
    }
}
