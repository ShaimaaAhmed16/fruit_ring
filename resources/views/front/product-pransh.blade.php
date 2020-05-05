@extends('front.app')
@section('content')
    <div class="container product">
        <section class="card text-center m-4 pt-4 pb-4">
            <div class="text-center">
                <img src="{{asset('front/images/h1.jpg')}}" alt="" class="img-fluid">
            </div>
            <h5 class="mb-5">المنزل</h5>
            <small class="text-light-green">اطلب بالكيلو</small>
            <div>
                <a href="{{route('index')}}" class="btn btn-sm mt-3">اطلب الآن</a>
            </div>

        </section>
        <section class="card text-center m-4 pt-4 pb-4">
            <div class="text-center">
                <img src="{{asset('front/images/b1.jpg')}}" alt="" class="img-fluid">
            </div>
            <h5 class="mb-5">منشآت</h5>
            <small class="text-light-green">اطلب بالجملة</small>
            <div>
                <a href="{{route('index')}}" class="btn btn-sm mt-3">اطلب الآن</a>
            </div>

        </section>
    </div>
    @endsection