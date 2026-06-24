<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Adherents;
// use Symfony\Component\HttpFoundation\Cookie;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
class UsersController extends Controller
{ 
    public function index()
    {
        $user = User::all();
        return response()->json($user);
    }
    public function register(Request $request)
    {
    // Validation des champs
    $validated = $request->validate([
        'username' => 'required|string|max:100',
        'email'    => 'required|email|unique:users,email',
        'password' => 'required|string|min:8|confirmed',
        // 'favorite' => 'required|boolean',
    ]);
    // dd($validated);
    if(!$validated) {
         return response()->json([
            'message' => 'Les champs sont vides',
         ]);
    }
    // Création de l'utilisateur avec mot de passe hashé
    $valuser = User::where('email', $request->email)->first();
    if ($valuser) {
        return response()->json([
            'message' => 'User existe deja'
        ]);
    }else{
    $user = User::create( 
        [
        'username' => $validated['username'],
        'email'    => $validated['email'],
        'password' => Hash::make($validated['password']), 
        // 'favorite' => $validated['favorite'],
        ]
    );
    }
    
    return response()->json([
        'message' => 'Utilisateur créé avec succès',
        'user' => $user
    ], 201);
}

public function login(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'password' => 'required'
    ]);
    $user = User::where('email', $request->email)->first();
    if (!$user) {
        return response()->json([
            'message' => 'User not found'
        ]);
    }
    if (!Hash::check($request->password, $user->password)) {
        return response()->json([
            'message' => 'Password incorrect'
        ]);
    }

 
    $payload = [
        'iss' => "jwt",
        'sub' => $user->id,
        'username' => $user->username,
        'iat' => time(),
        'exp' => time() + 3600 
    ];
    
    
    $token = JWT::encode($payload, env('JWT_SECRET'), 'HS256');
    $adherents = Adherents::where('email', $request->email)->first();
    if($adherents){
    $adherents->update([
        'status'=> 'active',
        'user_id' => $user->id,
        ]);
     }
    return response()->json([
        'message' => 'Login success',
        'token' => $token,
        'user' => ['id' => $user->id, 'username' => $user->username, 'email' => $user->email]
    ]);
}
 public function logout(Request $request)
    {
        Auth::logout();
        return response()->json([
         'message' => 'Logged out'
        ]);
        // return response()->json(['message' => 'Logged out'])
        // ->withCookie(cookie()->forget('laravel_session')); 
        // ->withCookie(cookie('laravel_session', '', -1, '/', 'localhost', false, true)); 

    }
               
}