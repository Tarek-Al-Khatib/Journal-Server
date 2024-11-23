<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function register(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:8',
            'age' => 'nullable|integer',
            'type' => 'required|in:admin,user',
        ]);


        $user = User::create($validatedData);

        return response()->json(["message"=> "Created successuly", "user_id"=>$user->id], 200);
    }


    public function login(Request $request){
        $validatedData = $request->validate([
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:8',
        ]);


        $user = User::where("email", $validatedData['email'])->first();

        if(!$user){
            return response()->json(["message" => "User not found"], 404);
        }

        return response()->json(["message"=> "Login successful", "user_id"=>$user->id], 200);
    }
}
