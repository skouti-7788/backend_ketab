<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Opinion;
use App\Models\Livres;

class OpinionsController extends Controller
{
    // عرض الآراء ديال كتاب معين
    public function index($livre_id)
    {
        $livre = Livres::findOrFail($livre_id);

        $opinions = Opinion::where('livre_id', $livre_id)
            ->with('users')
            ->orderBy('created_at', 'desc')
            ->get();

        return response()->json([
            'livre'    => $livre->title,
            'opinions' => $opinions,
        ]);
    }
    
    // إضافة رأي جديد
    public function store(Request $request)
    {
         $validation=  $request->validate([
            // 'user_id' => 'required|exists:user,id',
            'livre_id' => 'required|exists:livres,id',
            'opinion'  => 'required|string|min:5',
        ]);
        // // dd(auth()->id());
        // $opinion = Opinion::create([
        //     'user_id'  => auth()->id(),
        //     'livre_id' => $validation['livre_id'],
        //     'opinion'  => $validation['opinion'],
        // ]);
        $validation['user_id'] = $request->user_id;

        $opinion = Opinion::create($validation);
        return response()->json([
            'message' => 'Opinion ajoutée avec succès.',
            'opinion' => $opinion,
        ], 201);
    }

    // تعديل رأي
    public function update(Request $request, $id)
    {
        $opinion = Opinion::findOrFail($id);

        if ($opinion->user_id !== auth()->id()) {
            return response()->json(['message' => 'Action non autorisée.'], 403);
        }

        $request->validate([
            'opinion' => 'required|string|min:5',
        ]);

        $opinion->update([
            'opinion' => $request->opinion,
        ]);

        return response()->json([
            'message' => 'Opinion modifiée avec succès.',
            'opinion' => $opinion,
        ]);
    }

    // حذف رأي
    public function destroy($id)
    {
        $opinion = Opinion::findOrFail($id);

        if ($opinion->user_id !== auth()->id()) {
            return response()->json(['message' => 'Action non autorisée.'], 403);
        }

        $opinion->delete();

        return response()->json([
            'message' => 'Opinion supprimée avec succès.',
        ]);
    }
}