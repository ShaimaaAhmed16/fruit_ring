@extends('front.app')
@include('front.header')
@section('content')
    <div class="container mt-4">
        <div class="card">
            <img src="{{asset($row->image)}}" alt="" class="img-fluid">
        </div>

    </div>
    <div class="container mt-2 buy">
        <div class="row">
            <div class="col-6">
                <span>
                    السعر : {{$row->price}} ر.س
                </span>
                <i class="fas fa-dollar-sign"></i>
                <br>
                <div class="btn-group mt-2">
                    <button type="button" class="btn">أضف للسلة</button>

                    <button type="button" class="btn"><i class="fas fa-shopping-basket"></i></button>
                </div>
            </div>
            <div class="col-6 text-right">
                <span>
                    الوزن :  {{$row->wight}}
                </span>
                <i class="fas fa-weight"></i>
                <br>
                <div class="btn-group mr-2 mt-2">
                    <button type="button" class="btn">+</button>
                    <button type="button" class="btn">1</button>
                    <button type="button" class="btn">-</button>
                </div>
            </div>
        </div>
        <div class="card mt-5 mb-4">
            <div class="card-title text-right p-2">
                <span class="about-product">عن المنتج</span>
            </div>
            <div class="card-body"></div>
        </div>
        <h6 class="text-center">منتجات ذات صلة</h6>
        <div class="card mb-2">
            <div class="row p-2">
                <div class="col-4">
                    <a href="#"><i class="fab fa-opencart"></i></a><br>
                    <a href="#" class="btn bg-light-green mt-4"> شراء الآن</a>
                </div>
                <div class="col-4 text-right">
                    <h5>{{$row->name}}</h5>
                    <small>
                        ريال
                        {{$row->price}}
                    </small><br>
                    <span class="ml-4">{{$row->wight}}</span>
                    <span class="text-light-green">{{$row->price}}ريال</span>
                </div>
                <div class="col-4 text-right">

                    <img src="{{asset($row->image)}}" alt="" width="120">
                </div>
            </div>
        </div>


    </div>
@endsection