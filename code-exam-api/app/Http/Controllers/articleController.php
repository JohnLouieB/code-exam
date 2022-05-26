<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class articleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $articles = Article::get();
        return response()->json($articles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        try{

            $article = $request->all();
            $response = Article::create($article);
            return response($response);
        }catch(e) {
            return response(e);
        }
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        $article = Article::where('id', $request->id)
       ->update([
           'title' => $request->title,
           'content' => $request->content,
           'likes' => $request->likes,
       ]);
       return response($article);
    }

    public function retrieveArticleById($id)
    {
        $article = Article::where('id', '=', $id)->get();
        return response($article);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $article = Article::destroy($id);
        return response($article);
    }
}
