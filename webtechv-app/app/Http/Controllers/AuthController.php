<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use PHPOpenSourceSaver\JWTAuth\Facades\JWTAuth;
use  Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth:api', ['except' => ['login']]);
        
        $this->middleware('admin', ['except' => ['login', 'register']]);
    }

    // public function __construct()
    // {
    //     $this->middleware('auth:api')->except(['login', 'register']);
    // }
    /**
     * Register a User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function register()
    {
        // $this->authorize('create', User::class);
        $validator = Validator::make(request()->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:8|max:255',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors()->toJson(), 400);
        }

        $user = new User;
        $user->name = request()->name;
        $user->email = request()->email;
        $user->password = bcrypt(request()->password);
        $user->save();

        return response()->json($user, 201);
    }

    public function reg()
    {
        $this->authorize('create', User::class);
        $validator = Validator::make(request()->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:8|max:255',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors()->toJson(), 400);
        }

        $user = new User;
        $user->name = request()->name;
        $user->email = request()->email;
        $user->password = bcrypt(request()->password);
        $user->save();

        return response()->json($user, 201);
    }


    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login()
    {
        $credentials = request(['email', 'password']);
        if (! $token = auth('api')->attempt($credentials)) {
            return response()->json(
                [
                    'error' => 'Unauthorized',
                    'message' => 'Invalid email or password',
                    'status' => 401,
                ],
                401

            );
        }else {
            return $this->respondWithToken($token);
        }
        // return $this->respondWithToken($token);
        // return $this->respondWithToken(auth()->login($credentials));         
    }

    public function list()
    {
         return response()->json(User::all());
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {

        // return response()->json(auth()->Auth::user());
        return response()->json(auth('api')->user());
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout(Request $request)
    {
        auth('api')->logout();
        $request->user()->token()->revoke();
        return response()->json(['message' => 'Successfully logged out']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        $token = JWTAuth::getToken();
        $newToken = JWTAuth::refresh($token);

        return response()->json([
            'token' => $newToken
        ]);
        // $newToken = auth('api')->refresh()->get();
        // return $this->respondWithToken(auth()->refresh());
        // return $this->respondWithToken(auth()->refresh());
        // return $this->respondWithToken(auth()->Auth::refresh());
    }


    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    // protected function respondWithToken($token)
    // {
    //     return response()->json([
    //         "access_token" => $token,
    //         "token_type" => "Bearer",
    //         "expires_in" => 3600,
    //         "user" => auth('api')->user()
    //     ]);
    // }
    protected function respondWithToken($token)
    {
        return response()->json([
            "access_token" => $token,
            "token_type" => "Bearer",
            "expires_in" => 3600,
            "user" => [
                'id' => auth('api')->user()->id,
                'name' => auth('api')->user()->name,
                'surename' => auth('api')->user()->surename,
                // 'avatar' => auth('api')->user()->avatar,
                'email' => auth('api')->user()->email,
                'permissions' => auth('api')->user()->getAllPermissions()->pluck('name'),
                'roles' => auth('api')->user()->getRoleNames(), 
            ]
        ]);
    }
}
