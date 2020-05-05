@extends('front.app')
<header class="header card fixed-top bg-light-green">
    <div class="container pt-2 ">
        <div class="row">
            <div class="col-8">
                <h6 class="text-right text-white">الصفحة الشخصية</h6>
            </div>
            <div class="col-4 text-right">
                <a href="#" class="text-white">
                    <i class="fas fa-bars" onclick="openNav()"></i>
                </a>
            </div>
            <div id="mySidenav" class="sidenav">
                <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                @if(auth()->guard('client-web')->check())
                    <a href="updateinfo.html" class="user">
                        <img src="{{asset('front/images/user-icon.png')}}" alt="" width="40" class="user-icon">
                        <i class="fas fa-plus"></i>
                    </a>
                @endif
                <a href="main.html">
                    <span>الرئيسية</span>
                    <i class="fas fa-store-alt pl-2"></i>
                </a>
                <a href="{{route('about')}}">
                    <span>من نحن</span>
                    <i class="fas fa-apple-alt pl-2"></i>
                </a>
                <a href="{{route('bank')}}">
                    <span>بيانات الحسابات البنكية</span>
                    <i class="fas fa-dollar-sign pl-2"></i>
                </a>
                @if(auth()->guard('client-web')->check())
                    <a href="{{route('profile.client',auth('client-web')->user()->id)}}">
                        <span>صفحتى الشخصية </span>
                        <i class="far fa-user-circle pl-2"></i>
                    </a>
                    <a href="#">
                        <span>قائمة رغباتى </span>
                        <i class="far fa-heart pl-2"></i>
                    </a>
                    <a href="shopcart.html">
                        <span>سلة التسوق </span>
                        <i class="fas fa-shopping-basket pl-2"></i>
                    </a>
                @else
                    <a href="{{route('register.client')}}">
                        <span>تسجيل حساب جديد </span>
                        <i class="fas fa-shopping-basket pl-2"></i>
                    </a>
                    <a href="{{route('login.client')}}">
                        <span>تسجيل الدخول </span>
                        <i class="fas fa-shopping-basket pl-2"></i>
                    </a>
                @endif
                <a href="{{route('contact.client')}}">
                    <span>اتصل  بنا </span>
                    <i class="fas fa-phone-volume pl-2"></i>
                </a>
                <a href="#">
                    <span>مشاركة البيانات</span>
                    <i class="fas fa-share-alt pl-2"></i>
                </a>
                <a href="#">
                    <span>تقييم التطبيق </span>
                    <i class="fas fa-star-half-alt pl-2"></i>
                </a>
                @if(auth()->guard('client-web')->check())
                    <a href="{{route('login.client')}}">
                        <span>خروج </span>
                        <i class="fas fa-sign-out-alt pl-2"></i>
                    </a>
                @endif
            </div>
        </div>
    </div>

</header>

@section('content')
    <div style="background:whitesmoke; margin-top: 100px" >
        <div class="mt-3">
            @include('flash::message')
        </div>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <section class="update container text-center">
            <div class="card">
                <div class="row">
                    <div class="col-12">
                        @if(auth()->guard('client-web')->user()->image)
                            <img src="{{asset(auth()->guard('client-web')->user()->image)}} " alt="" width="100">
                       @else
                            <img src="{{asset('front/images/user-icon.png')}}" alt="" width="100">
                        @endif
                    </div>
                </div>
            </div>
            <form method="post" action="{{url('profile-update/'.auth()->guard('client-web')->user()->id)}}">
                @csrf
                <div class="form-group text-right">
                    <label for="Name" class="text-light-green">الاسم</label>
                    {!!  Form::text('full_name',auth()->guard('client-web')->user()->full_name,[
                    'class'=>'form-control text-right',
                    ]) !!}
                </div>


                <div class="form-group text-right">
                    <label for="Phone" class="text-light-green">رقم الجوال</label>
                    {!!  Form::text('phone',auth()->guard('client-web')->user()->phone,[
                        'class'=>'form-control text-right',
                    ]) !!}
                </div>
                <div class="form-group text-right">
                    <label for="email" class="text-light-green">البريد الالكترونى</label>
                    {!!  Form::text('email',auth()->guard('client-web')->user()->email,[
                     'class'=>'form-control text-right',
                    ]) !!}
                </div>
                <div class="form-group text-right">
                    <label  class="text-light-green">العنوان</label>
                    {!!  Form::text('address',auth()->guard('client-web')->user()->address,[
                     'class'=>'form-control text-right','placeholder'=>'العنوان'
                    ]) !!}
                </div>
                <div class="form-group text-right">
                    <label class="text-light-green">كلمة المرور</label>
                    <input type="password" name="password" class="form-control text-right"  placeholder="اذا لم تريد تغييرها اتركها فارغه">
                    {{--{!!  Form::text('password',null,[--}}
                     {{--'class'=>'form-control text-right','placeholder'=>'اذا لم تريد تغييرها اتركها فارغه'--}}
                    {{--]) !!}--}}
                </div>

                <button type="submit" class="btn btn-block text-white">تحديث</button>
            </form>
        </section>
    </div>
@endsection