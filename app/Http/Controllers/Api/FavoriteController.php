<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Favorite;
use Illuminate\Http\Request;
use App\Models\History;
use App\Models\Livres;

class FavoriteController extends Controller
{
    public function index()
    {
        $favorites = Favorite::all();
        return response()->json([
            'favorites' => $favorites
        ]);
    }
    public function store(Request $request)
{
    $request->validate([
        'user_id' => 'required|integer|exists:users,id',
        'livre_id' => 'required|integer|exists:livres,id',
    ]);

    Favorite::firstOrCreate([
        'user_id' => $request->user_id,
        'livre_id' => $request->livre_id,
    ]);

    return response()->json(['message' => 'Added to favorites']);
}
public function destroy(Request $request)
{
    Favorite::where('user_id', $request->user_id)
            ->where('livre_id', $request->livre_id)
            ->delete();
    
         
        
    return response()->json(['message' => 'Removed from favorites']);
}
public function check(Request $request)
{   
    // dd($request->user_id, $request->livre_id);

    $exists = Favorite::where('user_id', $request->user_id)
                      ->where('livre_id', $request->livre_id)
                      ->exists();
    // $history = History::where('livre_id', $request->livre_id)
    //                     ->where('user_id', $request->user_id)
    //                     ->first();
    // if($history){
    //      $history->update([
    //         'favorie'   => $exists?1:0,
    //     ]);

    // }
    return response()->json(['favorite' => $exists]);
}


}
