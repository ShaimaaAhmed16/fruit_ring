<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $records=User::paginate(20);
        return view('user.index',compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
    }
    public function viewProfileUser(){
        return view('admin.profile.profileuser');
    }
    public function profileUser(Request $request){
        $user = $request->user('web');
        $user ->update($request->all());
        if(  $user ->save()){
            return redirect('home');
        }
        else{
            flash()->error('حدث خطا يرجي المحاوله مره اخري ');
            return back();
        }
    }

    public function logout(){
        auth()->logout();
        return redirect('login');
    }

    public function changePasswordView()
    {
        return view('admin.change');
    }
    public function changePassword(Request $request)
    {
        $rules=[
            'oldPassword'=>'required',
            'password'=>'required|confirmed',];
        $messages=[
            'oldPassword.required'=>'oldPassword is required',
            'password.required'=>'Password is required',
        ];
        $this->validate($request,$rules,$messages);
        $user= Auth::user();
        if(Hash::check($request->oldPassword,$user->password) ){
            $user->password = bcrypt($request->password);
            $user->save();
            flash()->success("تم تغيير كلمه السر");
            return redirect('home');
        }
        else{
            flash()->error("كلمه المرور خطا");
            return back();
        }
    }



}
