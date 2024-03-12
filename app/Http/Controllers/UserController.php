<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\ErrorHandler\Debug;
use Illuminate\Http\JsonResponse;
use GuzzleHttp\Exception\ClientException;
class UserController extends Controller
{
    function __construct(private readonly IUserAuthService $_userAuthService){}

    private array $rules = [
        'name' => 'required|string|max:255|regex:/^[A-Za-z0-9\s]+$/',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8|regex:/^(?=.*[A-Z])(?=.*\d).+$/',
    ];

    public function RegisterUser(Request $request)
    {

        if(!$request->has('name','email','password'))
        {
            return response()->json(['errors'=>"Invalid request"], 400);
        }

        $user = $this->_userAuthService->AddUser($request, $this->rules);
        if($user['success'] == false){
            return response()->json(['errors'=>$user['errors']], 400);
        }

        $token = $this->_userAuthService->CreateUserToken($user['user']);

        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
        ]);
    }

    public function LoginUser(Request $request)
    {
        if(!$request->has('email','password'))
        {
            return response()->json(['errors'=>"Invalid request"], 400);
        }

        $userLoginResponse = $this->_userAuthService->LoginUser($request);

        if($userLoginResponse['success']==false){
            return response()->json(['errors'=>$userLoginResponse['errors']], 401);
        }

        return response()->json([
            'access_token' => $userLoginResponse['access_token'],
            'token_type' => 'Bearer',
        ]);
    }

    public function GetCurrentUser(Request $request)
    {
        return $this->_userAuthService->GetCurrentUserWithToken($request);
    }

    public function LogoutUser(Request $request)
    {
        $this->_userAuthService->LogoutUser($request);
        return response()->json([]);
    }

}
