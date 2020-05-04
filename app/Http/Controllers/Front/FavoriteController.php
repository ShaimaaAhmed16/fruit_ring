<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public function favorite($id){
//        dd(Auth::guard('client-web')->user());
        Auth::guard('client-web')->user()->products()->toggle($id);
        return back();
    }
    public function listFavorite(){
        $products=Auth::guard('client-web')->user()->products;
//        dd($products);
       return view('front.favorites',compact('products'));
    }
//    public function destroy($id){
//        dd('ss');
//    }
}
