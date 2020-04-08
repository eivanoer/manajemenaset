<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Suport\Facades\Hash;
use App\User;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $name = $request->input('name');
        $email = $request->input('email');
        $password = $request->input('password');
        //var_dump($name);exit;
        $register = User::create([
            'name' => $name,
            'email' => $email,
            'password' => $password
        ]);

        if ($register) {
            return response()->json([
                'success' => true,
                'message' => 'Register berhasil!',
                'data' => $register

            ], 201);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Register gagal!',
                'data' => ''

            ], 400);
        }
    }

    public function login(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');

        $user = User::where('email', $email)->first();
        //var_dump($user); exit;

        if($password == $user->password) {
            $apiToken = base64_encode($user);

            $user->update([
                'api_token' => $apiToken
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Login Berhasil!',
                'data' => [
                    'user' => $user,
                    'api_token' => $apiToken
                ]
            ], 201);
        } else {
             return response()->json([
                'success' => false,
                'message' => 'Login Gagal!',
                'data' => ''
            ]);
        }
    }
}
