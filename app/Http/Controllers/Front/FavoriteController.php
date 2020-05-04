<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public function favorite($id){
        Auth::user()->products()->toggle($id);
//        $request->user()->posts()->toggle($request->post_id);
        return back();
    }
    public function listFavorite(){
        $products=Auth::guest('client-web')->favorites;
        dd($products);
       return view('front.favorite',compact('products'));
    }
}
