<?php

namespace App\Http\Controllers;

use App\Models\Journal;
use App\Models\User;
use Illuminate\Http\Request;

class JournalController extends Controller
{
    public function getArticles($id){
        $user = User::find($id);
        if(!$user){
            return response()->json(["message" => "Not found"], 404);
        }

        $journals = Journal::where('restrictedAge', "<=", $user->age);

        return response()->json($journals);
    }

    public function postJournal(Request $request, $id){

        $user = User::find($id);
        if(!$user){
            return response()->json(["message" => "Not found"], 404);
        }

        if($user->role != "admin"){
            return response()->json(["message" => "You are not authorized to do this"], 401);
        }

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'text' => 'required|string',
            'posted_by' => 'required|exists:users,id',
            'restrictedAge' => 'nullable|integer|min:0',
        ]);


        $journal = Journal::create($validated);

        return response()->json([
            'message' => 'Journal created successfully.',
            'journal' => $journal,
        ], 200);
    }
}
