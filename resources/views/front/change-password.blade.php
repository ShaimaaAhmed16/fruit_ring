@extends('front.app')
@section('content')
    <section class="container text-center pt-3">
        <img src="{{asset('front/images/tt.png')}}" alt="" width="350">
    </section>
    <section class="signin">
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
        <div class="card pt-3">
            <form class="container" action="{{route('change.password')}}" method="post">
                <div class="form-group text-right">

                    <input type="password" class="form-control" placeholder="كلمة المرور">
                </div>
                <div class="form-group text-right">

                    <input type="password" class="form-control" placeholder="إعادة كلمة المرور ">
                </div>
                <div class="mb-3 text-center">
                    <button  type="submit" class="btn text-white text-center bg-light-green">حفظ كلمة  المرور</button>
                </div>
                <div class="d-flex justify-content-around">
                    <a  href="{{route('login.client')}}" class="btn text-white bg-secondary mb-1"> الدخول</a>
                    <a href="{{route('register.client')}}" class="btn mb-1 text-white bg-secondary">تسجيل حساب جديد</a>
                </div>
            </form>
        </div>
    </section>

@endsection