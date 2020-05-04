@extends('front.app')
@include('front.header')
@section('content')
    <section class="container text-right mt-5 about">
        <div class="card mb-2 mt-3">
            <div class="row p-2">
                <div class="col-4 text-center">
                    <a href="#"><i class="fab fa-opencart"></i></a><br>
                    <button class="btn bg-light-green mt-4 myBtn2"> شراء الآن</button>
                </div>
                <div class="col-4 text-right">
                    <h5>تفاح أحمر</h5>
                    <small>
                        ريال
                        20
                    </small><br>
                    <span class="ml-4">كرتونة</span>
                    <span class="text-light-green">20ريال</span>
                </div>
                <div class="col-4 text-right">
                    <a href="#">

                        <i class="fas fa-times-circle text-danger"></i>
                    </a>
                    <img src="images/apple.jpg" alt="" width="120">
                </div>
            </div>
        </div>
        <div class="card mb-2 mt-3">
            <div class="row p-2">
                <div class="col-4 text-center">
                    <a href="#"><i class="fab fa-opencart"></i></a><br>
                    <button class="btn bg-light-green mt-4 myBtn2"> شراء الآن</button>
                </div>
                <div class="col-4 text-right">
                    <h5>تفاح أحمر</h5>
                    <small>
                        ريال
                        20
                    </small><br>
                    <span class="ml-4">كرتونة</span>
                    <span class="text-light-green">20ريال</span>
                </div>
                <div class="col-4 text-right">
                    <a href="#">

                        <i class="fas fa-times-circle text-danger"></i>
                    </a>
                    <img src="images/apple.jpg" alt="" width="120">
                </div>
            </div>
        </div>
    </section>




@endsection