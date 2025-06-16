<?php

namespace App\Http\Controllers\API;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\API\BaseController;
use PHPOpenSourceSaver\JWTAuth\Facades\JWTAuth;

class AuthController extends BaseController
{
    public function login(Request $request)
    {
        try {
            $credentials = $request->only(['email', 'password']);
            // dd($credentials);

            if(!JWTAuth::attempt($credentials)) {
                return $this->error("Your email & password doesn't match", null, 401);
            }

            $user = User::where('email', $credentials['email'])->first();

            // dd($user);
            $payload = [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'phone' => $user->phone,
                'status' => $user->status == 1 ? "active" : "suspend",
                'address' => $user->address,
            ];

            $token = JWTAuth::customClaims($payload)->attempt(['email' => $user->email, 'password'  => $credentials['password'] ]);

            return $this->success($token, "User Login Sccessfully", 200);
        } catch (Exception $e) {
            return $this->error($e->getMessage(), null, 500);
        }
    }

    public function register(Request $request)
    {
        try {
                $validator = Validator::make($request->all(), [
                    'name' => 'required|string',
                    'email' => 'required|unique:users,email,except,id',
                    'password' => 'required',
                    'phone' => 'required',
                    'address' => 'required',
                    'gender' => 'required'
                ]);

                if($validator->fails()) {
                    return $this->error('Validation Error!', $validator->errors(), 422);
                }

                $user = User::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                    'phone' => $request->phone,
                    'address' => $request->address,
                    'gender' => $request->gender,
                ]);

                return $this->success($user, "User Created Successfully", 200);

        } catch (Exception $e) {
            return $this->error($e->getMessage(), null, 500);
        }
    }
}
