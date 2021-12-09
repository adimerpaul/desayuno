<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function login(Request $request){
        if (!Auth::attempt($request->all())){
            return response()->json(['res'=>'No existe el usuario'],400);
        }
//        if (User::where('email',$request->email)->whereDate('fechalimite','>',now())->get()->count()==0){
//            return response()->json(['res'=>'Su usuario sobre paso el limite de ingreso'],400);
//        }

        $user=User::where('email',$request->email)
//            ->with('unit')
            ->with('permisos')->firstOrFail();
        $token=$user->createToken('auth_token')->plainTextToken;
        return response()->json(['token'=>$token,'user'=>$user],200);;
    }
    public function logout(Request $request){
//        return $request->user();
        $request->user()->currentAccessToken()->delete();
        return response()->json(['res'=>'salido exitosamente'],200);
    }
}
