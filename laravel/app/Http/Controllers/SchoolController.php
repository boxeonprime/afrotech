<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SchoolController extends Controller
{
    public function index()
    {
        $articles = DB::table('school')->get();
        $user = Auth::user();
        return view('school.index', compact('user', $user))
            ->with('article', $articles);
    }

    public function nearme()
    {

        $user = Auth::user();
        return view('nearme.index', compact('user', $user));
    }

    public function article(Request $request)
    {
      

        $article = $request['article'];
        $user = Auth::user();
        return view('school.' . $article, compact('user', $user));
    }
// RECIPES HOME PAGE
    public function home(Request $request)
    {

        $user = Auth::user();
        return view('school.recipes.home', compact('user', $user));
    }

    // MEALKIT

    public function recipes(Request $request)
    {

        $user = Auth::user();
        return view('school.recipes.index', compact('user', $user));
    }

    public function recipe(Request $request)
    {

        $uri = $request['uri'];
        $user = Auth::user();
        //Find comments
        $comments = DB::table('comments')
        ->join('users', 'users.id', '=', 'comments.user_id')
            ->where("blog_id", "=", $uri)
            ->get();
        //Find recipe
        $content = DB::table("blog")
            ->where("uri", "=", $uri)
            ->get()[0];
        $meta = $content;
        $content = json_decode($content->json);
        #SHARE
       /* $shareComponent = \Share::page(
            'https://www.boxeon.com/recipe/' . $uri,
            $meta->blurb,
        )
        ->facebook()
        ->twitter()
        ->linkedin()
        ->telegram()
        ->whatsapp()        
        ->reddit();*/

        return view('school.recipes.compiler', compact('user', $user))
            ->with("comments", $comments)
            ->with("id", $uri)
            ->with("meta", $meta)
          //  ->with('shareComponent',   $shareComponent)
            ->with("content", $content);
    }

}
