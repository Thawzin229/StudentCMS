<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Rules\EmailOrPh;
use App\Models\OrderAddress;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Validator;
use Illuminate\Contracts\Hashing\Hasher as Hash;
use Illuminate\Contracts\Auth\Factory as AuthFactory;

class AuthController extends Controller
{
    protected $auth;
    protected $hash;

    public function __construct(AuthFactory $auth, Hash $hash)
    {
        $this->auth = $auth;
        $this->hash = $hash;
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => ['required','email'],
            'password' => ['required', 'min:8', 'max:16'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors(),
                'status_code' => 422
            ], 422);
        }

        $user = User::where("email", $request->email)->first();

        if ($user && $this->hash->check($request->password, $user->password)) {
            $this->auth->login($user);

            $tokenData = $this->generateTokenAndSetCookie($user);

            return response()->json([
                'token_type' => 'bearer',
                'access_token' => $tokenData['access_token'],
                'expires_in' => $tokenData['expires_in'],
                'user_data' => [
                    'id' => $user->id,
                    'name' => $user->name,
                    'email' => $user->email,
                    'phone' => $user->phone,
                    'address' => $user->address,
                    'is_admin' => $user->is_admin,
                    'status' => $user->status,
                ],
            ], 200);
        } else {
            return response()->json([
                'message' => "Try again, your credentials are invalid.",
                'status_code' => 400
            ], 400);
        }
    }

    public function register(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'name' => ['required', 'min:2', 'max:50'],
                'email' => ['required', 'email', Rule::unique('users')],
                'password' => ['required', 'min:8', 'max:16'],
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'errors' => $validator->errors(),
                    'status_code' => 422
                ], 422);
            }

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $this->hash->make($request->password),
            ]);

            // return response()->json(User::find($user->id));
            $user = User::find($user->id);

            $tokenData = $this->generateTokenAndSetCookie($user);

            return response()->json([
                'token_type' => 'bearer',
                'access_token' => $tokenData['access_token'],
                'expires_in' => $tokenData['expires_in'],
                'user_data' => [
                    'name' => $user->name,
                    'email' => $user->email,
                    'phone' => $user->phone,
                    'id' => $user->id,
                    'is_admin' => $user->is_admin,
                    'status' => $user->status,
                    'address' => $user->address,
                ],
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage(),
            ], 500);
        }
    }

    protected function generateTokenAndSetCookie($user)
    {
        $token = JWTAuth::fromUser($user);

        User::where("id", $user->id)->update(['jwt_token' => $token]);

        return [
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => $this->auth->factory()->getTTL() * 60
        ];
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        $user = User::where("id", Auth::id())->first();

        if (!$user) {
            return response()->json(['message' => "Unauthorized user."], 401);
        } else {
            return response()->json([
                'user' => [
                    'id' => $user->id,
                    'name' => $user->name,
                    'phone' => $user->phone,
                    'email' => $user->email,
                    'address' => $user->address,
                    'google_id' => $user->google_id,
                    'is_admin' => $user->is_admin,
                    'status' => $user->status,
                ],
            ], 200);

        }
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'token' => ['required', 'string'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors(),
                'status code' => 422
            ], 422);
        }

        if (!$user = User::where('jwt_token', $request->token)->first()) {
            return response()->json(['error' => 'Token does not match.'], 422);
        }

        $new_token = JWTAuth::fromUser($user);
        $user = User::where('id', $user->id)->update(['jwt_token' => $new_token]);

        return $this->respondWithToken($new_token);
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }

    // check admin 
    public function Check()
    {
        $id = auth()->payload()->get('sub');

        $user = User::where('id', $id)->where('is_admin', true)->exists();

        if ($user) {
            return response()->json(['status' => true], 200);
        } else {
            return response()->json(['status' => false], 403);
        }
    }

    // logout 
    public function Logout()
    {
        $cookie = Cookie::forget('sarpaylann');

        Auth::logout();

        return response()->json([
            'status' => 'logout'
        ], 200)->cookie($cookie);
    }

}
