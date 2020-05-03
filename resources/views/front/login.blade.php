@extends('front.app')

@section('content')

    <section class="container text-center pt-3">
        <img src="{{asset('front/images/tt.png')}}" alt="" width="150">
    </section>
    @if ($errors->any())
        <div class="alert alert-danger text-right">
            <ul class="">
                @foreach ($errors->all() as $error)
                    {{ $error }}<br>
                @endforeach
            </ul>
        </div>
    @endif
@include('flash::message')
    <section class="signin">
        <div class="card pt-3">
            <form class="container" method="post" action="{{route('login.client')}}">
                @csrf
                <div class="form-group text-right">

                    <input type="email" class="form-control" placeholder="البريد الالكترونى" name="email">
                </div>
                <div class="form-group text-right">

                    <input type="tel" class="form-control"placeholder="كلمة المرور" name="password">
                </div>
                <div class="form-check text-center mt-4 mb-4">
                    <label class="form-check-label mr-4">
                        التسجيل التلقائى
                    </label>
                    <input class="form-check-input mr-3" type="checkbox" value="التسجيل التلقائى" >

                </div>
                <div class="text-center">
                    <button  type="submit" class="btn btn-block text-white bg-light-green mb-1">تسجيل الدخول</button>
                    <a href="{{route('register.client')}}"  class="btn btn-block mb-1 text-white bg-black">تسجيل حساب جديد</a>
                </div>
                <div class="text-right">
                    <a href="{{route('reset.password')}}"  class="btn text-white text-right bg-secondary">استعادة كلمة  المرور</a>
                </div><br>
                <hr>
                <div class="d-flex justify-content-around ">
                    <a href="#">
                        <i class="fab fa-google fa-2x text-danger"></i>
                    </a>
                    <a href="#">
                        <i class="fab fa-twitter fa-2x text-primary"></i>
                    </a>
                    <a href="#">
                        <i class="fab fa-facebook fa-2x text-blue"></i>
                    </a>
                </div>

            </form>
        </div>
    </section>

@endsection