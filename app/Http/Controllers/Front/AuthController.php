<?php

namespace App\Http\Controllers\Front;

use App\Models\Client;
use App\Models\Social;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\ReaetPassword;
use Laravel\Socialite\Facades\Socialite;


class AuthController extends Controller
{

   public function viewRegister(){
        return view('front.register');
   }

   public function register(Request $request){
       $rules=[
           'name'=>'required',
           'email'=>'required|unique:clients',
           'password'=>'required|min:6',
           'phone'=>'required',
           'ok'=>'required',
       ];
       $messages=[
           'name.required'=>'يرجي كتابه الاسم بالكامل',
           'email.required'=>'يرجي كتابه البريد الالكتروني بطريقه صحيحه',
           'password.required'=>'يرجي كتابه كلمه السر لاتقل عن 6احرف',
           'phone.required'=>'يرجي كتابه رقم الجوال',
           'ok.required'=>'يجب الموافقه علي الشروط والقوانين',
       ];

       $this->validate($request,$rules,$messages);
       $user = Client::create([
           'full_name' => $request->name,
           'email' => $request->email,
           'phone' => $request->phone,
           'password' => Hash::make($request->password),
       ]);
       $user->save();
       if ($user){
            auth('client-web')->login($user);
           return redirect()->route('index');
       }
       else{
           flash()->error('يوجد خطا في البيانات');
           return back();
       }
   }

    public function viewLogin(){
        return view('front.login');
    }
    public function login(Request $request){
        $rules=[
            'email'    => 'required',
            'password' => 'required',
        ];
        $messages=[
            'email.required'=>'يرجي كتابه البريد الالكتروني بطريقه صحيحه',
            'password.required'=>'يرجي كتابه كلمه السر الخاصه بك',
        ];
        $this->validate($request,$rules,$messages);
        $client = Client::where('email', $request->input('email'))->first();
        if ($client) {
            if (Auth::guard('client-web')->attempt($request->only('email', 'password'))) {
               return redirect()->route('index');
           } else {
                flash()->error('يوجد خطا في الباسورد او الايميل');
             return back();
            }
        }
        flash()->error('يوجد خطا في الباسورد او الايميل');
        return back();
    }

    public function resetPassword(){
        return view('front.reset-password');
    }

    public function sendMessage(Request $request)
    {
        $rules=[
            'email'    => 'required',
        ];
        $messages=[
            'email.required'=>'يرجي كتابه البريد الالكتروني بطريقه صحيحه',
        ];
        $this->validate($request,$rules,$messages);
        $send = Client::where('email', $request->email)->first();
        //dd($send);
        if ($send) {
            $code = rand('1111','9999');
            $update = $send->update(['pin_code' => $code]);
            if ($update) {
                //send email
                Mail::to($send->email)
                    ->bcc('fruit@gmail.com')
                    ->send(new ReaetPassword($code));
                flash()->message('برجاء فحص الهاتف');
                return  view('front.send-code');
            } else {
                flash()->message('حاول مره اخري');
            }
        } else {
            flash()->message('حاول مره اخري');
        }
    }

    public function checkCode(Request $request){
        $this->validate($request, [
            'code'=>'required',
        ]);
        $user = Client::where('pin_code',$request->code)->first();
        if($user){
            $user->pin_code = null;
            if($user->save()){
                return view('front.change-password');
            }
            else{
                flash()->message('حدث خطا, حاول مره اخري');
                return back();
            }
        }
        else{
            flash()->message('هذا الكود غير صحيح');
            return back();
        }

    }

    public function changePassword(Request $request){
        $rules=[
            'password'=>'required|confirmed',
        ];
        $messages=[
            'password.required'=>'يرجي كتابه كلمه السر',
        ];
        $this->validate($request,$rules,$messages);
        $user = Client::update(bcrypt($request->password));
            if($user->save()){
                flash()->message('تم تغيير كلمه السر بنجاح');
                return redirect()->route('login.client');
            }
            else{
                flash()->message('لم يتم كتابه كلمه السر بشكل صحيح');
                return back();
            }
    }

    public function viewProfile(Request $request){
        $row = $request->user('client-web');
        return view('front.profileclient',compact('row'));
    }

    public function profile(Request $request)
    {
//        sometimes
        $user = $request->user('client-web');
        if ($request->input('password')){
//            dd('if');
            $request->merge(array('password' => bcrypt($request->password)));
           $user->update($request->all());
        }
        else{
//            dd('else');

        $user->update([

//            'password' =>$user->password,
            'full_name' =>   $request->name,
            'phone' =>   $request->phone,
            'email' =>   $request->email,
            'address' =>   $request->address,

        ]);
    }
        if($request->hasFile('image')) {
            if (file_exists($user->image)){
                unlink($user->image);
            }
            $image = $request->file('image');
            $directionPath = public_path() . '/uploads/client';
            $extension = $image->getClientOriginalExtension();
            $name = time() . '' . rand('11111', '99999') . '.' . $extension;
            $image->move($directionPath, $name);
            $user->update(['image' => 'uploads/client/' . $name]);

        }
        $user->save();
        if($user){
            flash()->success('تم تعديل البانات الشخصيه بنجاح');
            return redirect()->route('index');
        }
        else{
            flash()->error('يوجد خطا في البيانات');
            return back();
        }
   }

    public function myAccount(Request $request){
        $row = $request->user('client-web');
        return view('front.myaccount',compact('row'));
    }

    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback($provider)
    {
        try
        {
            $socialUser = Socialite::driver($provider)->user();
        }
        catch(\Exception $e)
        {
            return redirect()->route('register');
        }
        //check if we have logged provider
        $socialProvider = Social::where('provider_id',$socialUser->getId())->first();
        if(!$socialProvider)
        {
            //create a new user and provider
            $user = Client::firstOrCreate(
                ['email' => $socialUser->getEmail()],
                ['name' => $socialUser->getName()]
            );

            $user->socialProviders()->create(
                ['provider_id' => $socialUser->getId(), 'provider' => $provider]
            );

        }
        else
            $user = $socialProvider->user;

        auth()->login($user);

        return redirect()->route('index');

    }


    public function logout()
    {
        auth()->guard('client-web')->logout();
        return redirect()->route('login.client');
    }


}
