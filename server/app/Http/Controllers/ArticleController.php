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


    public function PostArticle(Request $request)
    {
        $article = Article::create([
            'journal_reference' => $request->journal_reference,
            'posted_by' => $request->posted_by,
            'text' => $request->text,
            'restrictedAge' => $request->restrictedAge,
        ]);

        return response()->json([
            'message' => 'Article created successfully.',
            'article' => $article,
        ], 200);
    }
}
