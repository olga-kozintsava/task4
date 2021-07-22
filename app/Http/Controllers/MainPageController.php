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

    public function delete(Request $request){
        $id = $request->id;
        User::whereIn('id', $id)->delete();
        return response()->json(['code'=>200]);
    }

//    {
//        $id = $request->id;
//        $query = User::find($id)->delete();
//        if($query){
//            return response()->json(['code'=>200]);
//        }else{
//            return response()->json(['code'=>400]);
//        }
//    }

}
