<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Adherents;
// use Symfony\Component\HttpFoundation\Cookie;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Illuminate\Support\Facades\Validator;
class AdminController extends Controller
{
    public function index()
    {
        $admin = Admin::all();
        return response()->json($admin);
    }
    public function register(Request $request)
    {
    // Validation des champs
    $validator = Validator::make($request->all(), [
        'username' => 'required|string|max:100|min:6',
        'email'    => 'required|email|unique:admin,email',
        'password' => 'required|string|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,}$/|confirmed',
        'password_confirmation' => 'required'
    ], [
        'username.required' => 'Le nom d’utilisateur est obligatoire.',
        'username.min' => 'Le nom d’utilisateur doit contenir au moins 6 caractères.',
        'email.required' => 'L’email est obligatoire.',
        'email.email' => 'Format email invalide.',
        'email.unique' => 'Cet email est déjà utilisé.',
        'password.required' => 'Le mot de passe est obligatoire.',
        'password.regex' => 'Le mot de passe doit contenir au moins 8 caractères, dont une majuscule, une minuscule, un chiffre et un caractère spécial.',
        'password.confirmed' => 'Les mots de passe ne correspondent pas.',
        'password_confirmation.required' => 'La confirmation du mot de passe est obligatoire.'
    ]);

    if ($validator->fails()) {
    return response()->json([
        'status' => false,
        'message' => 'Erreur de validation',
        'errors' => $validator->errors()
    ], 422);
    }

    // if(!$validated) {
    //      return response()->json([
    //         'message' => 'Les champs sont vides',
    //      ]);
    // }
    // Création de l'utilisateur avec mot de passe hashé
    $validated = $validator->validated();

     if (Admin::where('email', $validated['email'])->exists()) {
        return response()->json([
            'message' => 'Admin existe deja'
        ]);
    }
    // $valuser = Admin::where('email', $request->email)->first();
    // if ($valuser) {
    //     return response()->json([
    //         'message' => 'Admin existe deja'
    //     ]);
    // }else{
    $admin = Admin::create( 
        [
        'username' => $validated['username'],
        'email'    => $validated['email'],
        'password' => Hash::make($validated['password']), 
         ]
    );
    // }
    
    return response()->json([
        'message' => 'Utilisateur créé avec succès',
        'admin' => $admin
    ], 201);
    }

    public function login(Request $request)
    {
    $request->validate([
        'username' => 'required|string|max:100|min:6',
        'password' => 'required|string|min:8'
    ], [
        'username.required' => 'Le nom d’utilisateur est obligatoire.',
        'username.min' => ' Le nom d’utilisateur doit contenir au moins 6 caractères.',
        'password.required' => 'Le mot de passe est obligatoire.',
        'password.min' => 'Le mot de passe doit contenir au moins 8 caractères.',
        'password.confirmed' => 'Les mots de passe ne correspondent pas.',
     ]);
    $admin = Admin::where('username', $request->username)->first();
    if (!$admin) {
        return response()->json([
            'message' => 'Admin not found'
        ]);
    }
    if (!Hash::check($request->password, $admin->password)) {
        return response()->json([
            'message' => 'Password incorrect'
        ]);
    }

 
    $payload = [
        'iss' => "jwt",
        'sub' => $admin->id,
        'username' => $admin->username,
        'iat' => time(),
        'exp' => time() + 3600 
    ];
    
    
    $token = JWT::encode($payload, env('JWT_SECRET'), 'HS256');
    // $adherents = Adherents::where('email', $request->email)->first();
    // if($adherents){
    // $adherents->update([
    //     'status'=> 'active',
    //     'admin_id' => $admin->id,
    //     ]);
    // }
    return response()->json([
        'message' => 'Login success',
        'token' => $token,
        'admin' => ['id' => $admin->id, 'username' => $admin->username, 'email' => $admin->email]
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
