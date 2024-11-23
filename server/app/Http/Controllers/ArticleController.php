<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\User;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function getArticles(){
        $articles = Article::all();
        return response()->json($articles, 200);
    }

    public function getArticlesByUser($id){
        $user = User::find($id);

        if(!$user){
            return response()->json(["message" => "Not found"], 404);
        }


        $articles = Article::where("posted_by", "=", $user->id);

        return response()->json($articles, 200);
    }


    public function postArticle(Request $request){
        
    }
}
