<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Comment;


class manage extends Controller
{
    Public function __construct(){
        $this->middleware('auth');
    }
    //

    public function AddArticle(Request $request)
    {
        if($request->isMethod('post')) {
            $art = new Article();
            $art->title = $request->input('title');
            $art->body = $request->input('body');
            $art->user_id = Auth::user()->id;
            $art->save();
            return redirect('view');  
        }
        return view('manage.AddArticle');
    }


    public function view(){

        $articles = Article::all();
        $arts = Array('articles' => $articles );
        return view('manage.view',$arts);

    }

    public function read(Request $request, $id){

        if($request->isMethod('post')){
            $comment = new Comment();
            $comment->comment = $request->input('comment');
            $comment->article_id = $id;
            $comment->save();
        }
        $articles = Article::find($id);
        $art = Array('article'=>$articles);

        return view('manage.read',$art);
    }




}
