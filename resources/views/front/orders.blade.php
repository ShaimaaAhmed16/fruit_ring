@extends('front.app')
@include('front.header')
@section('content')
    <section class="container text-right mt-5 about">
        <ul class="nav nav-tabs  nav-justified" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link text-dark" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="false">ملغى <span>0</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link  text-dark" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">منتهى <span>0</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-dark active" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="true">فعال <span>0</span></a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade" id="home" role="tabpanel" aria-labelledby="home-tab"></div>
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab"></div>
            <div class="tab-pane fade show active" id="contact" role="tabpanel" aria-labelledby="contact-tab">
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
                                <i class="far fa-heart"></i>
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
                                <i class="far fa-heart"></i>
                            </a>
                            <img src="images/apple.jpg" alt="" width="120">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @endsection