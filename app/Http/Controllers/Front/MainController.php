<?php

namespace App\Http\Controllers\Front;

use App\Models\Category;
use App\Models\Contact;
use App\Models\Link;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Http\Controllers\Controller;

class MainController extends Controller
{
    public function index(Request $request){
        $categories =Category::all();
        $rows = Product::where(function ($query) use ($request) {
            if ($request->name) {
                $query->where('name', 'like', '%'.$request->name.'%');
            }
            elseif ($request->category_id) {
                    $query->where('category_id', $request->category_id);
                }

        })->paginate(8);
        return view('front.index' ,compact('rows','categories'));
    }
    public function main(Request $request){
        $rows = Product::where('name', 'like', '%'.$request->name.'%')->paginate(8);
        if (request()->sort == 'low_high') {
        $rows = Product::orderBy('price')->paginate(8);
    } elseif (request()->sort == 'high_low') {
        $rows = Product::orderBy('price', 'desc')->paginate(8);
    } else {
            $rows = Product::paginate(8);
    }

        return view('front.main' ,compact('rows'));
    }
    public function viewContact(){
        $row =Link::find(1);
        return view('front.contact',compact('row'));
    }

    public function contact(Request $request){
        $rules=[
            'name'=>'required',
            'email'=>'required|unique:contacts',
            'phone'=>'required',
            'message'=>'required',
        ];
        $messages=[
            'name.required'=>'يرجي كتابه الاسم بالكامل',
            'email.required'=>'يرجي كتابه البريد الالكتروني بطريقه صحيحه',
            'phone.required'=>'يرجي كتابه رقم الجوال',
            'message.required'=>'يرجي كتابه الرساله ',
        ];
        $this->validate($request,$rules,$messages);
        $user = Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'message' => $request->message,

        ]);
        if ($user){
            return redirect()->route('index');
        }else{
            return back();
        }
    }
    public function viewFilter(){
        return view('front.filter');
    }

    public function details($id){
        $row = Product::findOrFail($id);
        return view('front.details',compact('row'));
    }

    public function about(){
        return view('front.about');
    }

    public function bank(){
        return view('front.bank-account');
    }

    public function myOrder(){
        return view('front.orders');
    }
    public function addOrder(Request $request){

        $order = Order::create([
            'client_id' => auth()->user('client-web')->id,
            'status' => 'فعال',
            'total' =>Cart::subtotal(),
        ]);

        // Insert into order_product table
        foreach (Cart::content() as $item) {
            OrderProduct::create([
                'order_id' => $order->id,
                'product_id' => $item->model->id,
                'quantity' => $item->qty,
            ]);
        }
        Cart::instance('default')->destroy();
        session()->forget('coupon');
        return back();
    }


}
