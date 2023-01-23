<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function plans()
    {
        if ($user = Auth::user()) {
            $id = auth()->user()->id;
            $user = User::find($id);
        }

        return view('shop.plans', compact('user', 'user'));
    }
    public function meals()
    {
        if ($user = Auth::user()) {
            $id = auth()->user()->id;
            $user = User::find($id);
        }

        return view('shop.meals', compact('user', 'user'));
    }
    public function menus()
    {
        $user = Auth::user();

        return view('shop.menus', compact('user'));
    }
    public function promo()
    {
        if ($user = Auth::user()) {
            $id = auth()->user()->id;
            $user = User::find($id);
        }

        return view('shop.promo', compact('user', 'user'));
    }


    public function item(Request $request)
    {
        $user = Auth::user();
       
        $id = $_GET["id"];
        $product = DB::table("menu")
            ->where("id", "=", $id)
            ->get();


            $reviews = DB::table("reviews")
            ->join('users', 'users.id', '=', 'reviews.user_id')
            ->where("product", "=", $id)
            ->get();

            $avg_reviews = DB::table("reviews")
            ->where("product", "=", $id)
            ->avg("stars");

            $total_reviews = DB::table("reviews")
            ->where("product", "=", $id)
            ->count();
  
        return view('shop.item', compact('user', 'user'))
            ->with("product", $product)
            ->with("avg_reviews", (int)round($avg_reviews))
            ->with("total_reviews", $total_reviews)
            ->with("reviews", $reviews);
    }



}
