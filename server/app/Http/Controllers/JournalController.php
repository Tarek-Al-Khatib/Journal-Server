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
}
