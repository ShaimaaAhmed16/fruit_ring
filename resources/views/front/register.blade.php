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

    <section class="signin">
        <div class="card pt-3">
            <form class="container" method="post" action="{{route('register.client')}}">
                @csrf
                <div class="text-center mb-2">
                    <small>تسجيل حساب جديد</small>
                </div>

                <div class="form-group">

                    <input type="text" class="form-control text-right" placeholder="الإسم بالكامل" name="name" value="{{old('name')}}">
                </div>
                <div class="form-group ">

                    <input type="email" class="form-control text-right" placeholder="البريد الالكترونى" name="email" {{old('email')}}>
                </div>
                <div class="form-group">

                    <input type="tel" class="form-control text-right" placeholder="رقم الجوال" name="phone" {{old('phone')}}>
                </div>
                <div class="form-group">

                    <input type="password" class="form-control text-right" placeholder="كلمة المرور" name="password">
                </div>
                <div class="form-check text-center mt-4 mb-4">
                    <label class="form-check-label mr-4">
                        أوافق على الشروط والقوانين
                    </label>
                    <input class="form-check-input mr-3" type="checkbox" value="أوافق على الشروط والقوانين" name="ok">

                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-block text-white bg-light-green mb-1">تسجيل حساب جديد</button>
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



    {{--<a href="{{ url('/auth/facebook') }}" class="btn btn-block btn-social btn-facebook">--}}
        {{--<span class="fa fa-facebook"></span> Sign in with Facebook--}}
    {{--</a>--}}

    {{--<a href="{{ url('/auth/twitter') }}" class="btn btn-block btn-social btn-twitter">--}}
        {{--<span class="fa fa-twitter"></span> Sign in with Twitter--}}
    {{--</a>--}}

    {{--<a href="{{ url('/auth/google') }}" class="btn btn-block btn-social btn-google">--}}
        {{--<span class="fa fa-google"></span> Sign in with Google--}}
    {{--</a>--}}
@endsection