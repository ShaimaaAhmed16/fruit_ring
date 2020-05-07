@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-right">
                    {{ __('تسجيل حساب جديد') }}
                    <img src="{{asset('adminlte/dist/img/tt.png')}}" alt="AdminLTE Logo"
                         class="brand-image img-circle elevation-3" style="opacity: .8" width="80">
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row text-right">

                            <div class="col-md-12">
                                <input id="name" type="text" class="text-right form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="اسم المستخدم">

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row text-right">

                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control text-right @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="البريد الالكتروني">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row text-right">
                            <div class="col-md-12">
                                <input id="password" type="password" class="form-control text-right @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="كلمه السر">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row text-right">

                            <div class="col-md-12">
                                <input id="password-confirm" type="password" class="form-control text-right " name="password_confirmation" required autocomplete="new-password" placeholder="تاكيد كلمه السر">
                            </div>
                        </div>

                        <div class="text-center">
                            <button  type="submit" class="btn btn-block btn-success text-white bg-light-green mb-1">تسجيل الدخول</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
