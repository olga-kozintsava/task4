<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;

class RegistrationController extends Controller
{
    public function show()
    {
        return view('signup');
    }

    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required|min:1',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:1'
        ]);
        $user  =new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->last_login_at = Carbon::now()->toDateTimeString();
        $query=$user->save();
        $request->session()->put('LoggedUser', $user->id);
        if ($query){
            return redirect('/');
        }else{
            return back()->with('fail', 'fail');
        }
    }
}

