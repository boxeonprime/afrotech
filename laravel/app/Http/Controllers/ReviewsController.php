<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ReviewsController extends Controller
{

    public function submit(Request $request)
    {
        if ($user = Auth::user()) {
            $id = auth()->user()->id;
          
        }else{
            
            $id = null;
        }

        $productID = $request["product"];
        $name = $request["name"];
        $stars = $request["stars"];
        $review = $request["review"];
        DB::table("reviews")->insert(["name"=>$name, "user_id"=>$id, "stars"=>$stars, "review"=>$review, "product"=>$productID]);
        Session::flash('message', 'Review received');
        return Redirect::to(url()->previous());
    }
}
