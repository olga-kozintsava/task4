<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class MainPageController extends Controller
{
    public function show()
    {
        return view('main', ['data' => User::all()]);
    }

    public function delete(Request $request)
    {
        $id = $request->id;
        User::whereIn('id', $id)->delete();
        $userSession = session()->get('LoggedUser');
        if (in_array($userSession, $id)) {
            session()->pull('LoggedUser');
        }
        return response()->json(['code' => 200]);
    }

    public function block(Request $request)
    {
        $id = $request->id;
        $users = User::whereIn('id', $id);
        $users->update(['status' => 'block']);
        $userSession = session()->get('LoggedUser');
        if (in_array($userSession, $id)) {
            session()->pull('LoggedUser');
        }
        return response()->json(['code' => 200]);
    }

    public function unblock(Request $request)
    {
        $id = $request->id;
        User::whereIn('id', $id)->update(['status' => 'ok']);
        return response()->json(['code' => 200]);
    }
}
