<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\History;
use App\Models\Livres;
use App\Models\Favorite;
use Illuminate\Http\Request;
class HistoryController extends Controller
{
    public function index()
    {
        $history = History::all();
        return response()->json([
            // 'message' => 'Liste des history récupérée avec succès',
            'history' => $history
        ]);
    }
   public function ajouter(Request $request)
   {
    $verefy = History::where('user_id', $request->user_id)
                ->where('livre_id', $request->livre_id)->first();;
    if($verefy){
        $verefy->update([
                'rate' => $request->rate,
                ]);
        return;
    }

    $validated = $request->validate([
        'nom' => 'required|string|max:255',
        'email' => 'required|email',
        'livre' =>  'required|string',
        'rate' => 'required|integer',
        'livre_id' => 'required|integer|exists:livres,id',
        'user_id' =>  'required|integer|exists:users,id',
        // 'favorie' => 'required',
    ]);
    
    // $verifyHistory = History::where('email', $request->email)
    // ->where('livre_id', $request->livre_id)
    // ->where('user_id', $request->user_id)
    // ->where('rate', $request->rate)
    // // ->where('favorie', $request->favorie)
    // ->first();
    
    // if ($verifyHistory) {
            
    //     return response()->json([
    //         'message' => 'History existe deja'
    //     ]);
    // }
    $history = History::create($validated);
    return response()->json(
        [
            'message' => 'History ajouté avec succès',
            // 'data' => $history
        ], 201);
    }
   public function check(Request $request)
   {
    $livres = Livres::where('title', $request->livre)->first();
    if ($livres) {
        $countRate = History::where('livre_id',$request->livre_id)->sum('rate');
        $countLiver = History::where('livre_id',$request->livre_id)->count('livre_id');
        
        $rate = $countLiver > 0 ? round($countRate / $countLiver,1) : 0;
        //  dd($countRate, $countLiver, $rate); 
        $livres->update([
            'book_rank' => $rate,
           
        ]);

        return response()->json(
            [
                'rate' => $rate
            ]);
    }  
   }
}