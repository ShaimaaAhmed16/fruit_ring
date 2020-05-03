@extends('front.app')
@include('front.header')
@section('content')
<section class="contact container">
    <div class="card text-right pr-4">
        <div class="row">
            <div class="col-12">
                <small>{{$row->name}}</small>
                <i class="fas fa-globe text-light-green ml-2"></i>
            </div>
            <div class="col-12">
                <small>{{$row->phone}}</small>
                <i class="fas fa-mobile text-light-green ml-2"></i>
            </div>
            <div class="col-12">
                <small>{{$row-> watsUp}}</small>
                <i class="fab fa-whatsapp text-light-green ml-2"></i>
            </div>
            <div class="col-12">
                <small>{{$row->email}}</small>
                <i class="fas fa-envelope text-light-green ml-2"></i>
            </div>
        </div>
    </div>

    <form method="post" action="{{route('contact.client')}}">
        @csrf
        @if ($errors->any())
            <div class="alert alert-danger text-right ">
                <ul class="">
                    @foreach ($errors->all() as $error)
                        {{ $error }}<br>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="form-group text-right">

            <input type="text" class="form-control" placeholder="الاسم" name="name">
        </div>
        <div class="form-group text-right">

            <input type="tel" class="form-control"placeholder="رقم الجوال" name="phone">
        </div>
        <div class="form-group text-right">

            <input type="email" class="form-control" placeholder="username.gmail.com" name="email">
        </div>
        <div class="form-group text-right">
            <textarea class="form-control" placeholder="نص الرسالة" name="message"></textarea>
        </div>

        <button  type="submit" id="myBtn3" class="btn btn-block text-white" >ارسال</button>

    </form>
</section>

@endsection
