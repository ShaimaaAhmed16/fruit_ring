@extends('front.app')
@include('front.header')
@section('content')


    <section class=" pt-5 container-menu">
        <div class="container">
            <div class="row">
                <div class="col-12 ml-5">
                    {!! Form::open(['action'=>'Front\MainController@index','method'=>'get']) !!}
                    <div class="searchContainer w-75 float-left ml-5" >
                        <i class="fa fa-search searchIcon"></i>
                        <input class="searchBox form-control" type="search" name="name">
                    </div>
                    <button class="btn btn-success mt-1 ml-2" type="submit"><i class="fa fa-search"></i></button>
                    {!! Form::close() !!}
                </div>
            </div>
            <div class="row pt-2 pb-1">
                <div class="col-4 text-center">
                    <a href="#" class="text-white">
                        <i class="fab fa-pagelines"></i><br>
                        <span>ورقيات</span>
                    </a>

                </div>
                <div class="col-4 text-center">
                    <a href="#" class="text-white">
                        <i class="fas fa-seedling"></i><br>
                        <span>خضروات</span>
                    </a>
                </div>
                <div class="col-4 text-center">
                    <a href="#" class="text-white">
                        <i class="fas fa-apple-alt"></i><br>
                        <span class="border-bottom">فواكة</span>
                    </a>
                </div>
            </div>
        </div>

    </section>

    <section class="container mt-2 filter card">
        <div class="row p-2">
            <div class="col-6">
                <a href="{{route('main')}}"><i class="fas fa-th-large mr-2"></i></a>
                <a href="{{route('index')}}"><i class="fas fa-th-list text-light-green"></i></a>


            </div>
            <div class="col-6 text-right">
                <a href="{{route('filter')}}"><i class="fas fa-filter mr-2"></i>
                    <span>فلتر</span></a>

            </div>
        </div>
    </section>
    @if(count($rows))
        <div id="" class="container mt-2 content-large">
            <div class="row justify-content-center">
                @foreach($rows as $row)
                    <div class="col-5 card mr-2 p-2 mb-2">
                        <div class="d-flex justify-content-between">
                            <a href="#"><i class="fab fa-opencart"></i></a>
                            <a href="#" class="">
                                <i class="far fa-heart"></i>
                            </a>
                        </div>
                        <div class="text-center">
                            <a href="{{route('details',$row->id)}}">
                                <img src="{{asset($row->image)}}" alt="" width="150">
                            </a>
                        </div>
                        <div class="text-right">
                            <small>{{$row->wight}}</small>
                            <h5 class="text-center">{{$row->name}}<br><br>
                                <small>
                                    ريال
                                    {{$row->price}}
                                </small>
                            </h5>

                            <div class="text-center mt-1">
                                @if(auth('client-web')->user())
                                    <div class="col-4">
                                        <a href="#"><i class="fab fa-opencart"></i></a><br>
                                        <form action="{{url('add-cart')}}" method="POST">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="id" value="{{$row->id}}">
                                            <input type="hidden" name="name" value="{{$row->name}}">
                                            <input type="hidden" name="price" value="{{$row->price}}">
                                            <button type="submit" class="btn bg-light-green mt-4">شراء الآن</button>
                                        </form>
                                    </div>

                                @else
                                    <div class="col-4">
                                        <a href="#"><i class="fab fa-opencart"></i></a><br>
                                        <button class="btn bg-light-green mt-4 myBtn2"> شراء الآن</button>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @else
        <div class="alert alert-danger text-center mt-5" role="alert">
            لا يوجد منتجات بهذا الاسم
        </div>
    @endif
@endsection