<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\Adherents;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
class AdherentsController extends Controller
{
    public function index()
    {
        $adherents = Adherents::all();
        return response()->json($adherents);
    }
   public function ajouter(Request $request)
   {

    $verifyEmail = Adherents::where('email', $request->email)->first();
    if($verifyEmail){
        return response()->json([
            'message1' => 'Adherent existe deja',
            'message2' => 'deja emprunter ce livre'
        ]);
    } 
    // dd($request);
    $validated = $request->validate([
        'nom' => 'required|string|max:255',
        'email' => 'required|email|unique:adherents,email',
        // 'email' => 'required|email',
        'phone' => 'nullable|string|max:20',
        'datadahestion' => 'nullable|date',
        'status' => 'nullable|string|max:50',
        // 'livre' => 'required|string|max:200',

    ]);
    $adherents = Adherents::create($validated);
    return response()->json(
        [
            'message1' => 'Adherent ajouté avec succès',
            'message2' => 'Livre emprunter avec succès',
            // 'data' => $adherents
        ], 201);
    }
//    public function modify(Request $request, $id)
//    {
//     $adherents = Adherents::firstOrFail($id);
//     // dd([
//     // 'key_name'  => $adherents->getKeyName(),
//     // 'key_value' => $adherents->getKey(),
//     // 'email'     => $adherents->email,
//     // 'submitted' => $request->email,
//     // ]);
    
//     $data = $request->validate([
//         'nom' => 'required|string',
//         'email' => ['required','email',
//         Rule::unique('adherents')->ignore($id)],
//         'phone' => 'nullable|string|max:20',
//         'datadahestion' => 'nullable|date',
//         'status' => 'nullable|string|max:50',
       
//     ]);
    
//     $adherents->update($data);

//     return response()->json($adherents, 200);
//    }
//     public function modifyUserId(Request $request, $userId)
//    {
//     $adherents = Adherents::where('user_id', $userId)->firstOrFail(); // ✅

//     // dd([
//     // 'key_name'  => $adherents->getKeyName(),
//     // 'key_value' => $adherents->getKey(),
//     // 'email'     => $adherents->email,
//     // 'submitted' => $request->email,
//     // ]);
    
//     $data = $request->validate([
//         'nom' => 'required|string',
//         'email' => ['required','email',
//         Rule::unique('adherents', 'email')->ignore($userId)],
//         'phone' => 'nullable|string|max:20',
//         'datadahestion' => 'nullable|date',
//         'status' => 'nullable|string|max:50',
//         'user_id'=> 'required|int',
        

//     ]);
    
//     $adherents->update($data);

//     return response()->json($adherents, 200);
//    }
    public function modify(Request $request, $id)
    {
        $adherent = Adherents::where('id', $id)->firstOrFail(); 
        return $this->updateAdherent($request, $adherent); 
    }

    public function modifyByUserId(Request $request, $userId)
    {
        $adherent = Adherents::where('user_id', $userId)->firstOrFail();  
        return $this->updateAdherent($request, $adherent);
    }

    private function updateAdherent(Request $request, Adherents $adherent)
    {
        $data = $request->validate([
            'nom'          => 'required|string',
            'email'        => ['required', 'email', Rule::unique('adherents', 'email')->ignoreModel($adherent)],
            'phone'        => 'nullable|string|max:20',
            'datadahestion' => 'nullable|date',
            'status'       => 'nullable|string|max:50',
            'user_id'      => ['required', 'integer'
            // Rule::unique('adherents', 'user_id')->ignoreModel($adherent)
            ],
        ]);

        $adherent->update($data);
        return response()->json($adherent, 200);
    }
    public function delete($id)
    {
        $adherents = Adherents::findOrFail($id);
        $adherents->delete();
        return response()->json(null, 204);
    }
}