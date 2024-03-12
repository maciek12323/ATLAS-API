<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{

    public function registerUser(Request $request)
    {
        $data = $request->validate(
            [
                'name' => 'required|string|max:190',
                'email' => 'required|email|max:190|unique:users,email',
                'password' => 'required|string',
            ]);

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        $token = $user->createToken('apiToken')->plainTextToken;


        return response()->json([
            'user' => $user,
            'message' => 'User Created Successfully',
            'token' => $token,
        ], 201);

    }
    public function loginUser(Request $request)
    {
        $data = $request->validate(
            [
                'email' => 'required|email|max:190',
                'password' => 'required|string',
            ]);

        $user = User::where('email', $data['email'])->first();

        if(!$user || !Hash::check($data['password'], $user->password))
        {
            return response(['message'=>'Invalid Credentials'], 401);
        }
        else
        {
            $token = $user->createToken('apiTokenLogin')->plainTextToken;
            return response()->json([
                'user' => $user,
                'message' => 'Logged in Successfully',
                'token' => $token,
            ], 200);
        }
    }

    public function logoutUser()
    {
        auth()->user()->tokens()->delete();
        return response(['message'=>"Logged out"]);
    }



}
